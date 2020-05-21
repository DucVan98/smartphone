@extends('layout')
@section('content')
<section class="product-content">
    <h1 class="title">
        <span>
            Sản phẩm
        </span>
    </h1>
    <div class="product-block clearfix">
        <div class="product-list row">
            @foreach($all_product as $key => $product)
            <div class="col-md-2 col-sm-2 col-xs-12 product-resize product-item-box">
                <div class="product-item wow pulse">
                    <form action="{{URL::to('/save-cart')}}" method="post">
                        {{ csrf_field() }}

                        <input type="hidden" name="productid_hidden" value="{{$product->prudct_id}}" class="cart_product_id_{{$product->prudct_id}}">
                        <input type="hidden" name="name" value="{{$product->product_name}}" class="cart_product_name_{{$product->prudct_id}}">
                        <input type="hidden" name="image" value="{{$product->product_image}}" class="cart_product_image_{{$product->prudct_id}}">
                        <input type="hidden" name="price" value="{{$product->product_price}}" class="cart_product_price_{{$product->prudct_id}}">
                        <input type="hidden" name="qty" value="1" class="cart_product_qty_{{$product->prudct_id}}">

                        <div class="image image-resize">

                            <a href="{{URL::to('/chi-tiet-san-pham/'.$product->prudct_id)}}" title="{{$product->product_name}}">
                                <img src="{{URL::to('public/uploat/product/'.$product->product_image)}}" class="img-responsive lazy-img" />
                            </a>
                        </div>
                        <div class="right-block">
                            <h2 class="name">
                                <a href="{{URL::to('/chi-tiet-san-pham/'.$product->prudct_id)}}" title="{{$product->product_name}}">{{$product->product_name}}</a>
                            </h2>
                            <div class="price">
                                <span class="price-new">{{number_format($product->product_price).' '.'VND'}}</span>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-default add-to-cart" name="add-to-cart" data-id="{{$product->prudct_id}}">Thêm vào giỏ hàng</button>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection