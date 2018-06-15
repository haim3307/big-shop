@extends('cms.model.create')
@section('create-content')
    @php($entity = 'product')
    <div class="form-group row flex-column">
        <label for="{{$entity}}Price" class="col-sm-2 col-form-label">Price</label>
        <input type="number" name="price" class="form-control" id="{{$entity}}Price" placeholder="Price" value="{{old('price',$entityItem->price??'')}}">
        @if($errors->has('price')) <div class="text-danger">{{$errors->first('price')}}</div> @endif
    </div>
{{--    <div class="form-group row flex-column">
        <label for="{{$entity}}Tags" class="col-sm-2 col-form-label">Tags</label>
        <input type="text" name="tags" data-role="tagsinput" class="form-control" id="{{$entity}}Tags" placeholder="Add Tags">
    </div>--}}
    <div class="form-group row flex-column">
        <label for="{{$entity}}Category" class="col-sm-2 col-form-label">Category</label>
        <select class="custom-select custom-select-lg mb-3" name="category_id" id="{{$entity}}Category" required="required">
            <option value="">Please Select Category..</option>
            @foreach(\App\Category::all() as $category)
                <option data-category-id="{{$category->id}}" @if(old('category_id',$entityItem->category_id??'') == $category->id) selected="selected" @endif value="{{$category->id}}">{{ucwords($category->name)}}</option>
            @endforeach
        </select>
        @if($errors->has('category_id')) <div class="text-danger">{{$errors->first('category_id')}}</div> @endif

    </div>

    @include('cms.model.inc.file-upload',['name'=>'main_img'])
    <hr class="g-col-2">
    <div class="form-group">
        <textarea name="description" class="form-control" id="description">{{old('description',$entityItem->description??'')}}</textarea>
        @if($errors->has('description')) <div class="text-danger">{{$errors->first('description')}}</div> @endif

    </div>
@endsection
