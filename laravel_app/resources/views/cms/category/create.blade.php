@extends('cms.model.create')
@section('create-content')
<div class="ft g-col-12 g-col-lg-6 profileImgSec" style="">
    <div class="g-col-12 profileZone">
        <h3 class="text-center">Upload Category Image</h3>
        <link rel="stylesheet" href="//fonts.googleapis.com/css?family=Roboto:300,300italic,400" />
        @include('cms.model.inc.file-upload',['name'=>'img'])
        @if($errors->has('img')) <div class="text-danger">{{$errors->first('img')}}</div> @endif


    </div>

</div>
@isset($category->img)
    <div class="container f-row justify-content-center">
        <category-display :category="{{$category}}"></category-display>
    </div>
@endisset
<script>
	const CMSApp = new Vue(CMSAppOBJ);
</script>
@endsection