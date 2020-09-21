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
                                <a href="chuyenxe/{{$chitiet->idtuyenxe}}">Chuyến xe</a>
                            </li>
                            <li><i class="fa fa-angle-double-right" aria-hidden="true"></i></li>
                            <li>
                                <a href="chitietchuyen/{{$chitiet->idtuyenxe}}/{{$chitiet->idchuyenxe}}/{{$chitiet->idxe}}">Chi tiết chuyến </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div style="margin-top: 20px;"></div>
        <div class="container">
            <div class="row">
                <style>
                    .slick-track{
                        height: auto;
                    }
                    .slick-slide img{
                        width: 100%;
                        margin: 10px 3px;
                    }
                    .slick-initialized .slick-slide{
                        padding: 5px;
                    }
                    .slick-prev, .slick-next{
                        top: -115% !important;
                    }
                    .slick-prev {
                        left: 5px;
                        top: 70px;
                    }
                    .slick-next {
                        right: 5px !important;
                        top: 70px;
                    }
                    .slick-prev:before, .slick-next:before{
                        color: #e8ebef;
                    }
                    
                </style>
                
             <div class="col-lg-7">
                    <div class="big-image">
                        <div>
                            <img src="images/anhxe/{{$chitiet->hinhxe}}" alt="">
                        </div>
                        <div>
                            <img src="https://static.vexere.com/c/i/541/xe-thesinhtourist-(sinh-cafe)-VeXeRe-m9dWrFz-1000x600.jpeg" alt="">
                        </div>
                        <div>
                            <img src="images/anhxe/{{$chitiet->hinhxe}}" alt="">
                        </div>
                        <div>
                            <img src="images/anhxe/{{$chitiet->hinhxe}}" alt="">
                        </div>
                        
                    </div>
                    <div class="list-image">
                        <div>
                            <img src="images/anhxe/{{$chitiet->hinhxe}}" alt="">
                        </div>
                        <div>
                            <img src="https://static.vexere.com/c/i/541/xe-thesinhtourist-(sinh-cafe)-VeXeRe-m9dWrFz-1000x600.jpeg" alt="">
                        </div>
                        <div>
                            <img src="images/anhxe/{{$chitiet->hinhxe}}" alt="">
                        </div>
                        <div>
                            <img src="images/anhxe/{{$chitiet->hinhxe}}" alt="">
                        </div>
                        
                        
                        
                    </div>
                </div>
                
                <div class="col-lg-5">

                    
                    <div class="info-single">
                        
                        <h1>
                            {{$chitiet->diemdi}} - {{$chitiet->diemden}}
                            <br>
                            <span class="rate">5 <i class="fa fa-star" aria-hidden="true"></i></span>
                            <span class="text-rate">- 100 đánh giá</span>
                        </h1>
                        <div class="price">
                                <span>{{number_format($chitiet->dongia)}} VND</span>
                            </div>
                        <span> 
                            <div>
                                <h1>
                                Giờ đi - Giờ đến 
                                </h1>
                                {{$chitiet->giodi}} - {{$chitiet->gioden}}
                               
                            </div>
                            <div>
                            <h1> Ngày đi - Ngày đến
                            </h1>
                               {{date('d-m-Y', strtotime($chitiet->ngaydi))}} - {{date('d-m-Y', strtotime($chitiet->ngayden))}} 
                            </h1>
                            </div>
                            <div>
                                <h1>
                            Số ghế: {{$chitiet->soghe}} - @if($soghe > 0)
                                                            Còn {{$soghe}} ghế trống
                                                         @else
                                                            {{'Không còn ghế trống'}}
                                                            @endif
                                </h1>
                            
                            </div>
                            <div>
                                <h1>
                            Loại xe: 
                            @if($chitiet->loaixe == 0)
                                        {{'Ghế ngồi'}}
                                     @else
                                        {{'Giường nằm'}}
                                     @endif
                                </h1>
                            </div>
                            </span>
                            <br>
                           
                        <button style="background: #ff7f4b">Holine: 123456789</button>
                        <br>
                        @if($soghe > 0)
                        <form action="datve/{{$chitiet->idchuyenxe}}" method="get">
                        <button >Đặt vé ngay</button>

                        </form>
                        @else
                        <button title="Quý khách vui lòng chọn chuyến xe khác, xe đã hết chỗ ngồi" >Đã hết chỗ</button>
                        @endif
                        
                    </div>   
                </div>
                
            </div>
            <hr>
            
            <!-- Tab links -->
            <div class="tab">
                <button class="tablinks active" onclick="openCity(event, 'tien-ich')">Tiện ích</button>
                <button class="tablinks" onclick="openCity(event, 'diem-don-tra')">Điểm đón trả</button>
                <button class="tablinks" onclick="openCity(event, 'chinh-sach')">Chính sách</button>
                <button class="tablinks" onclick="openCity(event, 'danh-gia')">Đánh giá</button>
            </div>
            
            <!-- Tab content -->
            <div id="tien-ich" class="tabcontent" style="display:block">
                <h3>Tiện ích</h3>
                
            </div>
            
            <div id="diem-don-tra" class="tabcontent">
                <h3>Điểm đón trả</h3>
                 - Sài Gòn: Điểm đón (Bến xe quận 8, bến xe chợ lớn,)
                         - Điểm trả()
                         <br>
                - Nha Trang: Điểm đón (Số 6 đường 23/10 tp. Nha Trang Khánh Hòa, Số 01 đường 2/4 tp. Nha Trang Khánh Hòa, Số 176 đường Trần Quý Cáp tp. Nha Trang  Khánh Hòa) - Điểm trả (Số 58 23/10 Xã Vĩnh Hiệp Nha Trang Tỉnh Khánh Hòa, Số 6 đường 23/10 tp. Nha Trang Khánh Hòa, 13B4 Hoàng Hoa Thám P.Lộc Thọ Nha Trang)
                <br>
                - Đà Lạt: Điểm đón (Bến xe buýt đường Mai Anh Đào, P8, Đà Lạt – đường Phù Đổng Thiên Vương – đường Đinh Tiên Hoàng – đường Nguyễn Thái Học- đường Lê Đại Hành) - Điểm trả (Bến xe buýt đường Mai Anh Đào, P8, Đà Lạt – đường Phù Đổng Thiên Vương – đường Đinh Tiên Hoàng – đường Nguyễn Thái Học- đường Lê Đại Hành – khu Hoà Bình – Đường 3/2 – đường Hòang Văn Thụ – ĐT 725 – Tà Nung – Nam Ban – QL27 – Đinh Văn – Phú Sơn )
                
            </div>
            
            <div id="chinh-sach" class="tabcontent">
                <h3>Chính sách</h3>
               - Đối với trẻ em dưới 36 tháng tuổi, người già trên 70,  thương binh sẻ được miễn phí vé.
                <br>
                - Trẻ em dưới 5 tuổi, người tàn tật sẻ được giảm 30% giá vé.
               
            </div>

            <div id="danh-gia" class="tabcontent">
                <h3>Đánh giá</h3>
               
            </div>
            <hr>
            <div class="row">
                <div class="col-lg-7">
                    <div class="list-box">
                        <h5>Các chuyến xe của {{$chitiet->diemdi}} - {{$chitiet->diemden}}</h5>
                        <h5>Ngày: {{date('d-m-Y', strtotime($chitiet->ngaydi))}}</h5>
                        @if($chitiet->ngaydi==$time)
                        <ul>
                             

                            @foreach($thongtinchuyen as $chuyen)
                           
                            <li>
                                <a href="chitietchuyen/{{$chuyen->idtuyenxe}}/{{$chuyen->idchuyenxe}}/{{$chuyen->idxe}}">Giờ đi: {{$chuyen->giodi}}  - {{$chuyen->gioden}}</a>
                            </li>
                           
                           
                            @endforeach
                            
                        </ul>
                        @endif
                    </div>
                </div>
               
            </div>
        </div>
        
    </main>
    
    @include('page.java')
    @endsection

    
