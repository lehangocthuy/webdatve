  @extends('master')
@section('content') 
<br>
 @if(session('thongbao'))
                      <script type="text/javascript">
                     alert("Đổi mật khẩu không thành công, vui lòng kiểm tra lại mật khẩu cũ ");
                </script>
  @endif
<form  
class="reg-form" method="post" action="doimatkhauKH/{{$taikhoan->tentaikhoan}}">
  <input type="hidden" name="_token" value="{{ csrf_token() }}">
  <h3  style="color: blue;text-align: center;font-family: Comic Sans MS, cursive, sans-serif;   font-weight: bold"> Đổi Mật Khẩu </h3>
  <hr style="background: blue;">
  <br>
   <div class="field-row">
    &nbsp;&nbsp;&nbsp;
      <label class="form-label" for="firstName">Mật khẩu cũ</label>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      <input style=" border: 1px solid #ccc;box-sizing: border-box;display: inline-block;font-size: 16px;padding: 10px;margin-bottom: 15px;width: 240px;" type="password" id="password" name="password" class="field text-field first-name-field" placeholder="Nhập mật khẩu cũ">
      <span class="message"></span>
      <span class="error-message">{{ $errors->first('password') }}</span>
   </div>
   <br>
   <div class="field-row">&nbsp;&nbsp;&nbsp;
      <label class="form-label cf" for="lastName">Mật khẩu mới</label>
      &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;    
      <input style=" border: 1px solid #ccc;box-sizing: border-box;display: inline-block;font-size: 16px;padding: 10px;margin-bottom: 15px;width: 240px;"  type="password" id="password1" name="password1" class="field text-field last-name-field" placeholder="Nhập mật khẩu mới">
      <span class="message"></span>
      <span class="error-message">{{ $errors->first('password1') }}</span>
   </div>
   <br>
   <div class="field-row">&nbsp;&nbsp;&nbsp;
      <label class="form-label" for="tel">Nhập mật khẩu mới</label>&nbsp;
      <input style=" border: 1px solid #ccc;box-sizing: border-box;display: inline-block;font-size: 16px;padding: 10px;margin-bottom: 15px;width: 240px;"  type="password" id="password2" name="password2" class="field text-field tel-field" placeholder="Nhập lại mật khẩu mới">
      <span class="message"></span>
      <span class="error-message">{{ $errors->first('password2') }}</span>
   </div>
    <hr style="background: blue;">
   <div class="field-row float-right">
      <label class="form-label"></label>
      <button class="form-button" style="background:blue;border: none;border-radius: 0;color: white;display: inline-block;padding: 10px;font-size: 16px;  ">Đổi mật khẩu</button>
   </div>

</form>
<br>
@endsection 
<style type="text/css">
  .reg-form {
  background: #fff;
  box-sizing: border-box;
  box-shadow: 1px 2px 6px rgba(0, 0, 0, 0.4);
  margin: 15px auto;
  padding: 15px;
  width: 600px;
  height: 430px;
}

</style>
<style type="text/css">
   .error-message { color: red; }
</style>