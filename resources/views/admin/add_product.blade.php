@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm sản phẩm
                        </header>
                        <?php 
                                $message = Session::get('message');
                                if($message){
                                    echo '<span class="text-alight">'.$message.'</span>';
                                    Session::put('message',null);
                                }
                            ?>
                        <div class="panel-body">
                            <div class="position-center">
                                <form role="form" action="{{URL::to('save-product')}}" method="post" enctype="multipart/form-data">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên sản phẩm</label>
                                    <input type="text" name="product_name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">giá sản phẩm bán</label>
                                    <input type="text" name="product_price" class="form-control" id="exampleInputEmail1" placeholder="Giá sản phẩm">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">số lượng</label>
                                    <input type="text" name="product_amount" class="form-control" id="exampleInputEmail1" placeholder="số lượng">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">hình ảnh</label>
                                    <input type="file" name="product_image" class="form-control" id="exampleInputEmail1" >
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả sản phẩm</label>
                                    <textarea style="resize: none" rows="15" name="product_desc" class="form-control ckeditor" id="demo" placeholder="mô tả sản phẩm"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Nội dung sản phẩm</label>
                                    <textarea style="resize: none" rows="15" name="product_content" class="form-control ckeditor" id="demo" placeholder="nội dung"></textarea>
                                </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">danh mục sản phẩm</label>
                                    <select name="product_cate" class="form-control input-sm m-bot15">
                                        @foreach($cate_product as $key => $cate)
                                        <option value="{{$cate->category_id}}">{{$cate->category_name}} </option>
                                        @endforeach
                                    </select>
                                </div>
                                 <div class="form-group">
                                    <label for="exampleInputPassword1">thương hiệu</label>
                                    <select name="product_brand" class="form-control input-sm m-bot15">
                                        @foreach($brand_product as $key => $brand)
                                        <option value="{{$brand->brand_id}}">{{$brand->brand_name}} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Màu sắc</label>
                                    <select name="product_color" class="form-control input-sm m-bot15">
                                        @foreach($color_product as $key => $color)
                                        <option value="{{$color->color_id}}">{{$color->color_name}} </option>
                                        @endforeach
                                    </select>
                                </div>
                                      <div class="form-group">
                                    <label for="exampleInputPassword1">Dung lượng bộ nhớ</label>
                                    <select name="product_memory" class="form-control input-sm m-bot15">
                                        @foreach($memory_product as $key => $memo)
                                        <option value="{{$memo->memory_id}}">{{$memo->memory_name}} </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                     <select name="product_status" class="form-control input-sm m-bot15">
                                        <option value="0">Hiển thị</option>
                                        <option value="1">Ẩn</option>
                                    </select>
                                </div>

                                <button type="submit" name="add_product" class="btn btn-info">Thêm sản phẩm</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection