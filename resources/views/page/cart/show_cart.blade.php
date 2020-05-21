@extends('layout')
@section('content')
<div id="wrap-inner">
	<div id="list-cart">
		<h3>Giỏ hàng</h3>
		<?php
		$content = Cart::content();
		?>
		<form>
			<table class="table table-bordered .table-responsive text-center">

				<tr class="active">
					<td width="11.111%">Ảnh mô tả</td>
					<td width="22.222%">Tên sản phẩm</td>
					<td width="22.222%">Số lượng</td>
					<td width="16.6665%">Đơn giá</td>
					<td width="16.6665%">Thành tiền</td>
					<td width="11.112%">Xóa</td>
				</tr>
				@foreach($content as $v_content)
				<tr>
					<td><img class="img-responsive" src="{{URL::to('public/uploat/product/'.$v_content->options->image)}}"></td>
					<td>{{$v_content->name}}</td>
					<td>
						<div class="form-group">
							<form action="{{URL::to('/update-cart-quantyti')}}" method="post">
								{{ csrf_field() }}
								<input type="number" min="1" max="9" step="1" name="cart_quantyti" value="{{$v_content->qty}}">
								<input type="hidden" value="{{$v_content->rowId}}" name="rowId_cart" class="from-control">
								<input type="submit" value="Cập nhật" name="update_qty" class="btn btn-defaul btn-sm">
							</form>
						</div>
					</td>
					<td><span class="price">{{number_format($v_content->price).' '.'VND'}}</span></td>
					<td><span class="price">
							<?php
							$subtotal = ($v_content->price * $v_content->qty);
							echo number_format($subtotal, 0) . ' ' . 'VND';
							?></span></td>
					<td><a href="{{URL::to('/delete-to-cart/'.$v_content->rowId)}}">Xóa</a></td>
				</tr>
				@endforeach
			</table>
			<div class="row" id="total-price">
				<div class="col-md-6 col-sm-12 col-xs-12">
					Tổng thanh toán: <span class="total-price">{{(Cart::subtotal()).' '. 'VND'}}</span>

				</div>
				<div class="col-md-6 col-sm-12 col-xs-12">
					<a href="{{URL::to('/trang-chu')}}" class="my-btn btn">Mua tiếp</a>
				</div>
			</div>
		</form>
	</div>

	<div id="xac-nhan">
		<h3>Xác nhận mua hàng</h3>
		<form action="{{URL::to('/save-checkout')}}" method="post">
			{{@csrf_field()}}
			<div class="form-group">
				<label for="email">Email address:</label>
				<input required type="email" class="form-control" id="email" name="shipping_email">
			</div>
			<div class="form-group">
				<label for="name">Họ và tên:</label>
				<input required type="text" class="form-control" id="name" name="shipping_name">
			</div>
			<div class="form-group">
				<label for="phone">Số điện thoại:</label>
				<input required type="number" class="form-control" id="phone" name="shipping_phone">
			</div>
			<div class="form-group">
				<label for="add">Địa chỉ:</label>
				<input required type="text" class="form-control" id="add" name="shipping_address">
			</div>
			<div class="form-group text-right">
				<button type="submit" name="send_order" class="btn btn-default">Thực hiện đơn hàng</button>
			</div>
		</form>
	</div>
</div>
@endsection