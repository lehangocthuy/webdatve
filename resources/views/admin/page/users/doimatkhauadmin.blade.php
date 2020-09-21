@extends('admin.index')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Đổi mật khẩu</h1>
          </div>
          @if(session('hihi'))
                            <div class="alert alert-success text-center">
                                {{session('hihi')}}
                            </div>
          @endif
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Đổi mật khẩu tài khoản</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <form action="admin/users/doimatkhauadmin/{{$taikhoan->idtk}}" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <section class="content">
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-3">
          <div class="card card-primary" style="width: 500px;">
            <div class="card-header">
              <h3 class="card-title">Đổi mật khẩu</h3>
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
            <div class="card-body">
              
              
              <div class="form-group">
                <label for="inputName">Tên tài khoản</label>
                <input type="text" id="tentaikhoan" name="tentaikhoan" class="form-control"  value="{{$taikhoan->tentaikhoan}}" readonly="">
              </div>
              <div class="form-group">
                <label for="inputName">Mật khẩu cũ</label>
                <input type="password" id="password" name="password" class="form-control" placeholder="Vui lòng nhập lại mật khẩu cũ" >
                <span class="error-message">{{ $errors->first('password') }}</span>

              </div>
              <div class="form-group">
                <label for="inputName">Mật khẩu mới</label>
                <input type="password" id="password1" name="password1" class="form-control" placeholder="Vui lòng nhập mật khẩu mới">
                <span class="error-message">{{ $errors->first('password1') }}</span>
              </div>
              <div class="form-group">
                <label for="inputName"> Xác nhận mật khẩu</label>
                <input type="password" id="password2" name="password2" class="form-control" placeholder="Vui lòng xác nhận mật khẩu mới">
                <span class="error-message">{{ $errors->first('password2') }}</span>
              
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
<style type="text/css">.error-message { color: red; }</style>
