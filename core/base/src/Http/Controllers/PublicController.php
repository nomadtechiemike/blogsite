<?php
namespace Botble\Base\Http\Controllers;

use App\Http\Controllers\Controller;
use Botble\ACL\Repositories\Interfaces\UserInterface;

use Botble\ACL\Repositories\Interfaces\InviteInterface;
use Botble\ACL\Repositories\Interfaces\RoleInterface;
use Botble\ACL\Repositories\Interfaces\RoleUserInterface;

use Botble\Base\Supports\Helper;
use Botble\Blog\Repositories\Interfaces\CategoryInterface;
use Botble\Blog\Repositories\Interfaces\PostInterface;
use Botble\Blog\Repositories\Interfaces\TagInterface;
use Botble\Page\Repositories\Interfaces\PageInterface;
use Illuminate\Http\Request;
use SeoHelper;
use Theme;
use Botble\ACL\Models\User;
use Validator;
use EmailHandler;
use Sentinel;
use Storage;
use Exception;
use Botble\ACL\Models\UserMeta;
use Session;
use Hash;
use Botble\Blog\Models\Category;

class PublicController extends Controller
{
	
	/**
	 * @var UserInterface
	 */
	protected $userRepository;
	
	/**
	 * @var RoleUserInterface
	 */
	protected $roleUserRepository;
	
	/**
	 * @var RoleInterface
	 */
	protected $roleRepository;
	
	/**
	 * @var InviteInterface
	 */
	protected $inviteRepository;
	
	
	public function __construct(UserInterface $userRepository, RoleUserInterface $roleUserRepository, RoleInterface $roleRepository, InviteInterface $inviteRepository)
	{
		$this->userRepository = $userRepository;
		$this->roleUserRepository = $roleUserRepository;
		$this->roleRepository = $roleRepository;
		$this->inviteRepository = $inviteRepository;
	}
	

    /**
     * @return mixed
     * @author Sang Nguyen
     */
    public function getIndex()
    {
        Theme::breadcrumb()->add(__('Home'), route('public.index'));
        return Theme::scope('index')->render();
    }

    /**
     * @param $slug
     * @param PostInterface $postRepository
     * @param PageInterface $pageRepository
     * @param CategoryInterface $categoryRepository
     * @return \Response
     * @author Sang Nguyen
     */
    public function getView($slug, PostInterface $postRepository, PageInterface $pageRepository, CategoryInterface $categoryRepository)
    {
        $post = $postRepository->getBySlug($slug, true);

        if (!empty($post)) {

            Helper::handleViewCount($post, 'viewed_post');

            SeoHelper::setTitle($post->name)->setDescription($post->description);

            admin_bar()->registerLink(trans('blog::posts.edit_this_post'), route('posts.edit', $post->id));
			$body_class = "archive post-type-archive post-type-archive-bdu-learn single single-bdu-learn";
            Theme::breadcrumb()->add(__('Home'), route('public.index'))->add($post->name, route('public.single.detail', $slug));
            return Theme::scope('post', compact('post', 'body_class'))->render();
        } else {

            $page = $pageRepository->getBySlug($slug, true);
            if (!empty($page)) {
                SeoHelper::setTitle($page->name)->setDescription($page->description);

                if ($page->template) {
                    Theme::uses(setting('theme'))->layout($page->template);
                }

                admin_bar()->registerLink(trans('pages::pages.edit_this_page'), route('pages.edit', $page->id));
                $body_class = "archive post-type-archive post-type-archive-bdu-learn single single-bdu-learn";
                Theme::breadcrumb()->add(__('Home'), route('public.index'))->add($page->name, route('public.single.detail', $slug));
                return Theme::scope('page', compact('page', 'body_class'))->render();
            } else {
                $category = $categoryRepository->getBySlug($slug, true);
                if (!empty($category)) {
                    SeoHelper::setTitle($category->name)->setDescription($category->description);

                    admin_bar()->registerLink(trans('blog::categories.edit_this_category'), route('categories.edit', $category->id));

                    $allRelatedCategoryIds = array_unique(array_merge($categoryRepository->getAllRelatedChildrenIds($category), [$category->id]));

                    $posts = $postRepository->getByCategory($allRelatedCategoryIds, 12);
                    $body_class = "single single-bdu-learn";

                    Theme::breadcrumb()->add(__('Home'), route('public.index'))->add($category->name, route('public.single.detail', $slug));
                    return Theme::scope('category', compact('category', 'posts', 'body_class'))->render();
                }
            }
        }
        return abort(404);
    }
    
    public function getBlog(PostInterface $postRepository, CategoryInterface $categoryRepository){
    	$category = $categoryRepository->getBySlug('blog', true);
    	if (!empty($category)) {
    		SeoHelper::setTitle($category->name)->setDescription($category->description);
    		$popular = $postRepository->getPopularPosts(10);
    		$posts = $category->posts;
    		$body_class = "blog";
    		return Theme::scope('blogs', compact('category', 'posts',  'popular' , 'body_class'))->render();
    	}
    	return abort(404);
    }
    	
    public function singlePost($slug, PostInterface $postRepository){
    	$post = $postRepository->getBySlug($slug, true);
    	
    	if (!empty($post)) {
    		
    		Helper::handleViewCount($post, 'viewed_post');
    		
    		SeoHelper::setTitle($post->name)->setDescription($post->description);
    		$body_class = "archive post-type-archive post-type-archive-bdu-learn single single-bdu-learn";
    		return Theme::scope('post', compact('post', 'body_class'))->render();
    	}
    	return abort(404);
    }
    
    public function getLearningPath(){
    	$body_class = "archive post-type-archive post-type-archive-bdu-learn single single-bdu-learn";
    	return Theme::scope('learning_paths', compact('post', 'body_class'))->render();
    }
    
    public function getCourses(){
    	$posts = get_all_posts();
    	
    	if (!empty($posts)) {
    		//SeoHelper::setTitle($post->name)->setDescription($post->description);
    		//admin_bar()->registerLink(trans('blog::posts.edit_this_post'), route('posts.edit', $post->id));
    		$body_class = "blog archive post-type-archive post-type-archive-bdu-learn single single-bdu-learn";
    		//Theme::breadcrumb()->add(__('Home'), route('public.index'))->add($post->name, route('public.single.detail', $slug));
    		return Theme::scope('courses', compact('posts', 'body_class'))->render();
    	}
    	return abort(404);
    }
    
    
    public function getLogin(){
    	$body_class = "ltr  lang_en";
    	//Theme::breadcrumb()->add(__('Home'), route('public.index'))->add($post->name, route('public.single.detail', $slug));
    	$position_property = 'unset !important';
    	return Theme::scope('auth.login', compact( 'position_property' , 'body_class'))->render();
    	
    }
    
    
    public function getRegister(){
    	$body_class = "ltr  lang_en";
    	$position_property = "absolute !important";
    	return Theme::scope('auth.register', compact( 'position_property' , 'body_class'))->render();
    }
    
    public function learnCourse($slug, CategoryInterface $categoryRepository){
    	
    	$category = $categoryRepository->getBySlug($slug, true);
    	if (!empty($category)) {
    		$courses = get_all_categories(['parent_id' => $category->id]);
    		SeoHelper::setTitle($category->name)->setDescription($category->description);
    		$body_class = "archive post-type-archive post-type-archive-bdu-learn single single-bdu-learn";
    		return Theme::scope('learningpath', compact('category', 'courses', 'body_class'))->render();
    	}
    	return abort(404);
    }
    
    public function getBlogSingle($slug, PostInterface $postRepository){
    	$post = $postRepository->getBySlug($slug, true);
    	
    	if (!empty($post)) {
     		$body_class = "post-template-default single single-post postid-5324 single-format-standard";
     		$popular = $postRepository->getPopularPosts(10);
    		
     		return Theme::scope('blog_single', compact('post', 'popular' ,'body_class'))->render();
    	}
    	abort(404);
    }
    
    
    public function postRegister(Request $request)
    {
    	$validator = Validator::make($request->all(), [
    			'first_name' => 'required',
    			'last_name' => 'required',
    			'username' => 'required|unique:users,username',
    			'email' => 'required|unique:users,email',
    			'phone' => 'required',
    			'password' => 'required|confirmed',
    			'g-recaptcha-response' => 'required',
    	]);
    	if ($validator->fails()) {
    		return back()->withErrors($validator)->withInput();
    	}
    	
    	$user = $this->userRepository->getFirstBy(['email' => $request->input('email')]);
    	
    	$token = str_random(32);
    	
    	if (!$user) {
    		$user = $this->userRepository->getModel();
    		$user->email = $request->input('email');
    		$user->first_name = $request->input('first_name');
    		$user->last_name = $request->input('last_name');
    		$user->username = $request->input('username');
    		$user->password = Hash::make( $request->input('password'));
    		$user->profile_image = config('acl.avatar.default');
    		
    		$this->userRepository->createOrUpdate($user);
    		
    		$this->sentEmailInvite([
    				'user' => $user->username,
    				'token' => $token,
    				'email' => $user->email,
    				'content' => '',
    				'name' => $user->getFullName(),
    		], [
    				'name' => $user->getFullName(),
    				'to' => $user->email,
    		]);
    		
    		$newInvite = $this->inviteRepository->getModel();
    		
    		$newInvite->token = $token;
    		$newInvite->user_id = 1;
    		$newInvite->invitee_id = $user->id;
    		$newInvite->role_id = 2;
    		$this->inviteRepository->createOrUpdate($newInvite);
    		
    		Session::flash('message', 'Your account has been created. Activation link sent by email, Please Check and Activate.');
    		Session::flash('alert-class', 'alert-success'); 
    		
    		return back()->with(['success' => 1, 'message' => "Your account has been created. Activation link sent by email, Please Check and Activate."]);
    	} 
    	
    	
    }
    
    
    protected function sentEmailInvite($data, $args = [])
    {
    	EmailHandler::send(view('acl::emails.invite', compact('data'))->render(), 'Activate your Account', $args);
    }
    

    /**
     * @param $slug
     * @param TagInterface $tagRepository
     * @return \Response
     * @author Sang Nguyen
     */
    public function getByTag($slug, TagInterface $tagRepository)
    {
        $tag = $tagRepository->getBySlug($slug, true);

        if (!$tag) {
            return abort(404);
        }

        SeoHelper::setTitle($tag->name)->setDescription($tag->description);

        admin_bar()->registerLink(trans('blog::tags.edit_this_tag'), route('tags.edit', $tag->id));

        $posts = get_posts_by_tag($tag->slug);

        Theme::breadcrumb()->add(__('Home'), route('public.index'))->add($tag->name, route('public.tag', $slug));
        return Theme::scope('tag', compact('tag', 'posts'))->render();
    }

    /**
     * @param Request $request
     * @param PostInterface $postRepository
     * @param PageInterface $pageRepository
     * @return array
     * @author Sang Nguyen
     */
    public function getApiSearch(Request $request, PostInterface $postRepository, PageInterface $pageRepository)
    {
        $query = $request->get('q');
        if (!empty($query)) {

            $posts = $postRepository->getSearch($query);
            $pages = $pageRepository->getSearch($query);

            $data = [
                'items' => [
                    'Posts' => Theme::partial('search.post', compact('posts')),
                    'Pages' => Theme::partial('search.page', compact('pages')),
                ],
                'query' => $query,
                'count' => $posts->count() + $pages->count()
            ];

            if ($data['count'] > 0) {
                return [
                    'error' => false,
                    'data' => apply_filters(BASE_FILTER_SET_DATA_SEARCH, $data, 10, 1)
                ];
            }

        }
        return ['error' => true, 'message' => trans('bases::layouts.no_search_result')];
    }

    /**
     * @param Request $request
     * @param PostInterface $postRepository
     * @return \Response
     */
    public function getSearch(Request $request, PostInterface $postRepository)
    {
        SeoHelper::setTitle(__('Search result for: ') . '"' . $request->get('q') . '"')->setDescription(__('Search result for: ') . '"' . $request->get('q') . '"');

        $posts = $postRepository->getSearch($request->get('q'), 0, 12);

        Theme::breadcrumb()->add(__('Home'), route('public.index'))->add(__('Search result for: ') . '"' . $request->get('q') . '"', route('public.search'));
        return Theme::scope('search', compact('posts'))->render();
    }

    /**
     * @param $slug
     * @param UserInterface $userRepository
     * @return \Response
     * @author Sang Nguyen
     */
    public function getAuthor($slug, UserInterface $userRepository)
    {
        $author = $userRepository->getFirstBy(['username' => $slug]);
        if (!$author) {
            return abort(404);
        }

        admin_bar()->registerLink('Edit this user', route('user.profile.view', $author->id));

        SeoHelper::setTitle($author->getFullName())->setDescription($author->about);
        Theme::breadcrumb()->add(__('Home'), route('public.index'))->add($author->getFullName(), route('public.author', $slug));
        return Theme::scope('author', compact('author'))->render();
    }

    /**
     * @param PostInterface $postRepository
     * @param PageInterface $pageRepository
     * @param CategoryInterface $categoryRepository
     * @param TagInterface $tagRepository
     * @param UserInterface $userRepository
     * @return mixed
     * @author Sang Nguyen
     */
    public function getSitemap(PostInterface $postRepository, PageInterface $pageRepository, CategoryInterface $categoryRepository, TagInterface $tagRepository, UserInterface $userRepository)
    {
        // create new site map object
        $site_map = app()->make('sitemap');

        // set cache (key (string), duration in minutes (Carbon|Datetime|int), turn on/off (boolean))
        // by default cache is disabled
        $site_map->setCache('public.sitemap', config('cms.cache_sitemap'));

        // check if there is cached site map and build new only if is not
        if (!$site_map->isCached()) {

            $site_map->add(route('public.index'), '2016-14-20T20:10:00+02:00', '1.0', 'daily');

            // get all posts from db
            $posts = $postRepository->getDataSiteMap();

            // add every post to the site map
            foreach ($posts as $post) {
                $site_map->add(route('public.single.detail', $post->slug), $post->updated_at, '0.8', 'daily');
            }

            // get all categories from db
            $categories = $categoryRepository->getDataSiteMap();

            // add every category to the site map
            foreach ($categories as $category) {
                $site_map->add(route('public.single.detail', $category->slug), $category->updated_at, '0.8', 'daily');
            }

            // get all pages from db
            $pages = $pageRepository->getDataSiteMap();

            // add every page to the site map
            foreach ($pages as $page) {
                $site_map->add(route('public.single.detail', $page->slug), $page->updated_at, '0.8', 'daily');
            }

            // get all tags from db
            $tags = $tagRepository->getDataSiteMap();

            // add every tag to the site map
            foreach ($tags as $tag) {
                $site_map->add(route('public.tag', $tag->slug), $tag->updated_at, '0.3', 'weekly');
            }

            // get all users from db
            $users = $userRepository->getDataSiteMap();

            // add every user to the site map
            foreach ($users as $user) {
                $site_map->add(route('public.author', $user->username), $user->updated_at, '0.8', 'daily');
            }

            do_action(BASE_ACTION_REGISTER_SITE_MAP, $site_map);
        }

        // show your site map (options: 'xml' (default), 'html', 'txt', 'ror-rss', 'ror-rdf')
        return $site_map->render('xml');
    }
}
