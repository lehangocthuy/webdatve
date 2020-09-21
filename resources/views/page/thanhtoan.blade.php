@extends('master')
@section('content')
<div class="container">
	<br>
	<br>
	<br>
	<span style="text-align: center;">
		<h2><p>Chúc mừng quý khách đã thanh toán thành công</p></h2>
		<h4>Mã vé của quý khách: <input   style="width: 210px;text-align: center;background: #C0C0C0 " type="text" value="{{$thongtinve->idve}}" readonly=""></h4>
		<p>Vui lòng bấm vào đây để trở về <a href="#"><b>trang chủ</b></a></p>
	</span>
	<br>
	<small style="text-align: center;">Lưu ý: Trong trường hợp quý khách quên mã vé, vui lòng <b><a href="dangnhap" style="color: #000000">đăng nhập </a>vào tài khoản để xem mã vé</b> (nếu có) hoặc gọi số hotline  <b>0764949277</b> để lấy lại mã</small>
	<br>
	<br>
</div>


@endsection