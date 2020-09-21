<div class="user-panel mt-3 pb-3 mb-3 d-flex">
  <div class="image">
    <img src="layoutadmin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
  </div>
  <div class="info">
   <!--   @if(Auth::check())
    <a href="#" class="d-block">{{Auth::user()->hoten}}</a>
     @endif
      -->
     <a href="#" class="d-block">{{session('data')['tentaikhoan']}}</a>
  </div>
</div>
<nav class="mt-2">
  <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    <!-- Add icons to the links using the .nav-icon class
         with font-awesome or any other icon font library -->
    <li class="nav-item">
      <a href="#" class="nav-link">
        <i class="nav-icon far fa-image"></i>
        <p>
          Trang Chủ
        </p>
      </a>
    </li>
    <li class="nav-item">
      <a href="admin/tongquat" class="nav-link">
        <i class="nav-icon fas fa-th"></i>
        <p>
          Tổng quát
          <span class="right badge badge-danger">New</span>
        </p>
      </a>
    </li>

   <li class="nav-item">
      <a href="admin/noidung" class="nav-link">
        <i class="nav-icon fas fa-chart-pie"></i>
        <p>
          Thống kê
        </p>
      </a>
    </li>
    <!-- Quản lý -->
    <li class="nav-item has-treeview"> @include('admin.quanly') </li>
    <!-- End Quản lý -->
    <li class="nav-header">Liên hệ</li>

    
    <li class="nav-item has-treeview">
      <a href="#" class="nav-link">
        <i class="nav-icon far fa-envelope"></i>
        <p>
          Mailbox
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="layoutadmin/pages/mailbox/mailbox.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Tin nhắn</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="layoutadmin/pages/mailbox/compose.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Soạn tin</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="layoutadmin/pages/mailbox/read-mail.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Đọc tin</p>
          </a>
        </li>

      </ul>
    </li>
    <li class="nav-item has-treeview">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-book"></i>
        <p>
          Các trang
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="layoutadmin/pages/examples/invoice.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Hóa đơn</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="layoutadmin/pages/examples/profile.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Trang cá nhân</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="layoutadmin/pages/examples/e-commerce.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Trang chi tiết</p>
          </a>
        </li>
        
        <li class="nav-item">
          <a href="layoutadmin/pages/examples/project-add.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Trang thêm</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="layoutadmin/pages/examples/project-edit.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Trang sửa</p>
          </a>
        </li>
        <li class="nav-item"></li>
        <li class="nav-item">
          <a href="layoutadmin/pages/examples/contacts.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Trang liên hệ</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="layoutadmin/pages/examples/404.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Error 404</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="layoutadmin/pages/examples/500.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Error 500</p>
          </a>
        </li>
      </ul>
    </li>
    <li class="nav-item has-treeview">
      <a href="#" class="nav-link">
        <i class="nav-icon far fa-plus-square"></i>
        <p>
          Form liên hệ
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="layoutadmin/pages/examples/login.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Đăng nhập</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="layoutadmin/pages/examples/register.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Đăng ký</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="layoutadmin/pages/examples/forgot-password.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Quên mật khẩu</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="layoutadmin/pages/examples/recover-password.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Khôi phục mật khẩu</p>
          </a>
        </li>
      </ul>
    </li>
    <li class="nav-item has-treeview">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-tree"></i>
        <p>
          Chỉnh sửa giao diện
          <i class="fas fa-angle-left right"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="layoutadmin/pages/UI/general.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>General</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="layoutadmin/pages/UI/icons.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Icons</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="layoutadmin/pages/UI/buttons.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Buttons</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="layoutadmin/pages/UI/sliders.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Sliders</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="layoutadmin/pages/UI/modals.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Modals & Alerts</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="layoutadmin/pages/UI/navbar.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Navbar & Tabs</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="layoutadmin/pages/UI/timeline.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Timeline</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="layoutadmin/pages/UI/ribbons.html" class="nav-link">
            <i class="far fa-circle nav-icon"></i>
            <p>Ribbons</p>
          </a>
        </li>
      </ul>
    </li>
  </ul>
</nav>