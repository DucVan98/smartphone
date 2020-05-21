@extends('layout')
@section('content')
<div class="menu-product" style="float: left;">
    <h3>
        <span>
            Danh mục sản phẩm <i class="fa  fa-angle-double-down"></i>
        </span>
    </h3>
    @foreach($brand_product as $key => $brand)
    <ul class='level0'>
        <li class="child sub0">
            <span>
                <a href="{{URL::to('/danh-muc-thuong-hieu/'.$brand->brand_id)}}"> {{$brand->brand_name}}
                </a>
            </span>
        </li>
    </ul class='level0'>
    @endforeach
</div>
<section class="product-content" style="margin-left: 200px;">
    <h1 class="title">
        <span>
            @foreach($brand_name_id as $key=> $br)
                <h3>Thương hiệu {{$br->brand_name}}</h3>
                @endforeach
        </span>
    </h1>
    <div class="product-block clearfix">
        <div class="product-list row">
            @foreach($brand_by_id as $key => $product)
                <div class="col-md-2 col-sm-2 col-xs-12 product-resize product-item-box">
                    <div class="product-item wow pulse">
                        <div class="image image-resize">
                            <a href="{{URL::to('/chi-tiet-san-pham/'.$product->prudct_id)}}" title="NOKIA ASHA 206 - 2 SIM (CTY)">
                                <img src="{{URL::to('public/uploat/product/'.$product->product_image)}}" class="img-responsive lazy-img" />
                            </a>
                        </div>
                        <div class="right-block">
                            <h2 class="name">
                                <a href="{{URL::to('/chi-tiet-san-pham/'.$product->prudct_id)}}" title="{{$product->product_name}}">{{$product->product_name}}</a>
                            </h2>
                            <div class="price">
                                <span class="price-new">{{($product->product_price).' '.'Đ'}}</span>
                            </div>
                            <div class="action">
                                <button type="button" class="btn btn-default add-to-cart" name="add-to-cart" data-id="{{$product->prudct_id}}">Thêm vào giỏ hàng</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection