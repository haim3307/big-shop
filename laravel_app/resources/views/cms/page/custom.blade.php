@extends('cms.page.page-master.index')
@section('page-master-content')
    <div class="customPage">
        @component('cms.model.forms.create',['entity'=>$entity,'entityItem'=>$page])
            @slot('createContent')
                <textarea class="form-control" id="customPageNote" name="page_content">{{$page->content??''}}</textarea>
            @endslot
        @endcomponent
        {{--
                <form action="" method="post" style="height: 100vh;">
                    {{csrf_field()}}
                    <input class="btn btn-primary m-2" type="submit" name="save_changes" value="Save Changes">
                    <input class="btn btn-primary m-2" type="submit" name="save_changes" value="Cancel">
                </form>--}}

    </div>
@endsection
@push('scripts')
    <style>
        .splitMode #customPageNote.form-control {
            height: 30vh;
        }

        #customPageNote.form-control {
            height: 60vh;
        }
    </style>
    <script>
			$(document).ready(function () {
				$('#customPageNote').summernote({
					placeholder: 'Write Page Here...',
					tabsize: 2,
					height: '60vh'
				});
			});
    </script>
@endpush