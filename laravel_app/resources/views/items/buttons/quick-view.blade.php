<button class="btn btn-light quickViewB" id="quickView{{$product->id}}" @include('inc.print-object', ['product' => $product->toArray()])>
    <i class="fa fa-eye" title="Quick View"></i>
</button>