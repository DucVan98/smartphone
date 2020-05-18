@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Liệt kê thương hiệu
    </div>
    <?php
    $message = Session::get('message');
    if ($message) {
      echo '<span class="text-alight">' . $message . '</span>';
      Session::put('message', null);
    }
    ?>
    <div class="row w3-res-tb">
      <div class="col-sm-4">
      </div>
    </div>
    <div class="table-responsive" style="text-transform: lowercase">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th style="text-align: center;">Tên sản phẩm</th>
            <th style="text-align: center;">Hình ảnh</th>
            <th style="text-align: center;">Số lượng</th>
            <th style="text-align: center;">Giá bán</th>
            <th style="text-align: center;">Danh mục</th>
            <th style="text-align: center;">Thương hiệu</th>
            <th style="text-align: center;">Hiển thị</th>
            <th style="text-align: center;">Màu sắc</th>
            <th style="text-align: center;">Dung lượng</th>
            <th style=""></th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_product as $key => $pro)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td>{{ $pro->product_name }}</td>
            <td><img src="public/uploat/product/{{ $pro->product_image }}" height="100" width="100"></td>
            <td>{{ $pro->product_amount }}</td>
            <td>{{ $pro->product_price }}</td>
            <td>{{ $pro->category_name }}</td>
            <td>{{ $pro->brand_name }}</td>
            <td>{{ $pro->color_name }}</td>
            <td>{{ $pro->memory_name }}</td>
            <td><span class="text-ellipsis">
                <?php
                if ($pro->product_status == 0) {
                ?>
                  <a href="{{URL::to('/active-product/'.$pro->prudct_id)}}"><span class="fa-thums-styling fa fa-thumbs-up"></span></a>
                <?php
                } else {
                ?>
                  <a href="{{URL::to('/unactive-product/'.$pro->prudct_id )}}"><span class="fa-thums-styling fa fa-thumbs-down"></span></a>
                <?php
                }
                ?>
              </span></td>
            <td>
              <a href="{{URL::to('/edit-product/'.$pro->prudct_id )}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i></a>
              <a onclick="return confirm('Are you sure you want to delete this item?');" href="{{URL::to('/delete-product/'.$pro->prudct_id )}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-times text-danger text"></i></a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <footer class="panel-footer">
      <div class="row">

        <div class="col-sm-5 text-center">
          <small class="text-muted inline m-t-sm m-b-sm">showing 20-30 of 50 items</small>
        </div>
        <div class="col-sm-7 text-right text-center-xs">
          <ul class="pagination pagination-sm m-t-none m-b-none">
            <li><a href=""><i class="fa fa-chevron-left"></i></a></li>
            <li><a href="">1</a></li>
            <li><a href="">2</a></li>
            <li><a href="">3</a></li>
            <li><a href="">4</a></li>
            <li><a href=""><i class="fa fa-chevron-right"></i></a></li>
          </ul>
        </div>
      </div>
    </footer>
  </div>
</div>
@endsection