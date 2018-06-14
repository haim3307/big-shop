<template>
    <div class="shopCartItem d-grid grid-col-sm-12" style="border-bottom: 2px lightgray solid; padding: 22px 1em;">
        <div class="g-col-xl-8 g-col-md-6  g-col-sm-7 d-grid-row grid-col-sm-12">
            <div class="g-col-xl-2 g-col-4 allCentered" style="padding-right: 20px;     overflow: hidden;
    height: 70px;"><img class="img-fluid" :src="main_img" alt=""></div>
            <h3 class="g-col-xl-10 g-col-8" style="text-transform: capitalize">{{cartItem.title | capitalize}}</h3>
        </div>
        <div class="g-col-xl-4 g-col-md-6  g-col-sm-5  d-grid-row changeQuantity">
            <span v-text="itemPrice"></span>
            <div style="display: flex">
                <span class="input-group-btn">
                    <button type="button" class="btn btn-default btn-number" @click="changeQuantity($event,'-')"
                            :disabled="cartItem.quantity < 2" data-type="minus"
                            data-field="quant[1]">
                        <i class="fa fa-minus"></i>
                    </button>
                 </span>
                <input type="text" name="quant[1]" class="form-control input-number text-center"
                       :value="cartItem.quantity" min="1"
                       max="10" style="width: 50px;">
                <span class="input-group-btn">
                              <button type="button" class="btn btn-default btn-number"
                                      @click="changeQuantity($event,'+')"
                                      data-type="plus"
                                      data-field="quant[1]">
                                  <i class="fa fa-plus"></i>
                              </button>
                            </span>
            </div>
            <span v-text="itemPriceTimeQuantity"></span>
            <span @click="emitDeleteItem"><i class="fa fa-close"></i></span>
        </div>
    </div>
</template>

<script>
	export default {
		name: "shop-cart-item",
		props: ['cartItem'],
		mounted() {
					if(!this.cartItem.quantity) this.$set(this.cartItem,'quantity',1);
					console.log(this.cartItem,'check quan');
		},
		computed: {
			main_img: function () {
				//'http://via.placeholder.com/70x70'
				return `${this.url}/_img/products/${this.cartItem['c_url']?this.cartItem['c_url']:this.cartItem['main_category'].url}/${this.cartItem['main_img']}`
			},
			itemPrice: function () {
				return '$ ' + this.cartItem.price;
			},
			itemPriceTimeQuantity: function () {
				return '$ ' + (this.cartItem.price * this.cartItem.quantity).toFixed(2);
			}
		},
		methods: {
			emitDeleteItem() {
				this.$emit('deleteitem', this.cartItem);
			},
			changeQuantity(e, act) {
				e.preventDefault();
				if (act == '+') {
					this.cartItem.quantity++;
				} else {
					this.cartItem.quantity--;
				}
				this.$emit('update-item-quantity', this.cartItem);
			}
		}
	}
</script>

<style>

</style>