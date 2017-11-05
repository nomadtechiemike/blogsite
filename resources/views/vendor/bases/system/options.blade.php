@extends('bases::layouts.master')
@section('content')
    <div class="admin-grid">
        <div class="row">

            <div class="col-md-4">
                <div class="list-group config-item">
                    <a href="{{ route('roles.list') }}" class="list-group-item">
                        <i class="icon-directions"></i>
                        <h4 class="list-group-item-heading">{{ trans('bases::system.role_and_permission') }}</h4>
                        <p class="list-group-item-text">{{ trans('bases::system.role_and_permission_description') }}</p>
                    </a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="list-group config-item">
                    <a href="{{ route('users.list') }}" class="list-group-item">
                        <i class="icon-people"></i>
                        <h4 class="list-group-item-heading">{{ trans('bases::system.user_management') }}</h4>
                        <p class="list-group-item-text">{{ trans('bases::system.user_management_description') }}</p>
                    </a>
                </div>
            </div>

            <div class="col-md-4">
                <div class="list-group config-item">
                    <a href="{{ route('users-supers.list') }}" class="list-group-item">
                        <i class="icon-user"></i>
                        <h4 class="list-group-item-heading">{{ trans('bases::system.options.manage_super') }}</h4>
                        <p class="list-group-item-text">{{ trans('bases::system.options.manage_super_description') }}</p>
                    </a>
                </div>
            </div>

        </div>
    </div>
@stop
