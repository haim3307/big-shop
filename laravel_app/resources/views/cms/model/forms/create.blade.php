<div class="container p-1 p-md-5" style="padding-top: 20px !important;">
    <h1 class="h2 text-center">{{ (!isset($entityItem)?'Create New ':'Edit '). ucwords($entity)}}</h1>
    <form action="{{isset($entityItem)?url("cms/$entity/$entityItem->id"):url("cms/$entity/")}}" method="post"
          enctype="multipart/form-data" class="has-advanced-upload" novalidate="novalidate">
        {{csrf_field()}}
        {{isset($entityItem)?method_field('PUT'):''}}
        @isset($entityItem)<input type="hidden" name="item_id" value="{{$entityItem->id}}">@endisset
        <input type="hidden" id="manageMode" name="manage_mode" :value="pageManageMode">
        <div class="form-group row flex-column">
            <label for="{{$entity.ucfirst($prop1??'title')}}"
                   class="col-sm-2 col-form-label">{{ucfirst($prop1??'title')}}</label>
            <input type="text" name="{{$prop1??'title'}}" class="form-control" id="{{$entity.ucfirst($prop1??'title')}}"
                   placeholder="{{ucfirst($prop1??'title')}}"
                   value="{{old($prop1??'title',isset($entityItem)?isset($prop1)?$entityItem->$prop1:$entityItem->title:'')}}">
            @if($errors->has(($prop1??'title')))
                <div class="text-danger">{{$errors->first(($prop1??'title'))}}</div> @endif
        </div>
        @if($entity != 'user')
            <div class="form-group row flex-column">
                <label for="{{$entity}}Url" class="col-sm-2 col-form-label">Url</label>
                <input type="text" name="url" class="form-control" id="{{$entity}}Url" placeholder="Url"
                       value="{{old('url',$entityItem->url??'')}}">
                @if($errors->has('url'))
                    <div class="text-danger">{{$errors->first('url')}}</div> @endif
                <small>*This is used by permalinks</small>
            </div>
        @endif
        @yield('create-content')
        {{$createContent??''}}
        <hr class="g-col-2">

        <div class="form-group row">
            <button type="submit" class="btn btn-primary">@isset($entityItem) Save Changes @else
                    Create @endisset</button>
        </div>
    </form>
</div>
@push('scripts')
    <script>
			$(document).ready(function () {
				$('#{{$entity.ucwords($prop1??'title')}}').on('blur', function (e) {
					$('#{{$entity}}Url').val($(this).val().seoFriendly());
				});
				$('#description').summernote({
					height: '50vh'
				});
          @if(Session::get('categoryCreatedStatus') === 1)
					toastr.success('New category has been added!');
          @elseif(Session::get('categoryCreatedStatus') === -1)
					toastr.error('Category already exists');
          @elseif(Session::get('categoryCreatedStatus') === 0)
					toastr.error('error adding category');
          @endif
			});
    </script>
@endpush