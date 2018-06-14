<button class="buyNowWideButton addToCartB" @include('inc.print-object',['product'=>$product->toArray()]) data-toggle="modal" data-target="#product_view" data-id="{{$product['id']}}">
                        <span class="allCentered buyIconFrame "><img alt="" src="{{asset('/_img/Shopping%20Cart%203.png')}}">
                        </span>
    <span class="btnTitle">Add to cart</span>
</button>