<template>

    <draggable class="f-row thumbnail-sortable" style="grid-auto-rows: minmax(700px,auto); grid-gap: 20px;"
               :list="listObj.items"
               :options="{animation:200,handle:'.card'}" :element="'div'">
        <thumb-item v-for="item in listObj.items"  :key="item.id" @deleteItem="$emit('deleteItem',item)"
                    :product="item.entityItem" :list-item="item" :list-obj="listObj"></thumb-item>
    </draggable>

</template>

<script>
	import draggable from 'vuedraggable';

	export default {
		name: "thumbnail-list",
		props: ['listObj'],
		components: {draggable},
		methods: {

		},
      mounted(){
			console.log('thumblist',this.listObj);
      }

	}
</script>

<style>

</style>