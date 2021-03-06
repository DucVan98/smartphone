@extends('layout')
@section('content')	
					<div id="wrap-inner">
						<div id="list-cart">
							<h3>Giỏ hàng</h3>
							
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
									<?php 
										 print_r(Session::get('cart'));
									 ?>
									<tr>
										<td><img class="img-responsive" src=""></td>
										<td></td>
										<td>
											<div class="form-group">
												<form action="" method="post">
                                            
                                            <input type="number" min="1" max="9" step="1" name="cart_quantyti"  value="">
                                            <input type="hidden" value="" name="rowId_cart" class="from-control">
                                            <input type="submit" value="Cập nhật" name="update_qty" class="btn btn-defaul btn-sm">
                                        </form>
											</div>
										</td>
										<td><span class="price"></span></td>
										<td><span class="price">
											</span></td>
										<td><a href="#">Xóa</a></td>
									</tr>
									
								</table>
								<div class="row" id="total-price">
									<div class="col-md-6 col-sm-12 col-xs-12">										
											Tổng thanh toán: <span class="total-price"></span>
																													
									</div>
									<div class="col-md-6 col-sm-12 col-xs-12">
										<a href="#" class="my-btn btn">Mua tiếp</a>
										<a href="#" class="my-btn btn">Cập nhật</a>
										<a href="#" class="my-btn btn">Xóa giỏ hàng</a>
									</div>
								</div>
							</form>             	                	
						</div>

						<div id="xac-nhan">
							<h3>Xác nhận mua hàng</h3>
							<form>
								<div class="form-group">
									<label for="email">Email address:</label>
									<input required type="email" class="form-control" id="email" name="email">
								</div>
								<div class="form-group">
									<label for="name">Họ và tên:</label>
									<input required type="text" class="form-control" id="name" name="name">
								</div>
								<div class="form-group">
									<label for="phone">Số điện thoại:</label>
									<input required type="number" class="form-control" id="phone" name="phone">
								</div>
								<div class="form-group">
									<label for="add">Địa chỉ:</label>
									<input required type="text" class="form-control" id="add" name="add">
								</div>
								<div class="form-group text-right">
									<button type="submit" class="btn btn-default">Thực hiện đơn hàng</button>
								</div>
							</form>
						</div>
					</div>
					@endsection