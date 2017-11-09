@extends('bases::layouts.master')
@section('content')
    {!! Form::open(['route' => ['comment.edit', $comment->id]]) !!}
        @php do_action(BASE_ACTION_EDIT_CONTENT_NOTIFICATION, COMMENT_MODULE_SCREEN_NAME, request(), $comment) @endphp
        <div class="row">
            <div class="col-md-9">
                <div class="main-form">
                    <div class="form-body">
                        <div class="form-group @if ($errors->has('name')) has-error @endif">
                            <label for="name" class="control-label required">{{ trans('bases::forms.name') }}</label>
 					<p>{{ ('Comment') }}: {{ $comment->comment }}</p>
                    <p>{{ ('Author') }}: {{ $comment->user->username }}</p>
                    <p>{{ ('At') }}: {{ $comment->created_at->format('d, M Y H:i:s a') }}</p>
                        </div>
                    </div>
                </div>
                @php do_action(BASE_ACTION_META_BOXES, COMMENT_MODULE_SCREEN_NAME, 'advanced', $comment) @endphp
            </div>
            <div class="col-md-3 right-sidebar">
                @include('bases::elements.form-actions')
                @include('bases::elements.forms.status', ['selected' => $comment->status])
                @php do_action(BASE_ACTION_META_BOXES, COMMENT_MODULE_SCREEN_NAME, 'top', $comment) @endphp
                @php do_action(BASE_ACTION_META_BOXES, COMMENT_MODULE_SCREEN_NAME, 'side', $comment) @endphp
            </div>
        </div>
    {!! Form::close() !!}
@stop
