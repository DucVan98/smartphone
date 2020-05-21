@extends('Admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập nhật sản phẩm
                        </header>
                                               
                        <div class="panel-body">
                             <?php 
                            $message = Session::get('message');
                            if($message){
                                echo $message;
                                Session::put('message',null);
                            }?>
                            <div class="position-center">
                                @foreach($edit_product as $key => $pro)
                                <form role="form" action="{{URL::to('/update-product/'.$pro->prudct_id)}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input type="text"  class="form-control" name="product_name"  id="exampleInputEmail1" value="{{$pro->product_name}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Giá bán</label>
                                    <input type="text"  class="form-control" name="product_price" id="exampleInputEmail1" value="{{$pro->product_price}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">số lượng</label>
                                    <input type="text"  class="form-control" name="product_amount" id="exampleInputEmail1" value="{{$pro->product_amount}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">hình ảnh sản phẩm</label>
                                    <input type="file"  class="form-control" name="product_image" id="exampleInputEmail1" ><img src="{{URL::to('public/uploat/product/'.$pro->product_image)}}" height="100" width="100" alt="">
                                </div>

                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                                    <textarea style="resize: none;" rows="5" class="form-control" class="form-control ckeditor" id="demo" >{!! $pro->product_desc !!}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nội dung sản phẩm</label>
                                    <textarea style="resize: none;" rows="5" class="form-control" class="form-control ckeditor" id="demo">{!! $pro->product_content !!}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">danh mục sản phẩm</label>
                                    <select name="product_cate" class="form-control input-sm m-bot15">
                                        @foreach($cate_product as $key => $cate)
                                            @if($cate->category_id==$pro->category_id)
                                            <option selected value="{{$cate->category_id}}">{{$cate->category_name}} </option>
                                            @else
                                            <option value="{{$cate->category_id}}">{{$cate->category_name}} </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">nhãn hiệu sản phẩm</label>
                                    <select name="product_brand" class="form-control input-sm m-bot15">
                                        @foreach($brand_product as $key => $brand)
                                            @if($brand->brand_id==$pro->brand_id)
                                            <option selected value="{{$brand->brand_id}}">{{$brand->brand_name}} </option>
                                            @else
                                            <option value="{{$brand->brand_id}}">{{$brand->brand_name}} </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Màu sắc</label>
                                    <select name="product_color" class="form-control input-sm m-bot15">
                                        @foreach($color_product as $key => $color)
                                            @if($color->color_id==$pro->color_id)
                                            <option selected value="{{$color->color_id}}">{{$color->color_name}} </option>
                                            @else
                                            <option value="{{$color->brand_id}}">{{$color->color_name}} </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Dung lượng bộ nhớ</label>
                                    <select name="product_memory" class="form-control input-sm m-bot15">
                                        @foreach($memory_product as $key => $memo)
                                            @if($memo->memory_id==$pro->memory_id)
                                            <option selected value="{{$memo->memory_id}}">{{$memo->memory_name}} </option>
                                            @else
                                            <option value="{{$memo->memory_id}}">{{$memo->memory_name}} </option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Tình trạng</label>
                                    <select name="product_status" class="form-control input-sm m-bot15">
                                        <option value="0">Còn hàng </option>
                                        <option value="1">Hết hàng</option>
                                        
                                    </select>
                                </div>
                                
                                <button type="submit" name="edit_product" class="btn btn-info">Cập nhật sản phẩm</button>
                            </form>
                            @endforeach
                            </div>

                        </div>
                    </section>

            </div>
           
@endsection