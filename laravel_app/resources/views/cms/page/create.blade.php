@extends('cms.model.create')
@section('create-content')
    <fieldset class="form-group">
        <label class="form-check-label">Add To Main Nav ?</label>
        <span class="p-2">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="add_to_nav" id="inlineRadio1" value="1">
                        <label class="form-check-label" for="inlineRadio1">Yes</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="radio" name="add_to_nav" id="inlineRadio2" value="0"
                               checked>
                        <label class="form-check-label" for="inlineRadio2">No</label>
                    </div>
                </span>
    </fieldset>
    <textarea class="form-control" id="customPageNote" name="content">{{old('content',$entityItem->content??'')}}</textarea>
    <script>
			$(document).ready(function () {
				$('#customPageNote').summernote({
					placeholder: 'Write Page Here...',
					tabsize: 2,
					height: '60vh'
				});
				$('#pageName').on('blur', function (e) {
					$('#pageUrl').val($(this).val().seoFriendly());
				});
			});
    </script>
@endsection
