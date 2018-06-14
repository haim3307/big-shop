@extends('cms.model.index')

@section('index-content')
    @component('cms.model.inc.data-table',['items'=>\App\Category::all(),'entity'=>$entity,'prop1'=>'name'])

    @endcomponent
@endsection
