@extends('cms.model.index')

@section('index-content')
    @component('cms.model.inc.data-table',['items'=>$items,'entity'=>$entity])
        @slot('ths')
            <th scope="col">Core/Custom</th>
        @endslot
        @slot('tds')
            @verbatim
                <td style="padding: 15px 20px;">@include('cms.layouts.inc.is-core-badge',['navItem'=>$item,'style'=>'min-height:50px;padding:0 20px !important;'])</td>
            @endverbatim
        @endslot
    @endcomponent

@endsection
