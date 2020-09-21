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
                            <li>
                                <a href="chuyenxe/{{$tuyenxe->idtuyenxe}}">Chuyến xe</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div style="margin-top: 20px;"></div>
        
        <div class="container">
            <div class="row">
                 
                <div class="col-lg-9">

                  @foreach($chuyenxe as $chuyen)
                    
                    <div class="box-search shadow">
                        <div class="image">
                            <a href="chitietchuyen/{{$tuyenxe->idtuyenxe}}/{{$chuyen->idchuyenxe}}/{{$chuyen->idxe}}"> 
                                <img src="images/anhxe/{{$chuyen->hinhxe}}" alt="">
                            </a>
                        </div>
                        <div class="info">
                            <h2>
                                <a href="chitietchuyen/{{$tuyenxe->idtuyenxe}}/{{$chuyen->idchuyenxe}}/{{$chuyen->idxe}}">{{$tuyenxe->diemdi}} - {{$tuyenxe->diemden}}
                                     @if($chuyen->sogheconlai <= 0)
                                                                ({{'Hết Chỗ'}})
                                                             @else
                                                             (Còn {{$chuyen->sogheconlai}} ghế trống )
                                                             @endif
                                </a>
                                <span class="rate">5 <i class="fa fa-star" aria-hidden="true"></i></span>
                                <span class="text-rate">- 100 đánh giá</span>
                            </h2>
                            
                            <div class="price">
                                <span>{{number_format($tuyenxe->dongia)}} VND</span>
                            </div>
                            <div>
                                <span> <h4>Giờ đi: {{$chuyen->giodi}} - Giờ đến: {{$chuyen->gioden}}
                                </h4>
                                </span>
                                <span> <h4>Ngày đi:{{date('d-m-Y', strtotime($now->toDateString()))}} 
                            </h4>
                            </span>
                            </div>
                            <div class="btn-action">
                                <a href="chitietchuyen/{{$tuyenxe->idtuyenxe}}/{{$chuyen->idchuyenxe}}/{{$chuyen->idxe}}">Xem chi tiết</a>
                                @if($chuyen->sogheconlai > 0)
                                <a href="datve/{{$chuyen->idchuyenxe}}">Đặt vé</a>
                                @else
                                <a title="Quý khách vui lòng chọn chuyến xe khác, xe đã hết chỗ ngồi" >Đã hết chỗ</button>

                                 @endif
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
              
                    @endforeach
                    
                </div>
                
                <div class="col-lg-3">
                    <div class="sidebar-news">
                        <div class="items">
                            <h3>Tìm chuyến xe</h3>
                            <form action="search" method="get">
                                     <div class="dropdown" >
                      
                           <select class="form-control" id="diemdi" name="diemdi" class="dropdown-select" >
                            <option >Chọn điểm khởi hành</option>
                               @foreach($diemkhoihanh as $tuyen)
                                    <option >{{$tuyen->diemdi}}</option>
    
                                @endforeach
                            </select>
                
                       </div>  
                             
                           
                        <div class="dropdown" >
                      
                           <select class="form-control" id="diemden" name="diemden" class="dropdown-select" >
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
   

 
