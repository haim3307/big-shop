@extends('cms.cms')

@section('content')
    <style>
        @media (min-width: 1112px) {
            #productsTable_wrapper {
                padding: 10px 50px 0 50px;
            }

        }
        td {
            max-width: 100px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }
    </style>

    @yield('index-content')
    <div class="f-row p-5" id="createBTN"><a href="{{url("cms/$entity/create")}}" role="button" class="btn btn-primary">Create New</a>
    </div>

    <script>
			$(document).ready(function () {
				$('.delete{{ucwords($entity)}}').on('click', function (e) {
									const _self = $(this);
									$.ajax({
						method: 'DELETE',
						url: '{{url('')}}' + '/cms/{{$entity}}/' + _self.data('{{$entity}}-id'),
					})
						.then(function (res) {
							if (res == 1) {
								_self.parent().parent().remove();
								$('#productsTable').DataTable();
								toastr.success('{{ucfirst($entity)}} has been removed successfully');
							}
						}, function (e) {
							console.error('ajaxError: ', e);
						});
				});
				$('#productsTable').DataTable();
			});
    </script>
@endsection
