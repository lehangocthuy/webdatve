@extends('admin.index')
@section('content')

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Sửa tuyến</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Sửa</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <form action="admin/tuyenxe/sua/{{$tuyenxe->idtuyenxe}}" method="POST" enctype="multipart/form-data">
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
                <label for="inputName">Điểm đi</label>
                <input type="text" id="diemdi" name="diemdi" value="{{$tuyenxe->diemdi}}" class="form-control">
                  <span class="error-message">{{ $errors->first('diemdi') }}</span>
              </div>
              <div class="form-group">
                <label for="inputName">Điểm đến</label>
                <input type="text" id="diemden" name="diemden" value="{{$tuyenxe->diemden}}" class="form-control">
                <span class="error-message">{{ $errors->first('diemden') }}</span>
              </div>
              <div class="form-group">
                <label for="inputName">Hình ảnh</label>

                <input type="file" id="hinhanh" name="hinhanh"   class="form-control">
                <input type="text" id="hinhanh2" name="hinhanh2" value="{{$tuyenxe->hinhanh}}"  class="form-control">
              </div>

                
              <div class="form-group">
                <label for="inputClientCompany">Đơn giá</label>
                <input type="text" id="dongia" name="dongia" value="{{$tuyenxe->dongia}}" class="form-control">
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