@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm màu sản phẩm
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
                                <form role="form" action="{{URL::to('save-color-product')}}" method="post">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục sản phẩm</label>
                                    <input type="text" name="color_product_name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả danh mục</label>
                                    <textarea style="resize: none" rows="15" name="color_product_desc" class="form-control ckeditor" id="demo" placeholder="Password"></textarea>
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                     <select name="color_product_status" class="form-control input-sm m-bot15">
                                        <option value="0">Hiển thị </option>
                                        <option value="1">Ẩn</option>
                                    </select>
                                </div>
                                <button type="submit" name="add_color_product" class="btn btn-info">Thêm Danh Mục</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection