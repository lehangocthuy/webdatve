@extends('admin.index')
@section('content')
<script>
$(document).ready(function(){

 // Delete 
 $('.delete').click(function(){
   var el = this;
  
   // Delete id
   var deleteid = $(this).data('idtk');
 
   var confirmalert = confirm("Bạn có chắc muốn xóa?");
   if (confirmalert == true) {
      // AJAX Request
      $.ajax({
        url: 'danhsachadmin.blade.php',
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
            <h1>Tài khoản admin</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Tài khoản admin</li>
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
            <form action="admin/users/themadmin" method="get">
            <div class="card">
              <div class="card-header">
                @if(session('hihi'))
                            <div class="alert alert-success text-center">
                                {{session('hihi')}}
                            </div>
                @endif
                <h3 class="card-title">Danh sách tất cả admin</h3>
                
                <!-- <button class=" float-right btn btn-primary">Thêm mới </button> -->
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                <table id="example1" class="table table-bordered table-striped">
               
                  <thead>

                  <tr>
                    <th>Mã tài khoản</th>
                    <th>Tên tài khoản</th>
                    <th>Email</th>
                    <th>Họ và tên</th>
                    <th>Giới tính</th>
                    <th>Địa chỉ</th>
                    <th>Quyền</th>
                    <th>Cập nhật</th>

                  </tr>
                  </thead>
                  
                  <tbody>
                    
                  @foreach($nguyet as $tk)        
                  <tr> 
                    <td>{{$tk->idtk}}</td>
                    <td>{{$tk->tentaikhoan}}</td>
                    <td>{{$tk->email}}</td>
                    <td >{{$tk->hoten}}</td>
                    <td >{{$tk->gioitinh}}</td>
                    <td >{{$tk->diachi}}</td>
                    <td >
                      @if($tk->level == 0)
                      {{'Khách hàng'}}
                      @else

                      {{'Quản trị viên'}}
                     
                      @endif
                    </td>
                    <td>             
                      <a href="admin/users/suaadmin/{{$tk->idtk}}" class="edit" title="Sửa" data-toggle="tooltip">
                        <i class="material-icons">&#xE254;</i>
                      </a>
                      <!-- <a href="admin/users/xoa/{{$tk->idtk}}" class="delete"  name="btn-xoa"  title="Xóa" > -->
                        <!-- <i class="material-icons">&#xE872;</i> -->
                      <!-- </a> -->
                   </td> 
                   
                </tr>
                @endforeach
                
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Mã tài khoản</th>
                    <th>Tên tài khoản</th>
                    <th>Email</th>
                    <th>Họ và tên</th>
                    <th>Giới tính</th>
                    <th>Địa chỉ</th>
                    <th>Quyền</th>
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
 <!--  <script >$(document).ready(function() {
    $('#example1').DataTable( {
        "order": [[ 7, "desc" ]]
    } );
} ); </script> -->


@endsection