<script>
    {{--{!! Cart::getContent() !!}--}}
    //vue-cart-script
		function vueShopCart() {
            @if(Session::has('clear_cart'))
                localStorage.setItem('cartItems', []);
                shopAppOBJ.data.cartItems = [];
                localList = [];
            @endif
			shopAppOBJ.data.cartItems = (Array.isArray(localList) ? localList : []).filter(function (item) {
				return item && item.id && item.title;
			});
			shopAppOBJ.data.product = {"title": "", "main_img": ""};
			shopAppOBJ.data.addedToCart = false;
			shopAppOBJ.data.cartCount = shopAppOBJ.data.cartItems.length;

			shopAppOBJ.computed.cartItemsLength = function () {
				return shopAppOBJ.data.cartItems.length;
			};
			shopAppOBJ.computed.totalSubPriceCoined = function () {
				return shopAppOBJ.data.cartItems.reduce((accumulator, currentValue, currentIndex, array) => accumulator + (currentValue.quantity * currentValue.price), 0);
			};
			shopAppOBJ.computed.totalPriceCoined = function () {
				return this.totalSubPriceCoined * 1.18;
			};
			shopAppOBJ.computed.totalQuantity = () => shopAppOBJ.data.cartItems.reduce((accumulator, currentValue, currentIndex, array) => accumulator + currentValue.quantity, 0);

			shopAppOBJ.methods.deleteitem = function (item) {
				shopAppOBJ.data.cartItems = shopAppOBJ.data.cartItems.filter(i => i.id !== item.id);
			};
			shopAppOBJ.methods.emitDeleteItem = function () {
				this.$emit('deleteitem', this.cartItem);
			};
			shopAppOBJ.methods.updateItemQuantity = function () {
				this.totalSubPrice = 1;
			};
			shopAppOBJ.methods.addToCartEvent = addToCartEvent;
			/*
            $('.addToCartB').on('click', function (e) {
                var id = $(this).data('id');
                e.preventDefault();
                e.stopPropagation();
                if (!shopAppOBJ.data.cartItems.some(function (cartItem) {
                        return id === cartItem.id;
                    })) {
                    $.ajax({
                        url: window.url + '/cart',
                        method: 'POST',
                        data: {pid: $(this).data('id')},
                    }).then((res) => {
                        console.log('try to add', JSON.parse(res), typeof JSON.parse(res), typeof res);
                        res = JSON.parse(res);
                        if (res) shopAppOBJ.data.cartItems.push(res);
                    });
                }

            });
*/

			/*
                    shopAppOBJ.filters.fixedNum = (num) => num.fixed(2);
            */
			/*			shopAppOBJ.watch = {
                            cartItems: {
                                deep: true,
                                handler: todoStorage.save,
                            },
                        };*/


		}
</script>