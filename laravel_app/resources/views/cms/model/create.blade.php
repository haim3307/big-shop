@extends('cms.cms')
@section('head')
    <link rel="stylesheet" href="{{asset('css/cms/fileUpload.css')}}">
@endsection
@section('content')
    <div style="margin-top: 20px;"></div>
    @include('cms.model.forms.create')
    <script src="{{asset('js/cms/fileUpload.js')}}"></script>

@endsection
