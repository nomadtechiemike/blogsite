@extends('bases::layouts.master')
@section('content')
    @include('bases::elements.tables.datatables', ['title' => trans('comment::comment.list'), 'dataTable' => $dataTable])
@stop