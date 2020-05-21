@extends('admin_layout')
@section('admin_content')
<div class="row">
            <div class="col-lg-12">
                    <section class="panel">
                        <header class="panel-heading">
                            Thêm tùy chọn dung lượng bộ nhớ
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
                                <form role="form" action="{{URL::to('save-memory-product')}}" method="post">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Dung lượng</label>
                                    <input type="text" name="memory_product_name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputPassword1">Hiển thị</label>
                                     <select name="memory_product_status" class="form-control input-sm m-bot15">
                                        <option value="0">Hiển thị </option>
                                        <option value="1">Ẩn</option>
                                    </select>
                                </div>
                                <button type="submit" name="add_memory_product" class="btn btn-info">Thêm tùy chọn bộ nhớ</button>
                            </form>
                            </div>

                        </div>
                    </section>

            </div>
@endsection