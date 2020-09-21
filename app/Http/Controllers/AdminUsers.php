<?php

namespace App\Http\Controllers;

use App\User;
use App\users;
use DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;

class AdminUsers extends Controller
{
    //
    public function getUsers()
    {
        $taikhoan = DB::table('users')->where('level', '=', 0)
            ->Orwhere('level', null)
            ->Orwhere('level', 2)->get();
        $stt = 0;
        foreach ($taikhoan as $tk) {
            $stt     = $stt + 1;
            $tk->stt = $stt;
        }
        return view('admin.page.users.danhsach', compact('taikhoan'));
    }

    public function getCam($id)
    {
        $taikhoan = DB::table('users')->where('idtk', $id)->first();
        return view('admin.page.users.cam', compact('taikhoan'));

    }

    public function postCam(Request $req, $id)
    {
        $lydo     = $req->lydo;
        $taikhoan = DB::table('users')->where('idtk', $id)->update(['level' => '2', 'lydo' => $lydo]);
        return redirect('admin/users/danhsach')->with('thongbao', 'Đã cấm tài khoản');
    }

    public function getAdmin()
    {
        $nguyet   = DB::table('users')->where('level', '=', 1)->get();
        $taikhoan = DB::table('users')->get();
        return view('admin.page.users.danhsachadmin', compact('taikhoan', 'nguyet'));
    }

    public function getThem()
    {
        $taikhoan = DB::table('users')->get();
        return view('admin.page.users.them', compact('taikhoan'));
    }

    public function getThemAdmin()
    {
        $taikhoan = DB::table('users')->get();
        return view('admin.page.users.themadmin', compact('taikhoan'));
    }

    public function postThem(Request $req)
    {
        $this->validate($req,
            [
                'tentaikhoan' => 'required|unique:users,tentaikhoan',
                'password'    => 'required|min:5|max:20',
                're_password' => 'required|same:password',
                'email'       => 'required|email|unique:users,email',
                'hoten'       => 'required|max:25',
                'diachi'      => 'required',

            ],
            [

                'tentaikhoan.required' => ' Bạn chưa nhập tên tài khoản',
                'tentaikhoan.unique'   => ' Tên tài khoản đã có người sử dụng',
                'password.required'    => ' Bạn chưa nhập mật khẩu',
                'password.min'         => ' Mật khẩu ít nhất 5 ký tự',
                'password.max'         => ' Mật khẩu nhiều nhất 20 ký tự',
                're_password.required' => 'Bạn chưa xác nhận lại mật khẩu.',
                're_password.same'     => 'Mật khẩu không trùng nhau.',
                'email.required'       => 'Bạn chưa nhập email',
                'email.unique'         => 'Email đã có người sử dụng',
                'email.email'          => 'Email không đúng định dạng',
                'hoten.required'       => 'Bạn chưa nhập họ tên',
                'hoten.max'            => 'Họ tên không vượt quá 25 ký tự',
                'diachi.required'      => 'Bạn chưa nhập địa chỉ',

            ]);
        $taikhoan              = new Users();
        $taikhoan->tentaikhoan = $req->tentaikhoan;
        $taikhoan->password    = bcrypt($req->password);
        $taikhoan->email       = $req->email;
        $taikhoan->hoten       = $req->hoten;
        $taikhoan->gioitinh    = $req->gioitinh;
        $taikhoan->diachi      = $req->diachi;
        $taikhoan->level       = $req->level;
        $taikhoan->save();
        return redirect('admin/users/danhsach')->with('thongbao', 'Thêm thành công');
    }
    public function postThemAdmin(Request $req)
    {
        $this->validate($req,
            [
                'tentaikhoan' => 'required|unique:users,tentaikhoan',
                'password'    => 'required|min:5|max:20',
                're_password' => 'required|same:password',
                'email'       => 'required|email|unique:users,email',
                'hoten'       => 'required|max:25',
                'diachi'      => 'required',

            ],
            [

                'tentaikhoan.required' => ' Bạn chưa nhập tên tài khoản',
                'tentaikhoan.unique'   => ' Tên tài khoản đã có người sử dụng',
                'password.required'    => ' Bạn chưa nhập mật khẩu',
                'password.min'         => ' Mật khẩu ít nhất 5 ký tự',
                'password.max'         => ' Mật khẩu nhiều nhất 20 ký tự',
                're_password.required' => 'Bạn chưa xác nhận lại mật khẩu.',
                're_password.same'     => 'Mật khẩu không trùng nhau.',
                'email.required'       => 'Bạn chưa nhập email',
                'email.unique'         => 'Email đã có người sử dụng',
                'email.email'          => 'Email không đúng định dạng',
                'hoten.required'       => 'Bạn chưa nhập họ tên',
                'hoten.max'            => 'Họ tên không vượt quá 25 ký tự',
                'diachi.required'      => 'Bạn chưa nhập địa chỉ',

            ]);
        $taikhoan              = new Users();
        $taikhoan->tentaikhoan = $req->tentaikhoan;
        $taikhoan->password    = bcrypt($req->password);
        $taikhoan->email       = $req->email;
        $taikhoan->hoten       = $req->hoten;
        $taikhoan->gioitinh    = $req->gioitinh;
        $taikhoan->diachi      = $req->diachi;
        $taikhoan->level       = $req->level;
        $taikhoan->save();
        return redirect('admin/users/danhsachadmin')->with('hihi', 'Thêm thành công');
    }

    public function getSua($id)
    {
        $taikhoan = DB::table('users')
            ->where('idtk', $id)->first();
        return view('admin.page.users.sua', compact('taikhoan'));
    }
    public function postSua(Request $req, $id)
    {
        $this->validate($req,
            [

                'email'  => 'required|email',
                'hoten'  => 'required|max:25',
                'diachi' => 'required',

            ],
            [
                'email.required'  => 'Bạn chưa nhập email',
                'email.email'     => 'Email không đúng định dạng',
                'hoten.required'  => 'Bạn chưa nhập họ tên',
                'hoten.max'       => 'Họ tên không vượt quá 25 ký tự',
                'diachi.required' => 'Bạn chưa nhập địa chỉ',

            ]);
        $taikhoan              = users::find($id);
        $taikhoan->tentaikhoan = $req->tentaikhoan;
        $taikhoan->password    = $req->password;
        $taikhoan->email       = $req->email;
        $taikhoan->hoten       = $req->hoten;
        $taikhoan->gioitinh    = $req->gioitinh;
        $taikhoan->diachi      = $req->diachi;
        $taikhoan->level       = $req->level;
        $taikhoan->save();
        return redirect('admin/users/danhsach')->with('thongbao', 'Sửa thành công');
    }

    public function getSuaAdmin($id)
    {
        $taikhoan = DB::table('users')
            ->where('idtk', $id)->first();
        return view('admin.page.users.suaadmin', compact('taikhoan'));
    }
    public function postSuaAdmin(Request $req, $id)
    {
        $this->validate($req,
            [
                'email'  => 'required|email',
                'hoten'  => 'required|max:25',
                'diachi' => 'required',
            ],
            [
                'email.required'  => 'Bạn chưa nhập email',
                'email.email'     => 'Email không đúng định dạng',
                'hoten.required'  => 'Bạn chưa nhập họ tên',
                'hoten.max'       => 'Họ tên không vượt quá 25 ký tự',
                'diachi.required' => 'Bạn chưa nhập địa chỉ',
            ]);
        $taikhoan              = users::find($id);
        $taikhoan->tentaikhoan = $req->tentaikhoan;
        $taikhoan->password    = $req->password;
        $taikhoan->email       = $req->email;
        $taikhoan->hoten       = $req->hoten;
        $taikhoan->gioitinh    = $req->gioitinh;
        $taikhoan->diachi      = $req->diachi;
        $taikhoan->level       = $req->level;
        $taikhoan->save();
        return redirect('admin/users/danhsachadmin')->with('hihi', 'Sửa thành công');
    }

    public function getDoimk($id)
    {
        $taikhoan = DB::table('users')
            ->where('idtk', $id)->first();
        return view('admin.page.users.doimatkhau', compact('taikhoan'));
    }

    public function postDoimk(Request $req, $id)
    {
        $this->validate($req,
            [
                'password'  => 'required',
                'password1' => 'required',
                'password2' => 'required|same:password1',
            ],
            [
                'password.required'  => 'Nhập mật khẩu củ',
                'password1.required' => ' Nhập mật khẩu mới',
                'password2.required' => ' Nhập lại mật khẩu mới',
                'password2.same'     => 'Xác nhận mật khẩu mới không đúng',
            ]);
        if (Auth::attempt(['tentaikhoan' => $req->tentaikhoan, 'password' => $req->password])) {
            $taikhoan           = users::find($id);
            $taikhoan->password = bcrypt($req->password1);
            $taikhoan->save();
            return redirect('admin/users/danhsach')->with('thongbao', 'Thay đổi mật khẩu thành công');
        } else {
            return redirect('admin/users/danhsach')->with('thongbao', 'Đổi mật khẩu không thành công');
        }
    }

    public function getDoimkAdmin($id)
    {
        $taikhoan = DB::table('users')
            ->where('idtk', $id)->first();
        return view('admin.page.users.doimatkhauadmin', compact('taikhoan'));
    }

    public function postDoimkAdmin(Request $req, $id)
    {
        $this->validate($req,
            [
                'password'  => 'required',
                'password1' => 'required',
                'password2' => 'required|same:password1',
            ],
            [
                'password.required'  => 'Nhập mật khẩu củ',
                'password1.required' => ' Nhập mật khẩu mới',
                'password2.required' => ' Nhập lại mật khẩu mới',
                'password2.same'     => 'Xác nhận mật khẩu mới không đúng',
            ]);
        if (Auth::attempt(['tentaikhoan' => $req->tentaikhoan, 'password' => $req->password])) {
            $taikhoan           = users::find($id);
            $taikhoan->password = bcrypt($req->password1);
            $taikhoan->save();
            return redirect('admin/users/danhsachadmin')->with('hihi', 'Thay đổi mật khẩu thành công');
        } else {
            return redirect('admin/users/danhsachadmin')->with('hihi', 'Đổi mật khẩu không thành công');

        }
    }

    public function getXoaAdmin($id)
    {
        $taikhoan = DB::table('users')->where('idtk', $id)->delete();
        return redirect('admin/users/danhsachadmin')->with('hihi', 'Xóa thành công');
    }

    public function getLogin()
    {
        // $tentaikhoan = session('data')['tentaikhoan'];
        if (!session()->has('data')) {
            return view('admin.login');
        } else {
            $users = DB::table('users')->where('tentaikhoan', $tentaikhoan)->first();
            if ($users->level != 1) {
                return view('admin.login');
            } else {
                return redirect('admin/noidung');
            }

        }
    }
    public function postLogin(Request $req)
    {
        if (Auth::attempt(['tentaikhoan' => $req->tentaikhoan, 'password' => $req->password])) {
            if (Auth::check()) {
                $users = Auth::user();
                if ($users->level == 1) {
                    $req->session()->put('data', $req->input());
                    return redirect('admin/noidung');
                } else {
                    return redirect('admin')->with('thongbao', 'Tài khoản này không đủ quyền truy cập');
                }

            }
        } else {
            return redirect('admin')->with('thongbao', 'Tài khoản hoặc mật khẩu không chính xác');
        }
    }

    public function getLogout()
    {
        session()->forget('data');
        return view('admin.login');
    }

}
