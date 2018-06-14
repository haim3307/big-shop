<div class="form-group row flex-column">
    <label for="{{$entity.ucwords($prop)}}" class="col-sm-2 col-form-label">{{ucwords($displayProp??$prop)}}</label>
    @empty($input)
        <input type="{{$type??'text'}}" name="{{$prop}}" class="form-control" id="{{$entity.ucwords($prop)}}" placeholder="{{ucwords($displayProp??$prop)}}"
               value="{{$type !== 'password'?old($prop,$entityItem->$prop??''):''}}">
        @else
        {!! $input !!}
    @endempty
    @if($errors->has($prop))
        <div class="text-danger">{{$errors->first($prop)}}</div>
    @endif
</div>