@extends('cms.model.index')

@section('index-content')

    @component('cms.model.inc.data-table',['items'=>$items,'entity'=>$entity])
        @slot('ths')
            <th scope="col">Price</th>
            <th scope="col">Category</th>
            <th scope="col">Stock</th>
        @endslot
        @slot('tds')
            @verbatim
            <td>{{$item->price}}$</td>
            <td><a href="{{url('cms/category/'.$item->mainCategory->url)}}">{{$item->mainCategory->name}}</a></td>
            <td>{{$item->stock}}</td>
            @endverbatim
        @endslot
    @endcomponent
@endsection
