@extends('layouts.master')
@section('head')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
@endsection
@section('content')
    <div class="cartPage {{--cartApp--}}" id="shopCartApp" style="min-height: 80vh">
        <h1 class="d-none">Shopping Cart</h1>
        <div class="container-1112 d-grid grid-col-md-12" style="padding-top: 62px; grid-gap: 64px">
            @verbatim
                <div class="g-col-xl-9 g-col-md-8" id="style-2" style="overflow-y: scroll;height: 79vh;">
                    <div class="items" v-if="cartItems && cartItems.length" @update-item-quantity="updateItemQuantity">
                        <shop-cart-item v-for="cartItem in cartItems" :key="cartItem.id"
                                        :cart-item="cartItem" @deleteitem="deleteitem"></shop-cart-item>
                    </div>
                    <h2 v-else style="height: 89%;" class="allCentered">Your cart is empty</h2>
                </div>
                <div id="checkoutWindow" class="g-col-xl-3 g-col-md-4"
                     style="font-family: 'Source Sans Pro';color:  #595959;">
                    <div id="cartSummary">
                        <strong class="cartTitle">SHOPPING CART SUMMARY</strong>
                        <hr style="margin: 14px 0 29px 0;">
                        <div class="d-grid-row" style="margin-bottom: 10px"><span class="gray149"
                                                                                  style="letter-spacing: 0.4px;">CART SUBTOTAL</span><span
                                    class="bigGrayWide" v-cloak>${{totalSubPriceCoined | fixed}}</span>
                        </div>
                        <div class="d-grid-row"><span class="gray149"
                                                      style="letter-spacing: 0.4px;">SHIPPING</span><span
                                    class="bigGrayWide">Free shipping</span></div>
                        <hr style="margin: 29px 0;">
                        <div class="d-grid-row" style="margin: 20px 0;"><strong>ORDER TOTAL</strong><span
                                    class="bigGrayWide" v-cloak>${{totalPriceCoined | fixed}}</span>
                        </div>
                        @endverbatim
                        <form action="" id="checkoutForm" method="post" v-on:submit="toCheckout($event)">
                            {{csrf_field()}}
                            <label for="checkoutBTN"
                                   style="cursor: pointer; height: 54px;font-size: 1.1em;font-weight: 700;letter-spacing: 0.952px; color: white"
                                   class="allCentered text-center checkoutBtn">CHECKOUT
                                <input type="submit" class="d-none" id="checkoutBTN" name="checkout" value="1">
                            </label>
                            <input type="hidden" name="order" :value="orderIds" id="order">
                        </form>
                        <div class="gray149 text-center pointer" style="margin: 19px;" onclick=" history.back();">
                            CONTINUE SHOPPING
                        </div>
                        @verbatim
                    </div>
                    <div id="useCoupon" class="d-grid" style="margin-top: 38px;">
                        <strong class="cartTitle">USE COUPON CODE</strong>
                        <hr style="margin: 13px 0 18px 0;">
                        <p class="gray149" style="font-size: 13px;">If you have your promotional coupon code. just
                            rewrite it to form and apply</p>
                        <input type="text" placeholder="ENTER COUPON CODE" style="height: 36px; padding: 17px; ">
                        <div style="width: 91px;height: 32px; margin-top: 10px;" class="checkoutBtn allCentered">APPLY
                        </div>
                    </div>
                </div>
            @endverbatim

        </div>
    </div>

@endsection
@section('script')

    <script>
			function tpl() {
				shopAppOBJ.computed.orderIds = function (e) {
					return JSON.stringify(this.cartItems.filter(function (item) {
						return item.id > 0;
					}).map(function (item) {
						return {"id": item.id, "quantity": item.quantity};
					}));
				};
			}

			function tplJQ() {
				/*                $('.input-number').focusin(function () {
                                    $(this).data('oldValue', $(this).val());
                                });
                                $('.input-number').change(function () {

                                    minValue = parseInt($(this).attr('min'));
                                    maxValue = parseInt($(this).attr('max'));
                                    valueCurrent = parseInt($(this).val());

                                    name = $(this).attr('name');
                                    if (valueCurrent >= minValue) {
                                        $(".btn-number[data-type='minus'][data-field='" + name + "']").removeAttr('disabled')
                                    } else {
                                        alert('Sorry, the minimum value was reached');
                                        $(this).val($(this).data('oldValue'));
                                    }
                                    if (valueCurrent <= maxValue) {
                                        $(".btn-number[data-type='plus'][data-field='" + name + "']").removeAttr('disabled')
                                    } else {
                                        alert('Sorry, the maximum value was reached');
                                        $(this).val($(this).data('oldValue'));
                                    }


                                });*/
				$(".input-number").keydown(function (e) {
					// Allow: backspace, delete, tab, escape, enter and .
					if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
						// Allow: Ctrl+A
						(e.keyCode == 65 && e.ctrlKey === true) ||
						// Allow: home, end, left, right
						(e.keyCode >= 35 && e.keyCode <= 39)) {
						// let it happen, don't do anything
						return;
					}
					// Ensure that it is a number and stop the keypress
					if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
						e.preventDefault();
					}
				});
			}
    </script>
@endsection