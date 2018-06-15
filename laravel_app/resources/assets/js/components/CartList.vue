<template>
    <ol class="items" v-if="cartItems && cartItems.length">
        <cart-item v-for="cartItem in cartItems" :key="cartItem.id" :cart-item="cartItem"
                   @deleteItem="deleteItem"></cart-item>
        <!-- end item -->
    </ol>
    <h3 v-else style="height: 89%;" class="allCentered">Your cart is empty</h3>
</template>

<script>
	/*
        import CartItem from "./CartItem";
    */

	export default {
		props: ['cartItems'],
		mounted() {
		},
		methods: {
			deleteItem(item) {
				window.shopAppOBJ.data.cartItems = window.shopAppOBJ.data.cartItems.filter((i) => i.id != item.id);
				window.updateCartedButtons();
			}
		}
		/*
                components: {CartItem},
        */
	}
</script>

<style scoped>

</style>