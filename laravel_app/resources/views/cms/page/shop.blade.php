@extends('cms.page.page-master.index')
@section('page-master-content')
    @include('cms.inc.changes-order-form')
    <categories-display :categories="categories" :cms-mode="true"></categories-display>
@endsection
@push('vue-scripts')
    <script>

			CMSAppOBJ.data.categories = {!! $categories !!};
			oldItems = {!! $categories !!};
			items = CMSAppOBJ.data.categories;

			function onSubmitChangesForm() {
				var el = $("#tabs").tabs('option', 'active') ? '.table-sortable tbody' : '.thumbnail-sortable';
			}
    </script>
@endpush
