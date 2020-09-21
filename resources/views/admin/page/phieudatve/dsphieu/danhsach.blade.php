@extends('admin.index')
@section('content')
<script>
$(document).ready(function(){

 // Delete 
 $('.delete').click(function(){
   var el = this;
  
   // Delete id
   var deleteid = $(this).data('idtuyenxe');
 
   var confirmalert = confirm("Bạn có chắc muốn hủy?");
   if (confirmalert == true) {
      // AJAX Request
      $.ajax({
        url: 'danhsach.blade.php',
        type: 'POST',
        data: { id:deleteid },
        success: function(response){

          if(response == 1){
      // Remove row from HTML Table
      $(el).closest('tr').css('background','tomato');
      $(el).closest('tr').fadeOut(800,function(){
         $(this).remove();
      });
          }else{
      alert('Invalid ID.');
          }

        }
      });
   }
  else{
        return false;
    }

 });

});
</script>
  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Phiếu đặt vé</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Phiếu đặt vé</li>
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
            <form action="admin/phieuve/them" method="get">
            <div class="card">
              <div class="card-header">
                @if(session('thongbao'))
                            <div class="alert alert-success text-center">
                                {{session('thongbao')}}
                            </div>
                @endif
                <h3 class="card-title">Danh sách Phiếu</h3>
                
               
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                <table id="example1" class="table table-bordered table-striped">

                  <thead>
                  <tr>
                    <th>STT</th>
                    <th>Mã phiếu đặt vé</th>
                    <th>Chứng minh nhân dân</th>
                    <th>Họ và tên</th>
                    <th>Giới tính</th>
                    <th>Số điện thoại</th>
                    <th>Số lượng vé</th>
                    <th>Tổng tiền</th>
                    <th>Trạng thái</th>
                    <th>Chuyến xe</th>
                    <th>Cập nhật</th>

                  </tr>
                  </thead>
                  
                  <tbody>
                    
                  @foreach($PhieuVe as $phieu)        
                  <tr> 
                    <td>{{$phieu->stt}}</td>
                    <td>{{$phieu->idve}}
                      <a href="admin/phieuve/danhsachve/{{$phieu->idve}}"> <br>Xem chi tiết vé</a>
                    </td>
                    <td>{{$phieu->cmnd}}</td>
                    <td>{{$phieu->hoten}}</td>
                    <td>
                      @if($phieu->gioitinh == 0)
                      {{'Không xác định'}}
                      @elseif($phieu->gioitinh == 1)
                      {{'Nam'}}
                      @else
                      {{'Nữ'}}
                      @endif
                    </td>
                    <td>{{$phieu->sdt}}</td>
                    <td>{{$phieu->soluong}}</td>
                    <td>{{number_format($phieu->tongtien)}} VNĐ</td>
                    <td>
                      @if($phieu->trangthai == 0)
                      {{'Chờ thanh toán'}}
                      @elseif($phieu->trangthai == 1)
                      {{'Đã thanh toán'}}
                      @else
                      {{'Đã hủy'}}
                      @endif
                    </td>
                    <td>{{$phieu->diemdi}} - {{$phieu->diemden}}</td>

                    <td>             
                     <!--  <a href="admin/phieuve/sua/{{$phieu->idve}}" class="edit" title="Sửa" data-toggle="tooltip">
                        <i class="material-icons">&#xE254;</i>
                      </a> -->
                      <a href="admin/phieuve/xoa/{{$phieu->idve}}" class="delete"  name="btn-xoa"  title="Hủy vé" >
                        <i class="material-icons">&#xE872;</i>
                      </a>
                   </td> 

                   
                </tr>
                @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>STT</th>
                    <th>Mã phiếu đặt vé</th>
                    <th>Chứng minh nhân dân</th>
                    <th>Họ và tên</th>
                    <th>Giới tính</th>
                    <th>Số điện thoại</th>
                    <th>Số lượng vé</th>
                    <th>Tổng tiền</th>
                    <th>Trạng thái</th>
                    <th>Chuyến xe</th>
                    <th>Cập nhật</th>
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
  

@endsection
