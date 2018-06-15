<form id="changesOrderForm" class="f-row justify-content-center p-2" method="POST"
      style="background-color: cornflowerblue; position: sticky; z-index: 999; width: 100%; top: 0;" action="">
    {{csrf_field()}}
    <input type="hidden" name="manage_mode" :value="pageManageMode">
    <input type="submit" value="Save Changes" class="btn btn-primary">
    <div class="col-2"><input type="hidden" name="order" id="order"></div>
    <input type="button" value="Cancel" id="cancel" class="btn btn-danger">
</form>
@push('scripts')
    <script>
			var oldItems;
			var items;

			function onSubmitChangesForm() {
			}

			$('#changesOrderForm').on('submit', function (e) {
				e.preventDefault();
				onSubmitChangesForm();
				$('#order').val(items.map(function (product) {
					return product.id
				}).join());
				$(this).unbind('submit').submit();
			});
    </script>
@endpush