<template>
    <li class="d-block">
        <a :href="url_item">
            <div class="product-image" style="display: flex; align-items: center;">
                <img :src="main_img"
                     class="img-responsive" :alt="cartItem['name']"></div>
            <div class="product-details">
                <div class="close-icon" v-on:click.prevent="emitDeleteItem"><a><i class="fa fa-close"></i></a>
                </div>
                <p class="product-name">{{cartItem['title'] | capitalize}}</p>
                <strong>{{cartItem['quantity']}}</strong> x <span
                    class="price text-primary">${{cartItem['price']}}</span>
            </div>
        </a>

        <!-- end product-details -->
    </li>
</template>

<script>
	export default {
		props: ['cartItem'],

		mounted() {
			if (!this.cartItem['quantity']) this.$set(this.cartItem, 'quantity', 1);
		},
		computed: {
			main_img() {
				return `${this.url}/_img/products/${this.cartItem['c_url']}/${this.cartItem['main_img']}`
			},
			url_item() {
				//!this.cartItem['c_name'] && (this.cartItem['c_name'] = selectedCategory);
                console.log(this.cartItem['main_category']);
				return `${this.url}/shop/${this.cartItem['c_url']?this.cartItem['c_url']:this.cartItem['main_category'].url}/${this.cartItem['url']}`;
			}
		},
		methods: {
			emitDeleteItem() {
				this.$emit('deleteItem', this.cartItem);
			},

		}
	}
</script>

<style scoped>

</style>