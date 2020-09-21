 @extends('master')
@section('content')  
<!-- <script type="text/javascript">
  // Example starter JavaScript for disabling form submissions if there are invalid fields
(function() {
  "use strict";
  window.addEventListener("load", function() {
    var form = document.getElementById("needs-validation");
    form.addEventListener("submit", function(event) {
      if (form.checkValidity() == false) {
        event.preventDefault();
        event.stopPropagation();
      }
      form.classList.add("was-validated");
    }, false);
  }, false);
}());
</script> -->
<style type="text/css">
  body {margin:2rem;}

/*
####################################################
M E D I A  Q U E R I E S
####################################################
*/

/*
::::::::::::::::::::::::::::::::::::::::::::::::::::
Bootstrap 4 breakpoints
*/

/* 
Extra small devices (portrait phones, less than 544px) 
No media query since this is the default in Bootstrap because it is "mobile first"
*/


/* Small devices (landscape phones, 544px and up) */
@media (min-width: 544px) {  

}

/* Medium devices (tablets, 768px and up) 
The navbar toggle appears at this breakpoint */
@media (min-width: 768px) {  

}

/* Large devices (desktops, 992px and up) */
@media (min-width: 992px) { 

}

/* Extra large devices (large desktops, 1200px and up) */
@media (min-width: 1200px) {  
    
}



/*
::::::::::::::::::::::::::::::::::::::::::::::::::::
Custom media queries
*/

@media (max-width: 950px) { 

}

</style>
<div class="container">
  @if(session('thanhcong'))
                      <script type="text/javascript">
                     alert("Sửa thành công");
                </script>
   @endif

  <form class="container" id="needs-validation"  method="post" action="suathongtincanhan/{{session('data')['tentaikhoan']}}">
     <input type="hidden" name="_token" value="{{ csrf_token() }}">
      
    <br>
     <h3 class="modal-header" style="color: #ee1289;text-align: center;font-family: Comic Sans MS, cursive, sans-serif;   font-weight: bold"> Thông Tin Người Dùng </h3>
   <br>
  


  <div class="row">
    <div class="col-md-6 mb-3">
      <label for="validationCustom01">Tên tài khoản</label>
      <input type="text" class="form-control" id="tentaikhoan" name="tentaikhoan" placeholder="" value="{{$taikhoan->tentaikhoan}}" disabled="">
    </div>

    <div class="col-md-6 mb-3">
      <label for="validationCustom02">Mật khẩu</label>
      <input type="password" class="form-control" id="password" placeholder="" value="{{$taikhoan->password}}"  name="password" disabled="" >
       <a href="doimatkhauKH/{{$taikhoan->tentaikhoan}}">Đổi mật khẩu?</a>
    </div>
  </div>
  <br>
  <div class="row">
    
    <div class="col-md-6 mb-3">
       <label for="validationCustom04">Họ tên</label>
      <input type="text" class="form-control" id="hoten" name="hoten" placeholder="" value="{{$taikhoan->hoten}}" >
       <span class="error-message">{{ $errors->first('hoten') }}</span>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationCustom03">Email</label>
      <input type="text" class="form-control" id="email" placeholder="" name="email" value="{{$taikhoan->email}}" >
       <span class="error-message">{{ $errors->first('email') }}</span>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationCustom05">Giới tính</label>
       <select class="form-control" name="gioitinh">
                                  <option value="{{$taikhoan->gioitinh}}">{{$taikhoan->gioitinh}}</option>
                                    <option value="Nam">Nam</option>
                                    <option value="Nữ">Nữ</option>
                                </select>
    </div>
  </div>
  <br>
  <div class="row">
    <div class="col-md-3 mb-3">
      <label for="validationCustom03">CMND</label>
      <input type="text" class="form-control" id="cmnd" placeholder="Vui lòng điền CMND" name="cmnd" value="{{$taikhoan->cmnd}}" >
       <span class="error-message">{{ $errors->first('cmnd') }}</span>
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationCustom03">Số điện thoại</label>
      <input type="text" class="form-control" id="sdt" placeholder="Vui lòng điền SĐT" name="sdt" value="{{$taikhoan->sdt}}" >
       <span class="error-message">{{ $errors->first('sdt') }}</span>
    </div>
    <div class="col-md-6 mb-3">
       <label for="validationCustom04">Địa chỉ</label>
      <textarea type="text" class="form-control" id="diachi" name="diachi" placeholder="Vui lòng điền địa chỉ">
      {{$taikhoan->diachi}}
      </textarea>
       <span class="error-message">{{ $errors->first('diachi') }}</span>
  <!-- <input style="width: 100%;height: 60px" type="text" class="form-control" id="diachi" name="diachi" placeholder="" value="{{$taikhoan->diachi}}" > -->
     

    </div>
  </div>
 
  
    <!-- <div class="col-md-3 mb-3">
      <label for="validationCustom04">Họ tên</label>
      <input type="text" class="form-control" id="hoten" name="hoten" placeholder="" >
      
    </div>
    <div class="col-md-3 mb-3">
      <label for="validationCustom05">Giới tính</label>
      <input type="text" class="form-control" id="gioitinh" name="gioitinh" placeholder="" >
     
    </div> -->
    <br>
   

                                    
                       
  <div class="modal-footer">
     <a href="suathongtincanhan/{{session('data')['tentaikhoan']}}"  class="btn btn-primary" > </i>Mặc định</a>
  <button class="btn btn-primary " type="submit">Sửa thông tin cá nhân</button>
  </div>
    
</form>


  
  
  
</div>
@endsection
<style type="text/css">
   .error-message { color: red; }
</style>

