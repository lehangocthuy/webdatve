
 @extends('master')
@section('content')
<link rel="stylesheet" type="text/css" href="">
    <main>
        <div class="beadcrumb">
            <div class="container">
                
                <div class="row">
                    <div class="col-12">
                        <ul>
                            <li>
                                <a href="#"><i class="fa fa-home" aria-hidden="true"></i>Trang chủ</a>
                            </li>
                            <li><i class="fa fa-angle-double-right" aria-hidden="true"></i></li>
                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div style="margin-top: 20px;"></div>
        
        <div class="container">
            <h4>Tìm thấy {{count($chuyenxe)}} chuyến </h4>
            <div class="row">
                 
                <div class="col-lg-9">
                  @foreach($chuyenxe as $chuyen)
                    <div class="box-search shadow">
                        <div class="image">
                            <a href="#"> 
                                <img src="images/anhxe/{{$chuyen->hinhxe}}" alt="">
                            </a>
                        </div>
                        <div class="info">
                            <h2>
                                <a href="#">{{$chuyen->diemdi}} - {{$chuyen->diemden}}   @if($chuyen->sogheconlai <= 0)
                                                                ({{'Hết Chỗ'}})
                                                             @else
                                                             (Còn {{$chuyen->sogheconlai}} ghế trống )
                                                             @endif</a>
                                <span class="rate">5 <i class="fa fa-star" aria-hidden="true"></i></span>
                                <span class="text-rate">- 100 đánh giá</span>
                            </h2>
                            
                            <div class="price">
                                <span>{{number_format($chuyen->dongia)}} VND</span>
                            </div>
                            <div>
                            <span> <h4>Giờ đi: {{$chuyen->giodi}} - Giờ đến: {{$chuyen->gioden}}
                            </h4>
                            </span>
                            </div>
                            <div>
                            <span> <h4 class="">Ngày đi: {{date('d-m-Y', strtotime($chuyen->ngaydi))}} - Ngày đến: {{date('d-m-Y', strtotime($chuyen->ngayden))}}
                            </h4>
                            </span>
                            </div>
                             <div class="btn-action">
                                <a href="chitietchuyen/{{$chuyen->idtuyenxe}}/{{$chuyen->idchuyenxe}}/{{$chuyen->idxe}}">Xem chi tiết</a>
                                <a href="datve/{{$chuyen->idchuyenxe}}">Đặt vé</a>
                            </div>
                         
                        </div>
                        <div class="clearfix"></div>
                    </div>
                    @endforeach
                    <!-- <div class="row">
                        <div class="col-lg-12">
                            <div class="phantrang">
                                <ul>
                                    <li>
                                        <a href="#"><i class="fa fa-angle-double-left" aria-hidden="true"></i></a>
                                    </li>
                                    <li>
                                        <a href="#">1</a>
                                    </li>
                                    <li>
                                        <a href="#">2</a>
                                    </li>
                                    <li>
                                        <a href="#">3</a>
                                    </li>
                                    <li>
                                        <a href="#"><i class="fa fa-angle-double-right" aria-hidden="true"></i></a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div> -->
                </div>
                
                <div class="col-lg-3">
                    <div class="sidebar-news">
                        <div class="items">
                            <h3>Tìm chuyến xe</h3>
                            <form action="search" method="get">

                               <div class="dropdown" >
                            <select id="diemdi" name="diemdi"  class="dropdown-select" >


                                    <option >Chọn điểm khởi hành</option>

                                   @foreach($diemkhoihanh as $tuyen)
                                    <option >{{$tuyen->diemdi}}</option>
    
                                @endforeach
                            </select>
                                </div>
                           

                                 <div class="dropdown" >
                      
                           <select id="diemden" name="diemden" class="dropdown-select" >
                            <option >Chọn điểm đến</option>
                               @foreach($diemkhoihanh as $tuyen)
                                    <option >{{$tuyen->diemdi}}</option>
    
                                @endforeach
                            </select>
                
                       </div>           
                                <div>  
                                 <input class="form-control"  id="ngaydi" name="ngaydi" type="text" style="width: 230px"  data-date-format="dd-mm-yyyy" value="<?php echo date("d-m-yy");?>" >
                             </div>
                                  <button>Tìm chuyến xe</button>
                            </form>
                        </div>
                        <div class="items">
                            <img width="100%" src="https://static.vexere.com/production/banners/330/banner-home.png" alt="">
                        </div>
                        <div class="items">
                            <h3>Các điểm khởi hành</h3>
                            <ul>
                                @foreach($diemkhoihanh as $diem)
                                <li>
                                    <a href="">{{$diem->diemdi}}</a>
                                </li>
                                @endforeach
                                
                            </ul>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
        
    </main>
     <script>
$(function () {
    'use strict';
    var nowTemp = new Date();
    var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
   


    var checkin = $('#ngaydi').datepicker({
        onRender: function (date) {
            return date.valueOf() < now.valueOf() ? 'disabled' : '';

        }
    }).on('changeDate', function (ev) {
        if (ev.date.valueOf() > checkout.date.valueOf()) {
            var newDate = new Date(ev.date)
            newDate.setDate(newDate.getDate() + 1);
        }
        checkin.hide();
    }).data('datepicker');
   
});
</script>
@endsection
<style type="text/css">
 
    .dropdown {
    -moz-border-bottom-colors: none;
    -moz-border-left-colors: none;
    -moz-border-right-colors: none;
    -moz-border-top-colors: none;
    background: white;
    border-color:black; /* màu cái viền của form*/
    border-image: none;
    border-radius: 5px;
    border-style: solid;
    border-width: 1px;
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.08);
    display: inline-block;
    height: 39px;/*chiều rộng form*/
    overflow: hidden;
    position: relative;
    width: 230px;/*chiều ngang form*/
}
.dropdown:before, .dropdown:after {
    -moz-border-bottom-colors: none;
    -moz-border-left-colors: none;
    -moz-border-right-colors: none;
    -moz-border-top-colors: none;
    border-color: #888888 rgba(0, 0, 0, 0);
    border-image: none;
    border-style: dashed;
    border-width:0 /*độ bo */
    content: "";
    height: 0;
    pointer-events: none;
    position: absolute;
    right: 10px;
    top: 9px;
    width: 0;
    z-index: 2;
}
.dropdown:before {
    border-bottom-style: solid;
    border-top: medium none;
}
.dropdown:after {
    border-bottom: medium none;
    border-top-style: solid;
    margin-top: 7px;
}
.dropdown-select {
    background: ;/*màu trong ô */
    border: 0 none;
    border-radius: 0;
    color: ;/*màu chữ chữ */
    font-size: 14px;/*cỡ chữ */
    height: 39px;/* cái viền lúc chọn diem */
    line-height: 10px;
    margin: 0;
    padding: 6px 8px 6px 10px;
    position: relative;
    text-shadow: 0 1px #FFFFFF;
    width: 130%;
}
.dropdown-select:focus {
    color: #394349;
    outline: 2px solid #49AFF2;
    outline-offset: -2px;
    width: 100%;
    z-index: 3;
}
.dropdown-select > option {
    background: none repeat scroll 0 0 #F2F2F2;
    border-radius: 3px;
    cursor: pointer;
    margin: 8px;
    padding: 6px 8px;
    text-shadow: none;
}

   
</style>


   

 
