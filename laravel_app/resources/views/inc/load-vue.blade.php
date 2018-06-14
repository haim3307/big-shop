<script>
	//load-vue
	load.js('{{asset('js/lib/http_cdn.jsdelivr.net_npm_vue@2.5.16_dist_vue.min.js')}}').then(function () {
		Vue.prototype.url = BASE_URL;
		load.js(BASE_URL + '/js/app.min.js').then(function () {
			VueComponents();
			tpl();
			tplVue();
			vueShopCart();
			shopAppOBJ.data.autoCompleteFrontList = [];
			shopAppOBJ.data.quickProduct = {};
			const shopApp = new Vue(shopAppOBJ);
			shopApp.$watch('cartItems', function (newVal, oldVal) {
				console.log('changed cart-list', newVal);
				shopAppOBJ.data.cartCount = newVal;
				localStorage.setItem('cartItems', JSON.stringify(shopAppOBJ.data.cartItems));
				console.log('saved-on-local:', localStorage.getItem('cartItems'));
				console.log('running-on-local:', shopAppOBJ.data.cartItems);
				console.log('newCount:', shopAppOBJ.data.cartCount);
			}, {deep: true});
		})


	});

</script>