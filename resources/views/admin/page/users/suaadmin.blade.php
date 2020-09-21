@extends('admin.index')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Sửa</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Sửa tài khoản</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <form action="admin/users/suaadmin/{{$taikhoan->idtk}}" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <section class="content">
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-3">
          <div class="card card-primary" style="width: 500px;">
            <div class="card-header">
              <h3 class="card-title">Sửa</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
              
              
              <div class="form-group">
                <label for="inputName">Tên tài khoản</label>
                <input type="text" id="tentaikhoan" name="tentaikhoan" class="form-control"  value="{{$taikhoan->tentaikhoan}}" readonly="">
                <span class="error-message">{{ $errors->first('tentaikhoan') }}</span>
              </div>
              <div class="form-group">
                <label for="inputName">Mật khẩu</label>
                <input type="password" id="password" name="password" class="form-control" value="{{$taikhoan->password}}" readonly="">
                <span class="error-message">{{ $errors->first('password') }}</span>
                <a href="admin/users/doimatkhauadmin/{{$taikhoan->idtk}}">Đổi mật khẩu?</a>
              </div>
              <div class="form-group">
                <label for="inputName">Email</label>
                <input type="email" id="email" name="email" class="form-control"  value="{{$taikhoan->email}}">
                <span class="error-message">{{ $errors->first('email') }}</span>
              </div>
               
                <div class="form-group">
                <label for="inputName">Họ và tên</label>
                <input type="text" id="hoten" name="hoten" class="form-control" value="{{$taikhoan->hoten}}">
                <span class="error-message">{{ $errors->first('hoten') }}</span>
                </div>
                <div class="form-group">
                <label for="inputName">Giới tính</label>
                                <select class="form-control" name="gioitinh">
                                  <option value="{{$taikhoan->gioitinh}}">{{$taikhoan->gioitinh}}</option>
                                    <option value="Nam">Nam</option>
                                    <option value="Nữ">Nữ</option>
                                </select>
                </div>
                <div class="form-group">
                <label for="inputName">Địa chỉ</label>
                <textarea id="diachi" name="diachi" class="form-control"> {{$taikhoan->diachi}}</textarea>
                <span class="error-message">{{ $errors->first('diachi') }}</span>
                </div>
                <div class="form-group">
                <label for="inputName">Quyền</label>
                                <select class="form-control" name="level">
                                  <option value="{{$taikhoan->level}}">@if($taikhoan->level == 0)
                                                                        {{'Khách hàng'}}
                                                                        @elseif($taikhoan->level == 2)
                                                                        {{'Tài khoản đã bị cấm'}}
                                                                        @else
                                                                        {{'Quản trị viên'}}
                                                                        @endif
                                  </option>
                                    <option value="0">Khách hàng</option>
                                    <option value="1">Quảng trị viên</option>
                                </select>
                </div>
                



            <div class="form-group">
               <a href="admin/users/danhsachadmin" class="btn btn-secondary">Trở về</a>

          <button id="btn-luu" name="btn-luu" class="btn btn-success float-right">  Lưu
          </button>
          </div>
         
        </div>
        <!-- /.card-body -->
      </div>
        <!-- /.card -->
      <div class="row">
        <div class="col-12">
          
        </div>
      </div>
    </section>
  </form>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
  
<script >

   
$(document).ready(function(){
  $("#giodi").clockTimePicker();
});

</script>
@endsection
<style type="text/css">
   /* màu hiển thị lỗi*/
   .error-message { color: red; }
</style>
