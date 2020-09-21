@extends('admin.index')
@section('content')
<script>
$(document).ready(function(){

 // Delete 
 $('.delete').click(function(){
   var el = this;
  
   // Delete id
   var deleteid = $(this).data('idtuyenxe');
 
   var confirmalert = confirm("Bạn có chắc muốn xóa?");
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
            <h1>Danh sách vé</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Vé</li>
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
            <form action="admin/tuyenxe/them" method="get">
            <div class="card">
              <div class="card-header">
                @if(session('thongbao'))
                            <div class="alert alert-success text-center">
                                {{session('thongbao')}}
                            </div>
                @endif
                <h3 class="card-title">Danh sách vé</h3>
                
                <button class=" float-right btn btn-primary">Thêm mới </button>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                <table id="example1" class="table table-bordered table-striped">

                  <thead>
                  <tr>
                    <th>STT</th>
                    <th>Mã vé</th>
                    <th>Họ và tên</th>
                    <th>Giới tính</th>
                    <th>Số điện thoại</th>
                    <th>Mã phiếu đặt vé</th>
                    <!-- <th>Cập nhật</th> -->

                  </tr>
                  </thead>
                  
                  <tbody>
                    
                     @foreach($nguoidi as $ve)    
                  <tr> 
                    <td>{{$ve->stt}}</td>
                    <td>{{$ve->cmndnguoidi}}</td>
                    <td>{{$ve->hotennguoidi}}</td>
                    <td>
                      {{$ve->gioitinhnguoidi}}
                    </td>
                    <td>{{$ve->sdtnguoidi}}</td>
                    <td>{{$ve->idve}}</td>
                    
<!-- 
                    <td>             
                      <a href="admin/ve/sua/{{$ve->cmndnguoidi}}" class="edit" title="Sửa" data-toggle="tooltip">
                        <i class="material-icons">&#xE254;</i>
                      </a>
                      <a href="admin/ve/xoa/{{$ve->cmndnguoidi}}" class="delete"  name="btn-xoa"  title="Xóa" >
                        <i class="material-icons">&#xE872;</i>
                      </a>
                   </td> --> 

                   
                </tr>
                @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>STT</th>
                    <th>Mã vé</th>
                    <th>Họ và tên</th>
                    <th>Giới tính</th>
                    <th>Số điện thoại</th>
                    <th>Mã phiếu đặt vé</th>
                    <!-- <th>Cập nhật</th> -->
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
