<template>
    <li class="categoryModelItem" :class="{categoryModelItemFront:cmsMode}" @click="emitCategorySelect">
        <div class="categoryFrame allCentered">
            <img :src="category_img" alt="">
        </div>
        <div class="categoryInfo" :class="{selectedCategory:isSelected == category.id}">
            <a class="linkToCategory" :href="category_link">
                &gt;
            </a>
            <h3>{{category.name}}</h3>
        </div>
    </li>
</template>

<script>
	export default {
		name: "category-display",
		props: {
			cmsMode: {
				type: Boolean,
				default: false,
			}, 'isSelected': {default: false}, 'category': {default: {}}
		},

		computed: {
			category_img() {
				let path = `${this.url}/_img/`;
				if (this.category.img) {
					path += `categories/${this.category.img}`;
				} else if (this.category.product_img) {
					path += `products/${this.category.url}/${this.category.product_img}`
				} else {
					path = 'http://via.placeholder.com/600x600?text=' + this.category.name;
				}
				return path;
			},
			category_link() {
				return `${this.url}/shop/${this.category.url}`;
			}
		},
		methods: {
			emitCategorySelect() {
				this.$emit('oncategoryselect', this.category);
			}
		}
	}
</script>
<style lang="scss">
    .selectedCategory {
        background-color: #CD1121;
        border-color: #CD1123;
    }

    .selectedCategory h3 {
        color: white !important;
    }

    .categoryFrame img {
        transition: 0.7s all;
    }

    .categoryModelItemFront:hover .categoryFrame img {
        transform: scale(1.2);
    }
</style>