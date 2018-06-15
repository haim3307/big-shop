<template>
    <li class="categoryModelItem" @click="goTo()">
        <div class="categoryFrame" :style="{backgroundImage:bgi_white}"
             :class="{itemFrameImg:this.subCategory.product_img}">
            <img :src="subCategory_img" alt="">
        </div>
        <div class="categoryInfo">
            <a class="linkToCategory" v-bind:href="subCategory_link">
                &gt;
            </a>
            <h3>{{subCategory.name}}</h3>
        </div>
    </li>
</template>

<script>

	export default {
		name: "sub-category-display",
		props: ['category', 'subCategory'],
		computed: {
			category_img() {
				return `${this.url}/_img/categories/${this.category.img}`;
			},
			category_link() {
				return `${this.url}/shop/${this.category.url}`;
			},
			subCategory_img() {
				let path = `${this.url}/_img/`;
				if (this.subCategory.img) {
					path += `sub-categories/${this.subCategory.img}`;
				} else if (this.subCategory.product_img) {
					path += `products/${this.category.url}/${this.subCategory.product_img}`
				} else {
                    path = 'http://via.placeholder.com/300x300?text=NO+PRODUCTS';
				}
				return path;
			},
			subCategory_link() {
				return `${this.category_link}/${this.subCategory.url}`;
			},
			bgi_white() {
				return `url('${this.url}/_img/bg_items_white.png')`;
			}
		},
		methods: {
			goTo() {
				/*
                                window.location = `${this.url}/shop/${this.category.url}/`;
                */
			}
		}
	}
</script>

<style>
    .itemFrameImg img {
        height: auto;
        max-width: 100%;
    }
</style>