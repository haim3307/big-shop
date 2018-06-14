@extends('users.profile')
@section('settings-content')
    <div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th></th>
                    <th></th>
                    <th>Product Name</th>
                    <th>Unit Price</th>
                    <th>Stock Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($wishList as $wishListItem)
                    <tr>
                        <td><a href="" class="removeFromList" data-wish-id="{{$wishListItem->id}}">×</a></td>
                        <td><img class="img-fluid" style="max-width: 100px" src="{{asset("_img/products/{$wishListItem->product->mainCategory->url}/{$wishListItem->product->main_img}")}}" alt=""></td>
                        <td>{{ucwords($wishListItem->product->title)}}</td>
                        <td>${{$wishListItem->product->price}}</td>
                        <td>
                            @if ($wishListItem->product->stock)
                                <span class="badge badge-success">in stock</span>
                                @else
                                <span class="badge badge-danger">out of stock</span>
                            @endif
                        </td>
                        <td>@include('items.buttons.add-to-cart',['product'=>$wishListItem->product])</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
@push('styles')
    <style>
        .removeFromList, .removeFromList:focus, .removeFromList:hover {
            text-decoration: none;
        }
        .removeFromList:hover {
            color: #fff!important;
            background: red;
        }
        .removeFromList{
            display: block;
            font-size: 1.5em;
            height: 1em;
            width: 1em;
            text-align: center;
            line-height: 1;
            border-radius: 100%;
            color: red!important;
            text-decoration: none;
            font-weight: 700;
            border: 0;
        }
    </style>

@endpush
