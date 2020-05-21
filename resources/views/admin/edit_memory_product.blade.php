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
                            @foreach($edit_memory_product as $key => $edit_value)
                            <div class="position-center">
                                <form role="form" action="{{URL::to('update-memory-product/'.$edit_value->memory_id)}}" method="post">
                                    {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Dung lượng</label>
                                    <input type="text" value="{{$edit_value->memory_name}}" name="memory_product_name" class="form-control" id="exampleInputEmail1" placeholder="Tên danh mục">
                                </div>
                                <button type="submit" name="add_memory_product" class="btn btn-info">Cập Nhật dung lượng</button>
                            </form>
                            </div>
                                @endforeach
                        </div>
                    </section>

            </div>
@endsection