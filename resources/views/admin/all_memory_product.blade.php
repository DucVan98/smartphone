@extends('admin_layout')
@section('admin_content')
<div class="table-agile-info">
  <div class="panel panel-default">
    <div class="panel-heading">
      Tất cả màu sản phẩm
    </div>
    <?php 
      $message = Session::get('message');
      if($message){
        echo '<span class="text-alight">'.$message.'</span>';
        Session::put('message',null);
        }
      ?>
    <div class="row w3-res-tb">
      <div class="col-sm-4">
      </div>
    </div>
    <div class="table-responsive">
      <table class="table table-striped b-t b-light">
        <thead>
          <tr>
            <th style="width:20px;">
              <label class="i-checks m-b-none">
                <input type="checkbox"><i></i>
              </label>
            </th>
            <th style="width: 20%;text-align: center;">Dung lượng</th>
            <th style="width: 10%;text-align: center;">Hiển thị</th>
            <th style="width:30px;"></th>
          </tr>
        </thead>
        <tbody>
          @foreach($all_memory_product as $key => $cate_pro)
          <tr>
            <td><label class="i-checks m-b-none"><input type="checkbox" name="post[]"><i></i></label></td>
            <td style="width: 50%;text-align: center;">{{ $cate_pro->memory_name }}</td>
            <td style="width: 30%;text-align: center;"><span class="text-ellipsis">
              <?php
              if($cate_pro->memory_status==0) {
                ?>
                <a href="{{URL::to('/active-memory-product/'.$cate_pro->memory_id)}}"><span class="fa-thums-styling fa fa-thumbs-up"></span></a>
                <?php 
              }else{ 
                  ?>
              
                <a href="{{URL::to('/unactive-memory-product/'.$cate_pro->memory_id )}}"><span class="fa-thums-styling fa fa-thumbs-down"></span></a>
                <?php
              }
                  ?>
            </span></td>
            <td style="width: 10%;text-align: center">
              <a href="{{URL::to('/edit-memory-product/'.$cate_pro->memory_id )}}" class="active styling-edit" ui-toggle-class="">
                <i class="fa fa-pencil-square-o text-success text-active"></i></a>
              <a  onclick="return confirm('Are you sure you want to delete this item?');" href="{{URL::to('/delete-memory-product/'.$cate_pro->memory_id )}}" class="active styling-edit" ui-toggle-class="">
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