@extends('master')
@section('content')
<style>
  tr{transition: all .25 ease-in-out}
  tr:hover {background-color: #EEE;cursor: pointer;}

  .nutxoa{
    background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  }

</style>


<section class="login-block">
    <!-- <div class="khung"> -->

    <div class="row">
        <div class="col-md-4 login-sec">
            <h2 class="text-center">Thông tin người đặt</h2>
           <!-- 
                        @if(session('thanhcong'))
                            
                              <div class="alert alert-success">{{Session::get('thanhcong')}}</div>
                            
                        @endif  -->
 <form class="login-form" id="loginForm" method="post" action="datve/{{$thongtinchuyen->idchuyenxe}}">
  <input style="color:white" type="hidden" name="_token" value="{{csrf_token()}}" />
   @if(session()->has('data'))
  
  <div class="form-group">
    <label for="exampleInputEmail1" class="text-uppercase">CMND</label>
    <input type="text" name="cmnd" id="cmnd" class="form-control" placeholder="Chứng minh nhân dân người đặt" value="{{$taikhoan->cmnd}}">
    <span class="error-message">{{ $errors->first('cmnd') }}</span>
    
  </div>
 
    <div class="form-group">
      <label for="exampleInputPassword1" class="text-uppercase">Họ tên</label>
      <input type="text" name="hoten" id="hoten" class="form-control" placeholder="Họ tên người đặt" value="{{$taikhoan->hoten}}" pattern="[^!@#$%&*()-=_+*^]{1,30}" title="Họ tên không được chứa số hoặc ký tự đặc biệt">
      <span class="error-message">{{ $errors->first('hoten') }}</span>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1" class="text-uppercase">Giới tính</label>
         <select name="gioitinh" id="gioitinh" class="form-control" value="{{old('gioitinh')}}">
                  <option value="{{$taikhoan->gioitinh}}">{{$taikhoan->gioitinh}}</option>
                  <option value="Không xác định">Không xác định</option>
                  <option value="Nam">Nam</option>
                  <option value="Nữ">Nữ</option>
         </select>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1" class="text-uppercase">Số điện thoại</label>
      <input type="text" name="sdt" id="sdt" class="form-control" placeholder="Số điện thoại người đặt" value="{{$taikhoan->sdt}}">
      <span class="error-message">{{ $errors->first('sdt') }}</span>
   </div>
   @else
 <div class="form-group">
    <label for="exampleInputEmail1" class="text-uppercase">CMND</label>
    <input type="text" name="cmnd" id="cmnd" class="form-control" placeholder="Chứng minh nhân dân người đặt" value="{{old('cmnd')}}">
    <span class="error-message">{{ $errors->first('cmnd') }}</span>
    
  </div>
 
    <div class="form-group">
      <label for="exampleInputPassword1" class="text-uppercase">Họ tên</label>
      <input type="text" name="hoten" id="hoten" class="form-control" placeholder="Họ tên người đặt" value="{{old('hoten')}}" pattern="[^!@#$%&*()-=_+*^]{1,30}" title="Họ tên không được chứa số hoặc ký tự đặc biệt" >
      <span class="error-message">{{ $errors->first('hoten') }}</span>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1" class="text-uppercase">Giới tính</label>
         <select name="gioitinh" id="gioitinh" class="form-control" value="{{old('gioitinh')}}">
                  
                  <option value="Không xác định">Không xác định</option>
                  <option value="Nam">Nam</option>
                  <option value="Nữ">Nữ</option>
         </select>
    </div>
    <div class="form-group">
      <label for="exampleInputPassword1" class="text-uppercase">Số điện thoại</label>
      <input type="text" name="sdt" id="sdt" class="form-control" placeholder="Số điện thoại người đặt" value="{{old('sdt')}}">
      <span class="error-message">{{ $errors->first('sdt') }}</span>
   </div>

@endif
    <div class="form-group" style="text-align: center;width: ">
      <input id="change" type="image" src="images/change.png"  style="width:60px ;height: 45px"class="btn btn-outline-info" title="Chuyển thông tin người đặt sang người đi" onclick="Change();" > 
     
   </div>
   
 
    <!-- <div class="form-check">
      <button type="submit" class="btn btn-login float-right" id="button-xacnhan"></button>
    </div> -->
    <br>
  <br>

    <!-- <div class="copy-text"> <i class="fa fa-heart">Chào mừng quý khách</i>  </div> -->
        </div>



<div class="col-md-8 banner-sec">
<!-- <div class="container-lg"> -->
  
               <b><h2 class="text-center" style="color: red">Thông tin người đi</h2></b>
               <hr>
                <div class="row">
                   <!--  <div class="col-sm-8"><h2>Chọn <b>số lượng vé</b></h2></div> -->
                  
                   <br>
                     <div class="col-sm-8"><h2>Bấm thêm vé để tăng <b>số lượng </b></h2></div>
                </div>
                 <table class="table table-bordered" id="table">
                <thead>
                    <tr>
                        <th style="text-align: center;">CMND người đi</th>
                        <th style="text-align: center;">Họ tên người đi</th>
                        <th style="text-align: center;">Giới tính</th>
                        <th style="text-align: center;">Số điện thoại</th>
                        <th style="text-align: center;">Cập nhật</th>

                    </tr>
                </thead>

            </table>

            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"> 
                       
                      </div>
                    <div class="col-sm-4">
                        <input type="button" class="btn btn-info add-new" title="Vui lòng điền thông tin" id="themve" value="Thêm vé" onclick="addHtmlTableRow();" >
                    </div>
                        <div class="col-sm-8"> 
                       <small>Ghế trống: <b id="soghe">{{$soghe}}<b></small>
                      </div>
                
                
                </div>
                <hr class="my-4">
                   <!-- <div class=" text-center"> -->
                <div >
                Tổng số lượng vé đã đặt: <input class="btn btn-info" type="text" name="soluong" id="soluong" value="Chưa có vé" readonly style="width: 110px; text-align: center;">
                <span class="error-message">{{ $errors->first('soluong') }}</span> 

                </div>
                
                <button type="submit" class="btn btn-login float-right" id="button-xacnhan">Xác Nhận</button>
                <br>
            </div>
            </div>
           

       
</form>
</section>
<style type="text/css">
   /* màu hiển thị lỗi*/
   .error-message { color: red; }
  @import url("//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css");
}*/
.banner-sec{background:url(https://static.pexels.com/photos/33972/pexels-photo.jpg)  no-repeat left bottom; background-size:cover; min-height:500px; border-radius: 0 10px 10px 0; padding:0;}
.khung{background:#fff; border-radius: 10px; box-shadow:15px 20px 0px rgba(0,0,0,0.1);}
.carousel-inner{border-radius:0 10px 10px 0;}
.carousel-caption{text-align:left; left:5%;}
.login-sec{padding: 0 30px; position:relative;}
.login-sec .copy-text{position:absolute; width:80%; bottom:20px; font-size:13px; text-align:center;}
.login-sec .copy-text i{color:#FEB58A;}
.login-sec .copy-text a{color:#E36262;}
.login-sec h2{margin-bottom:30px; font-weight:800; font-size:30px; color: #DE6262;}
.login-sec h2:after{content:" "; width:100px; height:5px; background:#FEB58A; display:block; margin-top:20px; border-radius:3px; margin-left:auto;margin-right:auto}
.btn-login{background: #DE6262; color:#fff; font-weight:600;}
.banner-text{width:70%; position:absolute; bottom:40px; padding-left:20px;}
.banner-text h2{color:#fff; font-weight:600;}
.banner-text h2:after{content:" "; width:100px; height:5px; background:#FFF; display:block; margin-top:20px; border-radius:3px;}
.banner-text p{color:#fff;}

</style>
<script>

            // add Row
            function addHtmlTableRow()
            {
                // get the table by id
                // create a new row and cells
                // get value from input text
                // set the values into row cell's

            var table = document.getElementById("table");

            /* 3 option */
            var optionKhongxacdinh=document.createElement('option');
            optionKhongxacdinh.value="Không xác định";
            optionKhongxacdinh.innerHTML="Không xác định";

            var optionNam=document.createElement('option');
            optionNam.value="Nam";
            optionNam.innerHTML="Nam";

            var optionNu=document.createElement('option');
            optionNu.value="Nữ";
            optionNu.innerHTML="Nữ";
            ///////////////////

            var rowCount = table.rows.length;
            var row = table.insertRow(rowCount);
            //Cột 1
            var cell1 = row.insertCell(0);
            var element1 = document.createElement("input");
            element1.type = "text";
            element1.setAttribute('class', 'form-control');
            // element1.style.width = "166px";
            element1.name="cmndnguoidi[]";
            element1.required = true;
            element1.pattern = "[0-9]{9}|[0-9]{12}";
            element1.title = "CMND vui lòng phải có 9 hoặc 12 ký tự và phải là số";
            element1.setAttribute('form', 'loginForm');
            cell1.appendChild(element1);
              //Cột 2
            var cell2 = row.insertCell(1);
            var element2 = document.createElement("input");
            element2.type = "text";
            element2.setAttribute('class', 'form-control');
            element2.name="hotennguoidi[]";
            element2.pattern = "[^!@#$%&*()-=_+*^]{1,30}";
            element2.title = "Họ tên không được chứa số hoặc ký tự đặc biệt";
            element2.required = true;
            element2.setAttribute('form', 'loginForm');
            cell2.appendChild(element2);
            // Cột 3
            var cell3 = row.insertCell(2);
            var element3 = document.createElement("select");
            element3.setAttribute('class', 'form-control');
            // element3.style.height = "30px"
            element3.name="gioitinhnguoidi[]";
            element3.required = true;
            element3.class = "form-control";
            // if(gioitinhnguoidi==="Không xác định"){
            //   optionKhongxacdinh.selected="true";
            // }
            // if(gioitinhnguoidi==="Nam"){
            //   optionNam.selected="true";
            // }
            // if(gioitinhnguoidi==="Nữ"){
            //   optionNu.selected="true";
            // }
            element3.appendChild(optionKhongxacdinh)
            element3.appendChild(optionNam);
            element3.appendChild(optionNu);
            cell3.appendChild(element3);
             element3.setAttribute('form', 'loginForm');
            // Cột 4
            var cell4 = row.insertCell(3);
            var element4 = document.createElement("input");
            element4.type = "text";
            element4.setAttribute('class', 'form-control');
            element4.name="sdtnguoidi[]";
            element4.required = true;
            element4.pattern = "(0)[0-9]{9}";
            element4.title = "Số điện thoại vui lòng phải là 10 số ";
            cell4.appendChild(element4);
            element4.setAttribute('form', 'loginForm');

            var cell5 = row.insertCell(4);
            var element5 = document.createElement('button');
            var text = document.createTextNode("Xóa");
            element5.appendChild(text);
            element5.title = "Xóa";
            // element5.style.background = 'initial';
            // element5.style.backgroundColor =   "#A9E2F3"
            element5.setAttribute('class', 'btn btn-outline-danger');
            element5.style.fontSize = 'smaller';
            element5.style.height = '29px';
            element5.style.textAlign = 'justify';
            // element5.class = "btn btn-outline-info";
            element5.onclick = function(){removeSelectedRow(this)};
            cell5.appendChild(element5);
            


              document.getElementById("soluong").value = table.rows.length-1;
              var soghe = document.getElementById("soghe").innerText = document.getElementById("soghe").innerText - 1;
              if(soghe == 0)
              {
               document.getElementById("themve").disabled = true;
                alert("Đây là ghế cuối cùng còn trống của xe, không thể đặt thêm vé tiếp theo. Quý khách vui lòng thông cảm");
              }


            }

            function removeSelectedRow(r)
            {

                var i = r.parentNode.parentNode.rowIndex;
                document.getElementById("table").deleteRow(i);

                document.getElementById("soluong").value = table.rows.length-1;
                document.getElementById("soghe").innerHTML++;
                 document.getElementById("themve").disabled = false;
                 var show = document.getElementById("soluong").value;
                 if(show == 0 )
                 {
                  document.getElementById("soluong").value = "Chưa có vé";
                  document.getElementById("change").disabled = false;
                 }
               
            }
            function Change()
            {
               var table = document.getElementById("table");

            /* 3 option */
            var optionKhongxacdinh=document.createElement('option');
            optionKhongxacdinh.value="Không xác định";
            optionKhongxacdinh.innerHTML="Không xác định";

            var optionNam=document.createElement('option');
            optionNam.value="Nam";
            optionNam.innerHTML="Nam";

            var optionNu=document.createElement('option');
            optionNu.value="Nữ";
            optionNu.innerHTML="Nữ";
            ///////////////////

            var rowCount = table.rows.length;
            var row = table.insertRow(rowCount);
            //Cột 1
            var cell1 = row.insertCell(0);
            var element1 = document.createElement("input");
            element1.type = "text";
            element1.setAttribute('class', 'form-control');
            // element1.style.width = "166px";
            element1.name="cmndnguoidi[]";
            element1.required = true;
            element1.value = document.getElementById("cmnd").value;
            element1.setAttribute('form', 'loginForm');
            cell1.appendChild(element1);
              //Cột 2
            var cell2 = row.insertCell(1);
            var element2 = document.createElement("input");
            element2.type = "text";
            element2.setAttribute('class', 'form-control');
            element2.name="hotennguoidi[]";
            element2.value = document.getElementById("hoten").value;
            element2.required = true;
            element2.setAttribute('form', 'loginForm');
            cell2.appendChild(element2);
            // Cột 3
            var cell3 = row.insertCell(2);
            var element3 = document.createElement("select");
            element3.setAttribute('class', 'form-control');
            // element3.style.height = "30px"
            element3.name="gioitinhnguoidi[]";
            element3.required = true;
            element3.class = "form-control";
            // element3.value = document.getElementById("gioitinh").value;

            if(document.getElementById("gioitinh").value==="Không xác định"){
              optionKhongxacdinh.selected="true";
            }
            if(document.getElementById("gioitinh").value==="Nam"){
              optionNam.selected="true";
            }
            if(document.getElementById("gioitinh").value==="Nữ"){
              optionNu.selected="true";
            }

            element3.appendChild(optionKhongxacdinh);
            element3.appendChild(optionNam);
            element3.appendChild(optionNu);
            cell3.appendChild(element3);
             element3.setAttribute('form', 'loginForm');
            // Cột 4
            var cell4 = row.insertCell(3);
            var element4 = document.createElement("input");
            element4.type = "text";
            element4.setAttribute('class', 'form-control');
            element4.name="sdtnguoidi[]";
            element4.value = document.getElementById("sdt").value;
            element4.required = true;
            cell4.appendChild(element4);
            element4.setAttribute('form', 'loginForm');

            var cell5 = row.insertCell(4);
            var element5 = document.createElement('button');
            var text = document.createTextNode("Xóa");
            element5.appendChild(text);
            element5.title = "Xóa";
            // element5.style.background = 'initial';
            // element5.style.backgroundColor =   "#A9E2F3"
            element5.setAttribute('class', 'btn btn-outline-danger');
            element5.style.fontSize = 'smaller';
            element5.style.height = '29px';
            element5.style.textAlign = 'justify';
            // element5.class = "btn btn-outline-info";
            element5.onclick = function(){removeSelectedRow(this)};
            cell5.appendChild(element5);
            document.getElementById("change").disabled = true;
            document.getElementById("soluong").value = table.rows.length-1;
              var soghe = document.getElementById("soghe").innerText = document.getElementById("soghe").innerText - 1;
              if(soghe == 0)
              {
               document.getElementById("themve").disabled = true;
                alert("Đây là ghế cuối cùng còn trống của xe, không thể đặt thêm vé tiếp theo. Quý khách vui lòng thông cảm");
              }
            }
        </script>


@endsection
