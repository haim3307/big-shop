@extends('cms.model.index')

@section('index-content')
    @component('cms.model.inc.data-table',['items'=>\App\User::all(),'entity'=>$entity,'prop1'=>'name'])
        @slot('ths')
            <th scope="col">Email</th>
            <th scope="col">Role</th>
        @endslot
        @slot('tds')
            @verbatim
                <td>{{$item->email}}</td>
                <td>
                    @include('cms.inc.forms.inputs.select-role')
                </td>
            @endverbatim
        @endslot
    @endcomponent
@endsection
@push('scripts')
    <script>
			$('.roleSelect').on('change', function (e) {
				var user_id = $(this).data('user-id'),role_id = $(this).val();
                $.ajax({
                  url: BASE_URL+'/cms/user/'+user_id+'/role',
                  method: "PATCH",
                  data:{
                  	role_id: role_id,
                  }
                })
			});
    </script>
@endpush