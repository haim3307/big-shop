<template>
    <table class="table table-sortable">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th>Title</th>
            <th>Url</th>
            <th>Price</th>
            <th>Category</th>
            <th>Updated At</th>
            <th>Created At</th>
        </tr>
        </thead>
        <draggable :list="listObj.items" :options="{animation:200,handle:'.fa-arrows-alt'}" :element="'tbody'">
            <tr v-if="product && product.id" v-for="product in list" :id="product.id">
                <th scope="row"><span class="fa fa-arrows-alt"></span>{{product.id}}</th>
                <td>{{product.title}}</td>
                <td>{{product.url}}</td>
                <td>{{product.price}}$</td>
                <td><a :href="url+'/cms/category/'+product.c_url">{{product.c_url}}</a></td>
                <td>{{product.updated_at}}</td>
                <td>{{product.created_at}}</td>
            </tr>
        </draggable>
    </table>
</template>

<script>
	import draggable from 'vuedraggable';

	export default {
		name: "deals-table",
		props: ['listObj'],
		components: {draggable},
		beforeMount() {
		},
		mounted() {

		},
		computed: {
			list() {
                return this.listObj.items.map(item => item.entityItem).filter(item => item && item.id);
			}
		}
	}
</script>

<style>

</style>