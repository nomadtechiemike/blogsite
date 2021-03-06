@extends('bases::layouts.error')

@section('content')

    <div>
        <div class="col-md-10">
            <h3>{{ trans('bases::errors.500_title') }}</h3>
            <p>{{ trans('bases::errors.reasons') }}</p>
            <ul>
                {!! trans('bases::errors.500_msg') !!}
            </ul>

            <p>{!! trans('bases::errors.try_again') !!}</p>
        </div>
    </div>

@stop
