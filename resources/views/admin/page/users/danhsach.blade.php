@extends('admin.index')
@section('content')
<script>
  function getform(){
    $(document).ready(function(){

  var updateButton = document.getElementById('updateDetails');
  var favDialog = document.getElementById('favDialog');
  var xacnhan = document.getElementById('xacnhan');
                        // “Update details” button opens the <dialog> modally
  updateButton.addEventListener('click', function() {
    favDialog.showModal();

      // AJAX Request
      $("#xacnhan").click(function(){
        if(confirm("Bạn có muốn cấm tài khoản này không?")){
            $("#xacnhan").attr("button", "admin/users/danhsach");
        }
        else{
            return false;
        }
      });


       
  
  
  
   
  });
});
  }

</script>

<!-- <script type="text/javascript">
  $(document).ready(function(){

  var updateButton = document.getElementById('updateDetails');
  var favDialog = document.getElementById('favDialog');
 
                        // “Update details” button opens the <dialog> modally
  updateButton.addEventListener('click', function() {
    favDialog.showModal();
  });
});
</script> -->
  <!-- Content Wrapper. Contains page content -->

  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Tài khoản khách hàng</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Khách hàng</li>
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
            
            <div class="card">
              <div class="card-header">
                @if(session('thongbao'))
                            <div class="alert alert-success text-center">
                                {{session('thongbao')}}
                            </div>
                @endif
                <h3 class="card-title">Danh sách tất cả tài khoản khách hàng</h3>
                
                <a href="admin/users/them" class=" float-right btn btn-primary">Thêm mới </a>
              </div>
              <!-- /.card-header -->
              <div class="card-body">

                <table id="example1" class="table table-bordered table-striped">
               
                  <thead>

                  <tr>
                    <th>STT</th>
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
                    
                  @foreach($taikhoan as $tk)        
                  <tr> 
                    <td>{{$tk->stt}}</td>
                    <td>{{$tk->idtk}}</td>
                    <td>{{$tk->tentaikhoan}}</td>
                    <td>{{$tk->email}}</td>
                    <td >{{$tk->hoten}}</td>
                    <td >{{$tk->gioitinh}}</td>
                    <td >{{$tk->diachi}}</td>
                    <td id="level">
                      @if($tk->level == 0)
                      {{'Khách hàng'}}
                      @elseif($tk->level == 2)
                      {{'Tài khoản bị cấm, vì lý do: '}} {{$tk->lydo}}
                      @else
                      {{'Quản trị viên'}}
                      @endif
                    </td>
                    <td>             
                      <a href="admin/users/sua/{{$tk->idtk}}" class="edit " title="Sửa" data-toggle="tooltip">
                        <i class="fa fa-pencil"></i>
                      </a>
                      &nbsp;
                      <!-- admin/users/xoa/{{$tk->idtk}} -->
                      <a href="admin/users/cam/{{$tk->idtk}}"  class="delete"   name="btn-xoa"  title="Cấm tài khoản đăng nhập" >
                        <i class="fa fa-user-times"></i>

                       <!--  <dialog id="favDialog" style="border-color: black; border-width: 1px;">
                        <form   id="formlydo" action="admin/users/danhsach/{{$tk->idtk}}" method="post">
                          <input type="hidden" name="_token" value="{{csrf_token()}}">
                         <label for="validationCustom04">Lý do</label>
                              <textarea type="text" class="form-control" id="lydo" name="lydo" placeholder="Vui lòng điền lý do">
                              </textarea>

                          <menu>
                            <a href="admin/users/sua/{{$tk->idtk}}" type="submit" id="xacnhan">Xác nhận </button>
                          
                          </menu>
                        </form>
                      </dialog> -->
                     

       
        <!-- <a href="admin/users/cam/{{$tk->idtk}}" class="delete"  name="btn-xoa"  title="Cấm tài khoản đăng nhập" >
                        <i class="fa fa-user-times"></i>
 -->
                      </a>
                   </td> 
                   
                </tr>
                @endforeach
                
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>STT</th>
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