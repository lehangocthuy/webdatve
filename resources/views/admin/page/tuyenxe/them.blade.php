@extends('admin.index')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Thêm mới</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Thêm tuyến</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <form action="admin/tuyenxe/them" method="POST" enctype="multipart/form-data">
      <input type="hidden" name="_token" value="{{ csrf_token() }}">
    <section class="content">
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-3">
          <div class="card card-primary" style="width: 500px;">
            <div class="card-header">
              <h3 class="card-title">Thêm</h3>
             
              <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                  <i class="fas fa-minus"></i></button>
              </div>
            </div>
             @if(session('thongbao'))
                            <div class="alert alert-danger text-center">
                                {{session('thongbao')}}
                            </div>
                @endif
            <div class="card-body">

              <div class="form-group">
                <label for="inputName">Điểm đi</label>
                <input type="text" id="diemdi" name="diemdi" class="form-control" value="{{old('diemdi')}}">
                <span class="error-message">{{ $errors->first('diemdi') }}</span>
              </div>
              <div class="form-group">
                <label for="inputName">Điểm đến</label>
                <input type="text" id="diemden" name="diemden" class="form-control" value="{{old('diemden')}}">
                <span class="error-message">{{ $errors->first('diemden') }}</span>
              </div>
              <div class="form-group">
                <label for="inputName">Hình ảnh</label>
                <input type="file" id="hinhanh" name="hinhanh" class="form-control" value="{{old('hinhanh')}}">
                <span class="error-message">{{ $errors->first('hinhanh') }}</span></div>
              <div class="form-group">
                <label for="inputClientCompany">Đơn giá</label>
                <input type="text" id="dongia" name="dongia" class="form-control" value="{{old('dongia')}}">
                <span class="error-message">{{ $errors->first('dongia') }}</span>
              </div>
              <div class="form-group">
               <a href="admin/tuyenxe/danhsach" class="btn btn-secondary">Trở về</a>

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

@endsection
<style type="text/css">
   /* màu hiển thị lỗi*/
   .error-message { color: red; }
</style>
