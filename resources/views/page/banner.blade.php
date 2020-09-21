
<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="3" ></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="4"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="5"></li>
    <li data-target="#carouselExampleCaptions" data-slide-to="6"></li>
     <li data-target="#carouselExampleCaptions" data-slide-to="7"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="images/115.jpg" class="d-block w-100"style="width: 2000px;height: 400px; object-fit: cover;" >
      <div class="carousel-caption d-none d-md-block">
       
        <p>Xin chào bạn đến với website bán vé xe Thủy Nguyệt</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="images/10.jpg" class="d-block w-100"style="width: 2000px;height: 400px; object-fit: cover;" >
      <div class="carousel-caption d-none d-md-block">
        
        <p>Xin chào bạn đến với website bán vé xe Thủy Nguyệt</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="images/14.jpg" class="d-block w-100"style="width: 2000px;height: 400px; object-fit: cover;" >
      <div class="carousel-caption d-none d-md-block">
       
        <p>Xin chào bạn đến với website bán vé xe Thủy Nguyệt</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="images/83.jpg" class="d-block w-100"style="width: 2000px;height: 400px; object-fit: cover;" >
      <div class="carousel-caption d-none d-md-block">
       
        <p>Xin chào bạn đến với website bán vé xe Thủy Nguyệt</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="images/18.jpg" class="d-block w-100"style="width: 2000px;height: 400px; object-fit: cover;" >
      <div class="carousel-caption d-none d-md-block">
        
        <p>Xin chào bạn đến với website bán vé xe Thủy Nguyệt</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="images/20.jpg" class="d-block w-100"style="width: 2000px;height: 400px; object-fit: cover;" >
      <div class="carousel-caption d-none d-md-block">
        
        <p>Xin chào bạn đến với website bán vé xe Thủy Nguyệt</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="images/66.jpg" class="d-block w-100"style="width: 2000px;height: 400px; object-fit: cover;" >
      <div class="carousel-caption d-none d-md-block">
      
        <p>Xin chào bạn đến với website bán vé xe Thủy Nguyệt</p>
      </div>
    </div>
    <div class="carousel-item">
      <img src="images/100.jpg" class="d-block w-100"style="width: 2000px;height: 400px; object-fit: cover;" >
      <div class="carousel-caption d-none d-md-block">
       
        <p>Xin chào bạn đến với website bán vé xe Thủy Nguyệt</p>
      </div>
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<script>   
$('#carouselExampleCaptions').carousel({ 
    interval:   2500    
});
</script> 
            <div class="form-search-banner shadow">
                <form action="search" method="get">
                       
                       <div class="dropdown" >
                      
                           <select id="diemdi" name="diemdi" class="dropdown-select" >
                            
                            <option >Chọn điểm khởi hành</option>
                               @foreach($diemkhoihanh as $tuyen)
                                    <option >{{$tuyen->diemdi}}</option>
    
                                @endforeach
                            </select>
                
                       </div>                   
                &nbsp;&nbsp;&nbsp;
              
                                <div class="dropdown" >
                            <select id="diemden" name="diemden"  class="dropdown-select" >


                                    <option >Chọn điểm đến</option>

                                   @foreach($diemkhoihanh as $tuyen)
                                    <option >{{$tuyen->diemdi}}</option>
    
                                @endforeach
                            </select>
                                </div>
                   &nbsp;
                    <div >
                       <input class="form-control" style="border-color:#0066FF ;border-width: 1.5px;width: 270px;" id="ngaydi" name="ngaydi" type="text" placeholder="yyyy/mm/dd" data-date-format="dd-mm-yyyy" value="<?php echo date("d-m-yy");?>" >
                   
                   </div>
                     &nbsp;&nbsp;                 
                    <div>
                        <button class="btn-search" style="width: 100px;">Tìm chuyến xe</button>
                    </div>
                </form>
            </div>
        
  <style type="text/css">

   



      .dropdown {
    -moz-border-bottom-colors: none;
    -moz-border-left-colors: none;
    -moz-border-right-colors: none;
    -moz-border-top-colors: none;
    background: white;
    border-color: #0066FF;/*cái viền của form*/
    border-image: none;
    border-radius: 5px;
    border-style: solid;
    border-width: 1.5px;/*cái viền đậm hay lợt*/
    box-shadow: 0 1px 1px rgba(0, 0, 0, 0.08);
    display: inline-block;
    height: 42px;/*chiều rộng form*/
    overflow: hidden;
    position: relative;
    width: 270px;/*chiều ngang form*/
}
.dropdown:before, .dropdown:after {
    -moz-border-bottom-colors: none;
    -moz-border-left-colors: none;
    -moz-border-right-colors: none;
    -moz-border-top-colors: none;
    border-color: #888888 rgba(0, 0, 0, 0);
    border-image: none;
    border-style: dashed;
    border-width: 4px;
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
    color: black;
    font-size: 16px;/*cỡ chữ */
    height: 42px;/* cái viền lúc chọn diem */
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