@extends('layout')
@section('content')

<div id="wrap-inner">
    @foreach($detail_product as $key => $value)
    <div id="product-info">
        <div class="clearfix"></div>
        <div class="row" style="margin-top: 20px !important; margin-bottom: 50px">
            <div id="product-img" class="text-center col-lg-6" style="height: 500px">
                <img src="{{URL::to('public/uploat/product/'.$value->product_image)}}" style="height: 100%">
            </div>
            <div id="product-details" class="col-lg-6" style="padding-top: 30px">
                <h3>{{$value->product_name}}</h3>
                <p>Giá: <span class="price">{{number_format($value->product_price)}} VND</span></p>
                <p>Bảo hành: 1 đổi 1 trong 12 tháng</p>
                <p>Tình trạng: Máy mới 100%</p>
                <p>Khuyến mại: Hỗ trợ trả góp 0% dành cho các chủ thẻ Ngân hàng Sacombank</p>
                <p>Tình trạng:
                    @if($value->product_amount != 0)
                    <span>Còn hàng</span>
                    @else
                    <span>Hết hàng</span>
                    @endif</p>
                <form class="block-custom-change mb-4" action="{{URL::to('/save-cart')}}" method="post">
                    {{ csrf_field() }}
                    <div class="form-action">
                        <div class="quantity" style="padding-bottom: 12px; margin-bottom: 10px">
                            Số lượng :
                            <input name="qty" type="number" min="1" max="9" step="1" value="1">
                            <input name="productid_hidden" type="hidden" value="{{$value->prudct_id}}">
                        </div>
                        <div style="padding-bottom: 12px; margin-bottom: 10px" style="padding-bottom: 12px; margin-bottom: 10px;">
                            Màu sắc :
                            <input type="checkbox" name="color" value="{{$value->color_id}}">
                            <span style=" text-transform: capitalize">{{$value->color_name}}</span>
                        </div>
                        <div style="padding-bottom: 12px; margin-bottom: 10px" style="padding-bottom: 12px; margin-bottom: 10px">
                            Dung lượng :
                            <input type="checkbox" name="memory" value="{{$value->memory_id}}">{{$value->memory_name}}
                        </div>
                        <button type="submit" class="btn btn-addcart header-font">Thêm vào giỏ hàng</button>
                        <button type="submit" class="btn btn-buy header-font">Mua ngay</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="product-detail">
        <h3>Chi tiết sản phẩm</h3>
        <p class="text-justify">{!! $value->product_desc !!}</p>
    </div>
    @endforeach
    <!--    <div id="comment">
                            <h3>Bình luận</h3>
                            <div class="col-md-9 comment">
                                <form>
                                    <div class="form-group">
                                        <label for="email">Email:</label>
                                        <input required type="email" class="form-control" id="email" name="email">
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Tên:</label>
                                        <input required type="text" class="form-control" id="name" name="name">
                                    </div>
                                    <div class="form-group">
                                        <label for="cm">Bình luận:</label>
                                        <textarea required rows="10" id="cm" class="form-control" name="content"></textarea>
                                    </div>
                                    <div class="form-group text-right">
                                        <button type="submit" class="btn btn-default">Gửi</button>
                                    </div>
                                </form>
                            </div>
                        </div> -->
</div>
@endsection