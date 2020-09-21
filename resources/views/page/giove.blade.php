@extends('master')
@section('content')

	<div class="container">
		<div id="content">

			<div class="table-responsive">
				<!-- Shop Products Table -->
				
				<table class="shop_table beta-shopping-cart-table" cellspacing="0">
					<thead>
						<tr>
							<th class="product-name">Chuyến xe</th>
							<th class="product-price">Giá</th>
							<th class="product-status">Loại xe</th>
							<th class="product-quantity">Số lượng</th>
							<th class="product-subtotal">Đơn giá</th>
							<th class="product-remove">Xóa</th>
						</tr>
					</thead>
					<tbody>

						<tr class="cart_item">
							<td class="product-name">
								<div class="media">
									<img class="pull-left" src="assets/dest/images/shoping3.jpg" alt="">
									<div class="media-body">
										<p class="font-large table-title">Sài Gòn - Nha Trang</p>
										<br>
										<p class="table-option">8h00-10h00</p>
										<br>
										<p class="table-option">12/11/2019-12/11/2019</p>

										<a class="table-edit" href="#">Edit</a>
									</div>
								</div>
							</td>

							<td class="product-price">
								<span class="amount">$235.00</span>
							</td>

							<td class="product-status">
								Giường nằm
							</td>

							<td class="product-quantity">
								<select name="product-qty" id="product-qty">
									<option value="1">1</option>
								
								</select>
							</td>

							<td class="product-subtotal">
								<span class="amount">$235.00</span>
							</td>

							<td class="product-remove">
								<a href="#" class="remove" title="Remove this item"><i class="fa fa-trash-o"></i></a>
							</td>
						</tr>
						
					</tbody>

					
				</table>
				<!-- End of Shop Table Products -->
			</div>


			<!-- Cart Collaterals -->
			<div class="cart-totals pull-right">
					<div class="cart-totals-row"><h5 class="cart-total-title">Tổng cộng</h5></div>
					<div class="cart-totals-row"><span>Tổng số lượng vé:</span> <span>5</span></div>
					<div class="cart-totals-row"><span>Tổng giá tiền:</span> <span>100.000Đ</span></div>
					<button class="btn btn-success btn-lg">Thanh toán</button>	
				</div>

			<!-- End of Cart Collaterals -->
			<div class="clearfix"></div>

		
		</div> <!-- #content -->
	</div> <!-- .container -->

	<!-- include js files -->
	
@endsection
