<template>
    <div class="categoriesDisplay">
        <draggable class="d-grid grid-col-md-2" style="grid-auto-rows: 600px" :list="categories"
                   :options="{animation:200,handle:'.categoryModelItem'}" :element="'ul'">
            <category-display v-for="category in categories" :key="category.id"
                              :category="category" :is-selected="selectedCategoryId"></category-display>
        </draggable>

    </div>
</template>

<script>
	import draggable from 'vuedraggable';

	export default {
		props: ['categories'],
		components: {draggable},
		data: function () {
			return {
				subCategories: false,
				selectedCategory: false,
				selectedCategoryId: false
			}

		},
		mounted() {
			console.log('categories:', this.categories);
			console.log('Component mounted.');
		},
		computed: {},
		methods: {}
	}
</script>


<style>
    .categoriesDisplay ul {
        /*            display: grid;
                    grid-template-columns: repeat(4,1fr);*/
        grid-auto-rows: 374px;
        grid-gap: 15px;

    }

    .categoriesDisplay .categoryModelItem {
        display: grid;
        grid-template-rows: 1fr 60px;
        border-radius: 3px;
        overflow: hidden;
    }

    .categoriesDisplay .categoryModelItem h3 {
        display: flex;
        align-items: center;
        padding-left: 15px;
        color: grey;
        text-transform: capitalize;
    }

    .categoryFrame {
        overflow: hidden;
    }

    .categoryFrame img {
        max-width: 170%;
        height: auto;
    }

    .categoryInfo {
        background-color: #fff;
        display: grid;
        border: 2px solid lightgray;
        border-top: 0;
        position: relative;
    }

    .linkToCategory {
        background-color: #F5F5F5;
        width: 50px;
        height: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 50px;
        position: absolute;
        right: 5px;
        top: -20px;
    }
</style>