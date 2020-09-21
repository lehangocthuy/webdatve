@extends('master')
@section('content')

<!------ Include the above in your HEAD tag ---------->
 
<section class="login-block">
    <div class="khung">
    <div class="row">
        <div class="col-md-4 login-sec">
            <h2 class="text-center">Đăng Ký</h2>
           <!--  @if(Session::has('flag'))
            <div class="alert alert-{{Session::get('flag')}}">{{Session::get('message')}}</div>
                @endif
 -->
                 @if(session('thanhcong'))
                            <div class="alert alert-success text-center">
                                {{session('thanhcong')}}
                            </div>
                @endif
                       
            <form class="login-form" method="post" action="dangky">
              <input style="color:white" type="hidden" name="_token" value="{{csrf_token()}}" />
  <div class="form-group">
    <label for="exampleInputPassword1" class="text-uppercase">Tài khoản</label>
    <input type="text" name="tentaikhoan" class="form-control" placeholder="Nhập tên tài khoản" value="{{old('tentaikhoan')}}">
      <span class="error-message">{{ $errors->first('tentaikhoan') }}</span>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" class="text-uppercase">Mật khẩu</label>
    <input type="password" name="password" class="form-control" placeholder="Nhập mật khẩu" value="{{old('password')}}" >
      <span class="error-message">{{ $errors->first('password') }}</span>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" class="text-uppercase">Xác nhận mật khẩu</label>
    <input type="password" name="re_password" class="form-control" placeholder="Nhập lại mật khẩu" value="{{old('re_password')}}" >
      <span class="error-message">{{ $errors->first('re_password') }}</span>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1" class="text-uppercase">Email</label>
    <input type="text" name="email" class="form-control" placeholder="Nhập email" value="{{old('email')}}">
    <span class="error-message">{{ $errors->first('email') }}</span>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" class="text-uppercase">Họ và tên</label>
    <input type="text" name="hoten" class="form-control" placeholder="Nhập họ và tên" value="{{old('hoten')}}"
    pattern="[^!@#$%&*()-=_+*^]{1,30}"  title = "Họ tên không được chứa số hoặc ký tự đặc biệt"
    >
   
           
      <span class="error-message">{{ $errors->first('hoten') }}</span>
  </div>

  <label for="exampleInputPassword1" class="text-uppercase">Giới tính</label>
  <div class="form-group">
   Nam: <input type="radio" name="gioitinh" value="Nam" checked/>
 &emsp;&emsp;
   Nữ: <input type="radio" name="gioitinh" value="Nữ" />
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1" class="text-uppercase">Địa chỉ</label>
    <input type="text" name="diachi" class="form-control" placeholder="Nhập địa chỉ" value="{{old('diachi')}}">
      <span class="error-message">{{ $errors->first('diachi') }}</span>
  </div>
  
  
    <div class="form-check">
    <div class="g-recaptcha" data-sitekey="{{env('CAPTCHA_KEY')}}"></div>
    <br/>
    @if($errors->has('g-recaptcha-response'))
      <span class="invalid-feedback" style="display:block">
      <strong>{{$errors->first('g-recaptcha-response')}}</strong>
      </span>
    @endif

    <button type="submit" class="btn btn-login float-right">Đăng ký</button>
  </div><br>
  
</form>

<!-- <div class="copy-text">Created with <i class="fa fa-heart"></i> by <a href="http://grafreez.com">Grafreez.com</a></div> -->
        </div>
        <div class="col-md-8 banner-sec">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                 <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
                  </ol>
            <div class="carousel-inner" role="listbox">
    <div class="carousel-item active">
      <img class="d-block img-fluid" style="width: 920px;height: 890px;padding-bottom: 80px;"  src="images/hinh1.jpg" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
        <div class="banner-text">
            <h2>Nha Trang</h2>
            <p>Nha Trang - thành phố biển miền Trung không chỉ đi vào thơ, hoạ mà còn “được lòng” du khách với những gì đẹp nhất của một vùng duyên hải.</p>
        </div>    
  </div>
    </div>
    <div class="carousel-item">
      <img class="d-block img-fluid" style="width: 920px;height: 890px;padding-bottom: 80px;"  src="images/hinh2.jpg" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
        <div class="banner-text">
            <h2>Nha Trang</h2>
            <p>Nha Trang - thành phố biển miền Trung không chỉ đi vào thơ, hoạ mà còn “được lòng” du khách với những gì đẹp nhất của một vùng duyên hải.</p>
        </div>    
    </div>
    </div>
    <div class="carousel-item">
      <img class="d-block img-fluid" style="width: 920px;height: 890px;padding-bottom: 80px;"  src="images/hinh3.jpg" alt="First slide">
      <div class="carousel-caption d-none d-md-block">
        <div class="banner-text">
            <h2>Nha Trang</h2>
            <p>Nha Trang - thành phố biển miền Trung không chỉ đi vào thơ, hoạ mà còn “được lòng” du khách với những gì đẹp nhất của một vùng duyên hải.</p>
        </div>    
    </div>
  </div>
            </div>       
            
        </div>
    </div>
</div>
</section>
<style type="text/css">
   /* màu hiển thị lỗi*/
  .error-message { color: red; }
  @import url("//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css");
/*.login-block{
    background: #DE6262;   fallback for old browsers 
background: -webkit-linear-gradient(to bottom, #FFB88C, #DE6262);   Chrome 10-25, Safari 5.1-6 
/*background: linear-gradient(to bottom, #FFB88C, #DE6262);*/
 /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
/*float:left;
width:100%;*/

}*/
.banner-sec{background:url(https://static.pexels.com/photos/33972/pexels-photo.jpg)  no-repeat left bottom; background-size:cover; min-height:500px; border-radius: 0 10px 10px 0; padding:0;}
.khung{background:#fff; border-radius: 10px; box-shadow:15px 20px 0px rgba(0,0,0,0.1);}
.carousel-inner{border-radius:0 10px 10px 0;}
.carousel-caption{text-align:left; left:5%;}
.login-sec{padding: 0px 30px; position:relative;}
.login-sec .copy-text{position:absolute; width:80%; bottom:20px; font-size:13px; text-align:center;}
.login-sec .copy-text i{color:#FEB58A;}
.login-sec .copy-text a{color:#E36262;}
.login-sec h2{margin-bottom:30px; font-weight:800; font-size:30px; color: #DE6262;}
.login-sec h2:after{content:" "; width:100px; height:5px; background:#FEB58A; display:block; margin-top:20px; border-radius:3px; margin-left:auto;margin-right:auto}
.btn-login{background: #DE6262; color:#fff; font-weight:600;}
.banner-text{width:70%; position:absolute; bottom:40px; padding-left:20px;}
.banner-text h2{color:#fff; font-weight:600;}
.banner-text h2:after{content:" "; width:100px; height:5px; background:#FFF; display:block; margin-top:20px; border-radius:3px;}
.banner-text p{color:#fff;}
  
</style>
    
@endsection
