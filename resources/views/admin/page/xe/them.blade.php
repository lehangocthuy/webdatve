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
              <li class="breadcrumb-item active">Thêm xe</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <form action="admin/xe/them" method="POST" enctype="multipart/form-data">
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
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Biển số</label>
                <input type="text" id="bienso" name="bienso" class="form-control"  placeholder="Nhập biển số xe"  value="{{old('bienso')}}">
                <span class="error-message">{{ $errors->first('bienso') }}</span>

              </div>
              <div class="form-group">
                <label for="inputName">Số ghế</label>
                <input type="text" id="soghe" name="soghe" class="form-control" placeholder="Nhập số ghế"  value="{{old('soghe')}}">
                <span class="error-message">{{ $errors->first('soghe') }}</span>
              </div>
               <div class="form-group">
                <label for="inputName">Chọn loại xe</label>
                                <select class="form-control" name="loaixe">
                                  <option>Hãy chọn loại xe</option>
                                    <option value="0">Ghế ngồi</option>
                                    <option value="1">Giường nằm</option>
                                </select>
                   <span class="error-message">{{ $errors->first('loaixe') }}</span>             
                </div>

               <div class="form-group">
                <label for="inputName">Hình xe</label>
                <input type="file" id="hinhxe" name="hinhxe" class="form-control" placeholder="Chọn hình xe">
               <span class="error-message">{{$errors->first('hinhxe')}}</span>
              </div>
               
                

            <div class="form-group">
               <a href="admin/xe/danhsach" class="btn btn-secondary">Trở về</a>

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
