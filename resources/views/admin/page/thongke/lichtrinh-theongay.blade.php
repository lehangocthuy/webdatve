@extends('admin.index')
@section('content')

<style>
body {
  font-family: Arial;
}

* {
  box-sizing: border-box;
}

form.example input[type=text] {
  padding: 10px;
  font-size: 17px;
  border: 1px solid grey;
  float: left;
  width: 80%;
  background: #f1f1f1;
}

form.example button {
  float: left;
  width: 20%;
  padding: 10px;
  background: #2196F3;
  color: white;
  font-size: 17px;
  border: 1px solid grey;
  border-left: none;
  cursor: pointer;
}

form.example button:hover {
  background: #0b7dda;
}

form.example::after {
  content: "";
  clear: both;
  display: table;
}
</style>

  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Thống kê lịch trình</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">lịch trình</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          
          <div class="col-12"> 
            <form action="admin/thongke/lichtrinh" method="post">
              {{ csrf_field() }}
<!--               @csrf -->
            <div class="card">
              <div class="card-header">
                @if(session('thongbao'))
                            <div class="alert alert-success text-center">
                                {{session('thongbao')}}
                            </div>
                @endif
                <h3 class="card-title">Danh sách lịch trình ngày {{$locngay}}
                 ( Tổng {{$tongchuyen}} chuyến ) </h3>
                
                <div class="col-3 float-right">
              <!-- form lọc -->

                  <form class="form-inline ml-3">
                    <div class="input-group input-group-sm">
                     <input type="text"  class=" fa-calendar float-left float-right form-control " id="locngay" name="locngay" placeholder="Chọn ngày để lọc" value="{{old('locngay')}}"  data-date-format="dd/mm/yyyy" />
                      <div class="input-group-append">
                        <button class="btn btn-outline-info">
                          <i class="fas fa-search"></i>
                        </button>
                      </div>
                    </div>
                  </form>
                </div>
                <!-- end --> 
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                <table id="example1" class="table table-bordered table-striped">

                  <thead>
                  <tr>
                    <th>STT</th>
                    <th>Mã tuyến xe</th>
                    <th>Mã chuyến xe</th>
                    <th>Điểm đi</th>
                    <th>Điểm đến</th>
                    <th>Ngày đi</th>
                    <th>Ngày đến</th>
                    <th>Hình ảnh</th>
                    <th>Đơn giá</th>

                  </tr>
                  </thead>
                  
                  <tbody id="myTable">
                     <!-- <button type="button"
                          class=" float-right btn btn-primary btn-sm daterange"
                          data-toggle="tooltip"
                          title="Date range">
                    <i class="far fa-calendar-alt"></i>
                  </button> -->
                   
                   
                   
                  @foreach($chuyenxe as $ds)        
                  <tr> 
                   
                    <td>{{$ds->stt}}</td>
                    <td>{{$ds->idtuyenxe}}</td>
                    <td>{{$ds->idchuyenxe}}</td>
                    <td>{{$ds->diemdi}}</td>
                    <td>{{$ds->diemden}}</td>
                    <td>{{date('d/m/Y', strtotime($ds->ngaydi))}}</td>
                    <td>{{date('d/m/Y', strtotime($ds->ngayden))}}</td>
                    <td>
                      <img width="100px" src="images/anh/{{$ds->hinhanh}}">
                    </td>
                    <td>{{number_format($ds->dongia)}} VNĐ</td>
                  
                   
                </tr>
                @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>STT</th>
                     <th>Mã tuyến xe</th>
                    <th>Mã chuyến xe</th>
                    <th>Điểm đi</th>
                    <th>Điểm đến</th>
                    <th>Ngày đi</th>
                    <th>Ngày đến</th>
                    <th>Hình ảnh</th>
                    <th>Đơn giá</th>
                  </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </form>
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
<script type="text/javascript">
$(function() {

  $('input[name="locngay"]').daterangepicker({

      autoUpdateInput: false,
      locale: {

          cancelLabel: 'Clear'
      }
  });

  $('input[name="locngay"]').on('apply.daterangepicker', function(ev, picker) {
      $(this).val(picker.startDate.format('DD/MM/YYYY') + ' - ' + picker.endDate.format('DD/MM/YYYY'));
      
  });

  $('input[name="locngay"]').on('cancel.daterangepicker', function(ev, picker) {
      $(this).val('');
  });

});

// $(function() {
//   $('#locngay').daterangepicker();

//   $('#locngay').on('apply.daterangepicker', function(ev, picker) {
//     $('#nsongay').val(picker.endDate.diff(picker.startDate, "days"));
//   });
// });
</script> 

<!-- Search -->

<!-- <script>
$(document).ready(function(){
  $("#locngay").on("keyup", function() {
    var value = $(this).val().toLowerCase();
    $("#myTable tr").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });
});
</script> -->
  

@endsection
