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
              <li class="breadcrumb-item active">Sửa chuyến</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <form action="admin/chuyenxe/sua/{{$chuyenxe->idchuyenxe}}" method="POST" enctype="multipart/form-data">
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
             @if(session('thongbao'))
                        <small>
                            <div class="alert alert-danger">
                                {{session('thongbao')}}
                            </div>
                            </small>
                        @endif
            <div class="card-body">
              <div class="form-group">
                <label for="inputName">Giờ đi</label>
                <input type="text" id="giodi" name="giodi" value="{{$chuyenxe->giodi}}" class="form-control" value="{{old('giodi')}}">
                <span class="error-message">{{ $errors->first('giodi') }}</span>
              </div>
              <div class="form-group">
                <label for="inputName">Giờ đến</label>
                <input type="text" id="gioden" name="gioden" value="{{$chuyenxe->gioden}}" class="form-control" value="{{old('gioden')}}">
                <span class="error-message">{{ $errors->first('gioden') }}</span>
              </div>
              <div class="form-group">
                <label for="inputName">Ngày đi</label>
                <input type="date" id="ngaydi" name="ngaydi" value="{{$chuyenxe->ngaydi}}" class="form-control"></div>
                <span class="error-message">{{ $errors->first('ngaydi') }}</span>
               <div class="form-group">
                <label for="inputName">Ngày đến</label>
                <input type="date" id="ngayden" name="ngayden" value="{{$chuyenxe->ngayden}}" class="form-control"></div>
                <span class="error-message">{{ $errors->first('ngaydeni') }}</span>
                <div class="form-group">
                <label for="inputName">Chọn tuyến xe</label>
                                <select class="form-control" name="idtuyenxe">  
              
                                  <option value="{{$chuyenxe->idtuyenxe}}"> {{$chuyenxe->diemdi}} - {{$chuyenxe->diemden}}
                                     </option>
                                     @foreach($tuyenxe as $tuyen)
                                    <option value="{{$tuyen->idtuyenxe}}">  {{$tuyen->diemdi}} - {{$tuyen->diemden}}  </option>
                                    @endforeach

                                </select>
                  </div>
                <div class="form-group">
                <label for="inputName">Chọn xe</label>
                <select class="form-control" name="idxe">
                                    
                                     <option value="{{$chuyenxe->idxe}}"> Biển số: {{$chuyenxe->bienso}} - Số ghế: {{$chuyenxe->soghe}}
                                     </option>
                                     @foreach($xe as $x)
                                   <option value="{{$x->idxe}}"> Biển số: {{$x->bienso}} || Số ghế: {{$x->soghe}} </option>
                                    @endforeach
                                </select>
            </div>
            <div class="form-group">
               <a href="admin/chuyenxe/danhsach" class="btn btn-secondary">Trở về</a>

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
