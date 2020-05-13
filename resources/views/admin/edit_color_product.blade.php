@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Cập nhật màu sản phẩm
                        </header>
                        <?php 
                                $message = Session::get('message');
                                if($message){
                                    echo '<span class="text-alight">'.$message.'</span>';
                                    Session::put('message',null);
                                }
                            ?>
                        <div class="panel-body">
                            @foreach($edit_color_product as $key => $edit_value)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('update-color-product/'.$edit_value->color_id)}}" method="post">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Tên danh mục sản phẩm</label>
                                    <input type="text" value="{{$edit_value->color_name}}" name="color_product_name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Mô tả danh mục</label>
                                    <textarea style="resize: none"  rows="15" name="color_product_desc" class="form-control ckeditor" id="demo" >{{$edit_value->color_desc}}</textarea>
                                </div>
                                <button type="submit" name="add_color_product" class="btn btn-info">Cập Nhật Danh Mục</button>
                            </form>
                            </div>
                                @endforeach
                        </div>
                    </section>

            </div>
@endsection