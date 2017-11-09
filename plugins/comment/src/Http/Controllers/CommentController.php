<?php

namespace Botble\Comment\Http\Controllers;

use Assets;
use Botble\Comment\Http\Requests\CommentRequest;
use Botble\Comment\Repositories\Interfaces\CommentInterface;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use MongoDB\Driver\Exception\Exception;
use Botble\Comment\Http\DataTables\CommentDataTable;

class CommentController extends Controller
{
    /**
     * @var CommentInterface
     */
    protected $commentRepository;

    /**
     * CommentController constructor.
     * @param CommentInterface $commentRepository
     * @author Sang Nguyen
     */
    public function __construct(CommentInterface $commentRepository)
    {
        $this->commentRepository = $commentRepository;
    }

    /**
     * Display all comment
     * @param CommentDataTable $dataTable
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author Sang Nguyen
     */
    public function getList(CommentDataTable $dataTable)
    {

        page_title()->setTitle(trans('comment::comment.list'));

        Assets::addJavascript(['datatables']);
        Assets::addStylesheets(['datatables']);
        Assets::addAppModule(['datatables']);

        return $dataTable->render('comment::list');
    }

    /**
     * Show create form
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author Sang Nguyen
     */
    public function getCreate()
    {
        page_title()->setTitle(trans('comment::comment.create'));

        return view('comment::create');
    }

    /**
     * Insert new Comment into database
     *
     * @param CommentRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @author Sang Nguyen
     */
    public function postCreate(CommentRequest $request)
    {
        $comment = $this->commentRepository->getModel();
        $comment->fill($request->all());

        $comment = $this->commentRepository->createOrUpdate($comment);

        do_action(BASE_ACTION_AFTER_CREATE_CONTENT, COMMENT_MODULE_SCREEN_NAME, $request, $comment);

        if ($request->input('submit') === 'save') {
            return redirect()->route('comment.list')->with('success_msg', trans('bases::notices.create_success_message'));
        } else {
            return redirect()->route('comment.edit', $comment->id)->with('success_msg', trans('bases::notices.create_success_message'));
        }
    }

    /**
     * Show edit form
     *
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @author Sang Nguyen
     */
    public function getEdit($id)
    {
        page_title()->setTitle(trans('comment::comment.edit') . ' #' . $id);

        $comment = $this->commentRepository->findById($id);
        return view('comment::edit', compact('comment'));
    }

    /**
     * @param $id
     * @param CommentRequest $request
     * @return \Illuminate\Http\RedirectResponse
     * @author Sang Nguyen
     */
    public function postEdit($id, CommentRequest $request)
    {
        $comment = $this->commentRepository->findById($id);
        $comment->fill($request->all());

        $this->commentRepository->createOrUpdate($comment);

        do_action(BASE_ACTION_AFTER_UPDATE_CONTENT, COMMENT_MODULE_SCREEN_NAME, $request, $comment);

        if ($request->input('submit') === 'save') {
            return redirect()->route('comment.list')->with('success_msg', trans('bases::notices.update_success_message'));
        } else {
            return redirect()->route('comment.edit', $id)->with('success_msg', trans('bases::notices.update_success_message'));
        }
    }

    /**
     * @param $id
     * @return array
     * @author Sang Nguyen
     */
    public function getDelete($id)
    {
        try {
            $comment = $this->commentRepository->findById($id);
            $this->commentRepository->delete($comment);

            return ['error' => false, 'message' => trans('bases::notices.deleted')];
        } catch (Exception $e) {
            return ['error' => true, 'message' => trans('bases::notices.cannot_delete')];
        }
    }

    /**
     * @param Request $request
     * @return array|\Illuminate\Http\JsonResponse
     * @author Sang Nguyen
     */
    public function postDeleteMany(Request $request)
    {
        $ids = $request->input('ids');
        if (empty($ids)) {
            return ['error' => true, 'message' => trans('bases::notices.no_select')];
        }

        foreach ($ids as $id) {
            $comment = $this->commentRepository->findById($id);
            $this->commentRepository->delete($comment);
        }

        return ['error' => false, 'message' => trans('bases::notices.delete_success_message')];
    }

    /**
     * @param Request $request
     * @return array
     * @author Sang Nguyen
     */
    public function postChangeStatus(Request $request)
    {
        $ids = $request->input('ids');
        if (empty($ids)) {
            return ['error' => true, 'message' => trans('bases::notices.no_select')];
        }

        foreach ($ids as $id) {
            $comment = $this->commentRepository->findById($id);
            $comment->status = $request->input('status');
            $this->commentRepository->createOrUpdate($comment);
        }

        return ['error' => false, 'status' => $request->input('status'), 'message' => trans('bases::notices.update_success_message')];
    }
}
