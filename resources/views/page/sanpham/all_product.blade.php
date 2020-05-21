@extends('layout')
@section('content')
<div class="menu-product" style="float: left;">
    <h3>
        <span>
            Danh mục sản phẩm <i class="fa  fa-angle-double-down"></i>
        </span>
    </h3>
    @foreach($cate_product as $key => $cate)
    <ul class='level0'>
        <li class="child sub0">
            <span>
                <a href="{{URL::to('danh-muc-san-pham/'.$cate->category_id)}}"> {{$cate->category_name}}
                </a>
            </span>
            @foreach($brand_product as $key => $brand)
            <ul class='level1 hidden-xs'>
                <li class="sub1">
                    <span>
                        <a href="{{URL::to('/danh-muc-thuong-hieu/'.$brand->brand_id)}}">
                            <i class='fa fa-caret-right'>

                            </i> {{$brand->brand_name}}
                        </a>
                    </span>
                </li>
            </ul class='level1 hidden-xs'>
            @endforeach
        </li>
    </ul class='level0'>
    @endforeach
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('.menu-product li.child .open-close').on('click', function() {
            $(this).removeAttr('href');
            var element = $(this).parent('li');
            if (element.hasClass('open')) {
                element.removeClass('open');
                element.children('ul').slideUp();

                $(this).children('i').removeClass('fa-angle-down');
                $(this).children('i').addClass('fa-angle-double-left');
            } else {
                element.addClass('open');
                element.children('ul').slideDown();

                $(this).children('i').removeClass('fa-angle-double-left');
                $(this).children('i').addClass('fa-angle-down');
            }
        });
    });
</script>
<section class="product-content" style="margin-left: 200px;">
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
                        <div class="image image-resize">
                            <a href="{{URL::to('/chi-tiet-san-pham/'.$product->prudct_id)}}" title="{{$product->product_name}}">
                                <img src="{{URL::to('public/uploat/product/'.$product->product_image)}}" class="img-responsive lazy-img" />
                            </a>
                        </div>
                        <div class="right-block">
                            <input type="hidden" name="productid_hidden" value="{{$product->prudct_id}}" class="cart_product_id_{{$product->prudct_id}}">
                            <h2 class="name">
                                <a href="{{URL::to('/chi-tiet-san-pham/'.$product->prudct_id)}}" title="{{$product->product_name}}">{{$product->product_name}}</a>
                            </h2>
                            <div class="price">
                                <span class="price-new">{{number_format($product->product_price)}} VND</span>
                            </div>
                            <div class="action">
                                <button type="submit" class="btn btn-default add-to-cart" name="add-to-cart" data-id="{{$product->prudct_id}}">Thêm vào giỏ hàng</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</section>
@endsection