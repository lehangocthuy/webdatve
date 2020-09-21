<header>
        <div class="container"  >
            <div class="row">
                <div class="col-lg-3 col-md-6 col-12">
                    <h1 class="text-center">
                      
                        <img src="images/ohman.gif" style="width: 350px;height: 100px;" >
                    </h1>

                </div>
                <div class="col-md-9" >
                    <div class="row" >
                        <div class="col-md-4">
                            
                        </div>
                        <div class="col-md-4">
                            <div class="header-box-right" >
                                <img width="110" height="75" src="images/tải xuống.jpg" alt="">
                                <h4>Giờ làm việc</h4>
                                <p style="font-size: 18px;color:#ff6f20;">Thứ 2 - Thứ 7:<br>
                                 08giờ - 21giờ</p>
                              
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="header-box-right">
                                <img width="100" height="85" src="images/haha.jpg" alt="">
                                <h4>SĐT liên hệ</h4>
                                <p  style="color:#ff6f20;font-size: 22px;">0764949277</span></p>
                            </div>
                        </div>
                       

                    </div>
                </div>
            </div>
        </div>
        <nav>
            <div class="btn-nav-mobile">
                <button id="click-show-nav"><i class="fa fa-bars" aria-hidden="true"></i></button>
            </div><!--style="padding-top: 10px;background-color:" -->
            <div class="container" >
                <div class="nav-main">
                    <ul>
                        <li>
                             <div class="form-datit"  >

                                
                                   <!--  <img width="50" height="50" src="images/hihi.jpg" alt=""> -->
                                <a href="#"  class="btn btn-primary" > <i class="fa fa-fw fa-home"></i>&nbsp;Trang chủ </a>
                                
                                
                        </li>

                        <li>
                            <div class="form-datit"  >
                                <a href="gioithieu"  class="btn btn-primary" > <i class="fa fa-cab"></i>&nbsp;Giới thiệu </a>
                                    
                        </li>
                      
                         @if(session()->has('data')) 
                         
                            <li>  
                            <div class="form-datit"  >
                                  <a href="suathongtincanhan/{{session('data')['tentaikhoan']}}"  class="btn btn-primary" > <i class="fa fa-smile-o"></i>&nbsp;Chào bạn {{session('data')['tentaikhoan']}} </a>
                            </li>

                        <li>
                          
                          <div class="form-datit"  >
                                 <a href="logout"  class="btn btn-primary" > <i class="fa fa-sign-out"></i>&nbsp;Đăng xuất </a>
                        </li>

                        @else

                        <li>  
                            <div class="form-datit"  >
                                  <a href="dangky"  class="btn btn-primary" > <i class="fa fa-user-plus"></i> &nbsp;Đăng ký </a>
                            </li>
                        <li> 
                             <div class="form-datit"  >
                                  <a href="dangnhap"  class="btn btn-primary" > <i class="fa fa-user"></i>&nbsp;Đăng nhập </a>

                            </li>
                        
                        @endif
                        <li>
                            <!--search tìm vé-->

                             <div class="form-datit"  >
                                 <form class="form-inline navbar-search"   method="get"  action="searchtimve" >
                                    <input class="form-control" style="width: 177px;height: 34px;border-width: 2px; padding-top: 2px" id="idve"  name="idve"  type="text" placeholder="Nhập mã phiếu đặt " />
                                <button type="submit" id="search" class="btn btn-primary fa fa-search"></button>
                                </form>
                                    
            

                        </li>


             
                    </ul>
                </div>
            </div>
            <div class="nav-mobile">
                <ul>
                        <li>
                            <a href="#">Trang chủ</a>
                        </li>
                        <li>
                            <div class="form-datit"  >
                                 <form class="form-inline navbar-search">
                                <button type="submit" name="gioithieu" class="btn btn-primary">Giới thiệu</button>
                                </form>   
                        </li>                      
                        @if(Auth::check())
                        <li><a href="#">Chào bạn {{Auth::user()->email}}</a></li>
                         <li><a href="dangxuat">Đăng xuất</a></li>

                        @else

                        <li> <a href="dangky" >Đăng ký</a></li>
                        <li><a href="dangnhap">Đăng nhập</a></li>
                        @endif
                        
                </ul>
            </div>
        </nav>
    </header>
    