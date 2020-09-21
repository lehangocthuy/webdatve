@extends('master')
@section('content')
<main>
    
      <!--   @if(session()->has('data'))
        <script type="text/javascript">
            alert("Bạn đã đăng nhập thành công ");
        </script> -->
           
        
        <!-- @endif -->
         @if(session('thanhcong'))
                      <script type="text/javascript">
                     alert("Bạn đã đăng nhập thành công ");
                </script>
         @endif
 
        <!-- <div class="banner">
            <img style="width: 100%; height: 400px; object-fit: cover;" src="https://i.pinimg.com/originals/7e/2f/c7/7e2fc73366f80f96587cd79347d26b32.jpg" alt="">
        </div> -->
        <div class="banner">@include('page.banner')</div>
        <datalist id="categories">
    <select multiple size=8>
        @foreach($diemkhoihanh as $diem)
        <option value=" {{$diem->diemdi}}"> </option>
        @endforeach
    </select>
</datalist>
       @if(session()->has('data'))

        <section id="">
            <div class="container">
     
                <div class="title">   
                    <h3>Ưu đãi đặc biệt</h3>
                </div>

                <div class="row">
                 

                    <div class="col-lg-3 col-md-6 col-12">
                        <img style="width: 100%; margin: 10px 0;" src="https://static.vexere.com/production/banners/330/banner-home.png" alt="">
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <img style="width: 100%; margin: 10px 0;" src="https://static.vexere.com/production/banners/330/banner-home.png" alt="">
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <img style="width: 100%; margin: 10px 0;" src="https://static.vexere.com/production/banners/330/banner-home.png" alt="">
                    </div>
                    <div class="col-lg-3 col-md-6 col-12">
                        <img style="width: 100%; margin: 10px 0;" src="https://static.vexere.com/production/banners/330/banner-home.png" alt="">
                    </div>
                   
                  
                </div>
                  

            </div>
        </section>
        @endif
         @foreach($diemkhoihanh as $diem)
        <section>
            <div class="container">
               
                <div class="title">
                    <h3> Điểm khởi hành {{$diem->diemdi}}</h3>
                </div>

                
                <div class="row">

                    @foreach($tuyenxe as $tuyen)
                    @if($diem->diemdi == $tuyen->diemdi)
                    <div class="col-lg-4 col-md-8 col-12 ">
                        <div class="box-items shadow ">
                            <a href="tuyenxe/{{$tuyen->idtuyenxe}}">
                                 <img  class="zoom" src="images/anh/{{$tuyen->hinhanh}}" alt="">
                            </a>
                            <h4>
                                <a href="tuyenxe/{{$tuyen->idtuyenxe}}">{{$tuyen->diemdi}} - {{$tuyen->diemden}}</a>
                            </h4>
                        </div>
                        <br>
                    </div>
                    @endif

                    @endforeach

                </div>

                
                
            </div>
        </section>
        @endforeach
        

        

        <section id="why-used" class="shadow">
            <h3>Tại sao nên sử dụng dịch vụ của chúng tôi ?</h3>
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 col-12 text-center">
                        <div class="box-why">
                            <img src="images/1.png" alt="">
                            <h5>Giá rẻ mỗi ngày</h5>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 text-center">
                        <div class="box-why">
                            <img src="images/2.png" alt="">
                            <h5>Thanh toán linh hoạt</h5>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 text-center">
                        <div class="box-why">
                            <img src="images/3.png" alt="">
                            <h5>Hỗ trợ 24/7</h5>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 text-center">
                        <div class="box-why">
                            <img src="images/4.png" alt="">
                            <h5>Khách thực - đánh giá thực</h5>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="doitac">
            <h3>Tại sao nên sử dụng dịch vụ của chúng tôi ?</h3>
            <div class="container">
                <div class="row slick-doitac">
                    <div class="col-md-3">
                        <div class="item-doitac shadow " style="text-align: justify 
;">
                            <img class="shadow" src="images/nt.PNG" alt="">
                            <h4>Nguyễn Thị Thu Nguyệt</h4>
                            <p>
                               1/ ThuyNguyet có uy tín không?
                            </p>
                            <p>
                                Để trả lời ThuyNguyet có uy tín không, trước hết chúng ta cùng xem thử ThuyNguyet là gì đã nhé.</p>
                                  <p>

                                – Ra mắt thị trường từ năm 2013. Hiện tại, ThuyNguyet là hệ thống cung cấp vé xe lớn nhất Việt Nam. Với hơn 550 hãng xe hợp tác bán vé, phủ rộng hơn 2600 tuyến đường .

                            </p>
                            
                                
                              
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="item-doitac shadow " style="text-align: justify 
;">
                            <img class="shadow" src="images/Thuy.PNG" alt="">
                            <h4 style="text-align: center;">Lê Hà Ngọc Thủy</h4>
                           
                                2. ThuyNguyet mang lại tiện ích gì cho bạn?
                                <br>
                           
                                 – Cung cấp cho bạn nhiều cơ hội được chọn lựa, so sánh giá cả, chất lượng từ 2000+ hãng xe. Để có thể chọn được xe chất lượng với giá vé thấp nhất.
                             
                             <p>
                               – Bạn được quyền đưa ra đánh giá, nhận xét về chất lượng của các hãng xe, tài xế, nhân viên.  
                             </p>
                               <br>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="item-doitac shadow " style="text-align: justify 
;">
                            <img class="shadow" src="images/tn.PNG" alt="">
                            <h4 style="text-align: center;">Nguyệt Thủy</h4>
                            <p>
                                3. Giá vé của ThuyNguyet có cao hơn mua tại phòng vé các nhà xe không?
                                <br>
                                <br>
                            - Câu trả lời là KHÔNG nhé. ThuyNguyet cam kết giá vé luôn bằng với giá vé chính hãng. Đặc biệt, giá vé bán trên Vexere.com sẽ thấp hơn nếu bạn đặt vé vào các dịp khuyến mãi của công ty. 
                            </p>
                            <br>
                            <br>

                            
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="item-doitac shadow " style="text-align: justify 
;">
                            <p>
                                4. Chính sách hoàn tiền cho khách hàng.
                            </p>
                            Khi bạn không lên được xe đã đặt, vậy ThuyNguyet có hoàn tiền cho khách hàng không? 
                            <br>

                            – ThuyNguyet cam kết hoàn tiền vé cho quý khách nếu lỗi xảy ra do nhà xe cung cấp dịch vụ hoặc hoạt động của Vé Xe Rẻ. Nhưng nếu quý khách lỡ chuyến xe vì lý do cá nhân, Vé Xe Rẻ không cam kết hoàn tiền vé cho quý khách.
                            <br>
                            – Những trường hợp hủy vé nằm trong chính sách hủy vé của ThuyNguyet sẽ được hoàn tiền dưới hình thức chuyển khoản. 

                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="item-doitac shadow " style="text-align: justify 
;">
                            
                            <p>
                                5. Chính sách giao vé của ThuyNguyet như thế nào?
                                <br>
Bạn sẽ nhận được vé ngay sau khi hoàn tất thanh toán.
<br>

– Đối với hình thức thanh toán COD: Nhận vé trước và thanh toán tiền cho nhân viên giao nhận.
<br>
– Đối với hình thức thanh toán trực tuyến: Sau khi hoàn thành giao dịch, ThuyNguyet xác nhận bạn đã thanh toán thành công. 5 phút sau bạn sẽ nhận được mã xác nhận đặt chỗ trên tin nhắn điện thoại và email. Việc của bạn là lưu lại mã đặt chỗ này, khi lên xe trình mã cho nhà xe là được.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
  <style>
img.zoom {
cursor: pointer;
max-width: 99.4%;
}
img.zoom:hover {
max-width: none;
}
</style>  
@endsection
