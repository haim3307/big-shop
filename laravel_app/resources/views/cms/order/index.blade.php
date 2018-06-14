@extends('cms.model.index')

@section('index-content')
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Order</th>
            <th scope="col">User</th>
            <th scope="col">Created At</th>
            <th scope="col">Updated At</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>
        @foreach($items as $item)
            <tr>
                <td scope="row">{{$item->id}}</td>
                <td>
                    <ul class="list-group">
                        @foreach($item->list as $orderItem)
                            <li class="list-group-item">
                                <div>Title : {{$orderItem->item->title}}</div>
                                <div>Quantity : {{$orderItem->quantity}}</div>
                                <div>Price : {{$orderItem->item->price}}$</div>

                            </li>
                        @endforeach
                    </ul>

                </td>
                <td>
                    <div><span>Name</span> : {{$item->user->name}}</div>
                    <div><span>Email</span> : {{$item->user->email}}</div>
                </td>
                <td>{{$item->created_at}}</td>
                <td>{{$item->updated_at}}</td>
                <td></td>
            </tr>
        @endforeach
        </tbody>
    </table>


    <div style="padding: 15px;">{!! $items->render("pagination::bootstrap-4") !!}</div>

@endsection
@push('styles')
    <style>
        td {
            max-width: initial;
            overflow: initial;
            text-overflow: initial;
        }
        #createBTN{
            display: none !important;
        }
</style>
@endpush