@extends('master')
@section('content')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
  $('#btnhienthi').click(function(){
    $("table").toggle();
  });   
});

</script>	
<!-- <script>
$("#huyve").click(function(){
    if(confirm("Bạn có chắc muốn hủy, nếu hủy vé sẽ không thể sử dụng lại?")){
        $("#huyve").attr("href", "thongtinve");
    }
    else{
        return false;
    }
});
</script> 	 -->	
<div class="modal-content">
	<div class="modal-header">
		<h4 class="modal-title">Chi tiết đơn đặt vé</h4>
		<div class="countdown"></div>
	</div>
	<div class="modal-body">
		<div class="loading"></div>
			<form  method="POST" action="thanhtoan/{{$ve->idve}}"  class="row">
  			<input type="hidden" name="_token" value="{{ csrf_token() }}">
			<div class="col-lg-6">
				<div class="input-group">
					<label class="input-group-addon">Mã Chuyến xe&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;{{$ve->idchuyenxe}}</label>
				</div>
				<br>
				<div class="input-group">
					<label class="input-group-addon">Điểm khởi hành&nbsp;:&nbsp;{{$ve->diemdi}}</label>
					
				</div>
				<br>
				<div class="input-group">
					<label class="input-group-addon">Điểm đến&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;{{$ve->diemden}}</label>
					
				</div>
				<br>
				<div class="input-group">
					<label class="input-group-addon">Giờ đi&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;{{$ve->giodi}}</label>
				
					<label class="input-group-addon">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ngày đi&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;{{$ve->ngaydi}}</label>
					
				</div>
				<br>
				<div class="input-group">
					

					<label class="input-group-addon">Giờ đến&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;{{$ve->gioden}}</label>
					
					<label class="input-group-addon">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Ngày đến&nbsp;&nbsp;:&nbsp;{{$ve->ngayden}}</label>					
				</div>	
				<br>
				<div class="input-group">
					<label class="input-group-addon">Biển số xe&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;{{$ve->bienso}}</label>
					
				</div>			
			</div>
			<div class="col-lg-6">
				<div class="input-group">
					<label class="input-group-addon">Mã phiếu đặt&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;{{$ve->idve}}</label>
					
				</div>
				<br>
				<div class="input-group">
					<label class="input-group-addon">Tên khách hàng:&nbsp;{{$ve->hoten}}</label>
					
				</div>
				<br>
				<div class="input-group">
					<label class="input-group-addon">Giới tính&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;{{$ve->gioitinh}}</label>
					
				</div>
				<br>
				<div class="input-group">
					<label class="input-group-addon">CMND&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;{{$ve->cmnd}}</label>
					
				</div>
				<br>
				<div class="input-group">
					<label class="input-group-addon">Số điện thoại&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;:&nbsp;{{$ve->hiddensdt}}</label>
					
				</div>
				<br>
				
			</div>
		</div>

				<div class="small" align="center"> 
					<!-- nút hien thị xem thông tin vé-->
				<input  id="btnhienthi" name="btnhienthi" style="width: 300px center" class="btn btn-outline-info" value="Xem chi tiết vé">

				<hr width="50%">

				<table id="hienthi" class="table table-bordered" style="text-align: center;width: auto; " >

	                <thead >
	                    <tr>
	                        <th><h6>CMND người đi</h6></th>
	                        <th><h6>Họ tên người đi</h6></th>
	                        <th><h6>Giới tính</h6></th>
	                        <th style="width: 200px"><h6>Số điện thoại</h6></th>
	                        
	                    </tr>
	                </thead>
    			<tbody>
    				@foreach($nguoidi as $nguoi)
          			<tr>
          				
			            <td>
			            <h6>{{$nguoi->cmndnguoidi}}</h6>
			            </td>
			            <td>
			            	<h6>{{$nguoi->hotennguoidi}}</h6>
			            </td>
			            <td>
			            	<h6>{{$nguoi->gioitinhnguoidi}}</h6>
			            </td>
			            <td >
			            	<h6>{{$nguoi->hiddensdt}}</h6>
			            </td>
			            
					</tr> 
					@endforeach
   				 </tbody>

			</table>
		</div>	
	

		<br>
		
					<div class="modal-footer">
						<div class="input-group">
							<input   style="width: 850px ;height: 35px;font-size: 18px;color: #ff3030;" class="btn btn-outline-info"value="Lưu ý: Chúng tôi giữ vé của bạn trong vòng 1 tiếng nếu bạn không thanh toán hệ thống sẽ hủy vé ">
						 
						</div>
						<div class="alert alert-primary form-group" style="width: 300px; text-align: center">
							<div class="input-group">
								Tổng vé&nbsp;&nbsp;:&nbsp; {{$ve->soluong}}

							
							</div>
							<br>
							<div class="input-group">
								Tổng tiền:&nbsp;&nbsp;{{number_format($ve->tongtien)}} VNĐ
							
							</div>
							<br>
							<div class="input-group">
								Trạng thái: &nbsp;&nbsp;
								@if($ve->trangthai == 0 )
								{{'Chờ thanh toán'}}
								@elseif($ve->trangthai == 1)
								{{'Đã thanh toán'}}
								@else
								{{'Vé đã hủy'}}
								@endif
							</div>

										<hr>

										@if($ve->trangthai == 1)
										<button  type="submit" class="btn btn-danger" style="text-align: left" name="thanhtoan" id="thanhtoan">Đóng</button>
										 @else
										<button  type="submit" class="btn btn-info" style="text-align: left" name="thanhtoan" id="thanhtoan">Thanh Toán</button>
										
										@endif
										
										
						</div>
					</div>
				</form>
				
			</div>
	<style>
	#hienthi{
		display: none;
	}
</style>	
@endsection