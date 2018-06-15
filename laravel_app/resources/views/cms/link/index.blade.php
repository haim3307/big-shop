@extends('cms.model.index')

@section('index-content')
    @component('cms.model.inc.data-table',['items'=>\App\Link::all(),'entity'=>$entity])

    @endcomponent

@endsection
