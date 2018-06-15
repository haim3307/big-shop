<table class="display" id="productsTable">
    <thead>
    <tr>
        <th scope="col">#</th>
        <td>{{isset($prop1)?ucwords($prop1):'Title'}}</td>
        <th scope="col">Url</th>
        {{$ths??''}}
        <th scope="col">Created At</th>
        <th scope="col">Updated At</th>
        <th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>
    @foreach($items as $item)
        <tr data-{{$entity}}-id="{{$item->id}}">
            <th scope="row">{{$item->id}}</th>
            <td title="{{isset($prop1)?$item->$prop1:$item->title}}">{{isset($prop1)?$item->$prop1:$item->title}}</td>
            <td title="{{$item->url}}">{{$item->url}}</td>
            {!! isset($tds)?view(['template' => $tds], ['item' => $item]):'' !!}
            <td title="{{$item->created_at}}">{{$item->created_at}}</td>
            <td title="{{$item->updated_at}}">{{$item->updated_at}}</td>
            <td>
                @include('cms.inc.buttons.edit-btn',['entity'=>$entity,'item'=>$item])
                @include('cms.inc.buttons.delete-btn',['entity'=>$entity,'item'=>$item ])
            </td>

        </tr>
    @endforeach
    </tbody>
</table>
