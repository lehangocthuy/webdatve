<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login V18</title>
    <base href="{{asset('')}}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->  
    <link rel="icon" type="image/png" href="layoutlogin/images/icons/favicon.ico"/>
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="layoutlogin/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="layoutlogin/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="layoutlogin/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="layoutlogin/vendor/animate/animate.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="layoutlogin/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="layoutlogin/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="layoutlogin/vendor/select2/select2.min.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="layoutlogin/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="layoutlogin/css/util.css">
    <link rel="stylesheet" type="text/css" href="layoutlogin/css/main.css">
<!--===============================================================================================-->
</head>
<body style="background-color: #666666;">
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form" method="post" action="admin">
                   
                    <span class="login100-form-title p-b-43">
                        Đăng nhập để tiếp tục
                        
                        @if(session('thongbao'))
                        <small>
                            <div class="alert alert-danger">
                                {{session('thongbao')}}
                            </div>
                            </small>
                        @endif
                          
                    </span>
                    
                    
                    <div class="wrap-input100 validate-input" data-validate = "Tên tài khoản không được để trống">
                        <input class="input100" type="text" name="tentaikhoan" id="tentaikhoan" placeholder="Tài khoản">
                        <span class="focus-input100"></span>
                        
                    </div>
                    
                    
                    <div class="wrap-input100 validate-input" data-validate="Mật khẩu không được để trống">
                        <input class="input100" type="password" name="password" id="password" placeholder="Mật khẩu">
                        <span class="focus-input100"></span>
                        
                    </div>

                    <div class="flex-sb-m w-full p-t-3 p-b-32">
                        <div class="contact100-form-checkbox">
                           
                        </div>

                        <div>
                            <a href="#" class="txt1">
                               Quên mật khẩu?
                            </a>
                        </div>
                    </div>
            

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Đăng nhập
                        </button>
                    </div>
                    
                   @csrf
                </form>

                <div class="login100-more" style="background-image: url('layoutlogin/images/bg-01.jpg');">
                </div>
            </div>
        </div>
    </div>
    
<!--===============================================================================================-->
    <script src="layoutlogin/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
    <script src="layoutlogin/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
    <script src="layoutlogin/vendor/bootstrap/js/popper.js"></script>
    <script src="layoutlogin/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
    <script src="layoutlogin/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
    <script src="layoutlogin/vendor/daterangepicker/moment.min.js"></script>
    <script src="layoutlogin/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
    <script src="layoutlogin/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
    <script src="layoutlogin/js/main.js"></script>

</body>
</html>