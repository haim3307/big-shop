@extends('layouts.site-route-nav')
@section('sectionB')
    {{--    <img src="{{asset('_img/grid-4-icon.png')}}" alt="">
        <img src="{{asset('_img/grid-1-icon.png')}}" style="padding-left: 9px;" alt="">
        <select name="" id="">
            <option value="">Lorem ipsum dolor.</option>
            <option value="">Lorem ipsum dolor.</option>
            <option value="">Lorem ipsum dolor.</option>
        </select>--}}
    <div class="d-flex align-items-center" style="flex: 1 33.333%; height: 100%; margin: 0 10px;">
        <select name="order-by-price" id="" class="custom-select">
            <option value="">Order By Price..</option>
            <option value="high" @if(old('order-by-price') == 'high') selected="selected" @endif>High to low</option>
            <option value="low" @if(old('order-by-price') == 'low') selected="selected" @endif>Low to high</option>
        </select>
    </div>
    <div style="flex: 1 33.333%;" class="input-group">
        <input type="text" class="form-control SearchBar" placeholder="Search for..." name="product-search" value="{{old('product-search')}}">
        <span class="input-group-btn">
            <button class="btn btn-default SearchButton" type="submit">
                <span class=" fa fa-search SearchIcon"></span>
            </button>
        </span>
    </div>
    <div style="flex: 1 33.333%; height: 100%"></div>
    <!-- /input-group -->
@endsection