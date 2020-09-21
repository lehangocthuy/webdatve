<?php

namespace App\Http\Controllers;

// use Illuminate\Support\Facades\Auth;
use App\ChuyenXe;
use App\NguoiDi;
use App\Rules\Captcha;
use App\User;
use App\Ve;
use Auth;
use Carbon\Carbon;
use DB;
use Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Session;

class PageController extends Controller
{
    //
    public function test()
    {
           $ngaydi = Carbon::now();
           $formatngaydi = $ngaydi->toDateString();
           $ngayden = Carbon::tomorrow();
           $formatngayden = $ngayden->toDateString();

            DB::table('chuyenxe')->insert([
        ['giodi' => '05:00:00' , 'gioden' => '14:00:00', 'ngaydi' => $formatngaydi ,'ngayden' => $formatngaydi, 'idtuyenxe' => '1', 'idxe' => '1'],
        ['giodi' => '08:15:00' , 'gioden' => '17:15:00' , 'ngaydi' => $formatngaydi,'ngayden' => $formatngaydi, 'idtuyenxe' => '1', 'idxe' => '2'],
        ['giodi' => '11:15:00' , 'gioden' => '20:15:00', 'ngaydi' => $formatngaydi,'ngayden' =>  $formatngaydi, 'idtuyenxe' => '1', 'idxe' => '3'],
        ['giodi' => '14:15:00' , 'gioden' => '23:15:00', 'ngaydi' => $formatngaydi, 'ngayden' => $formatngaydi, 'idtuyenxe' => '1', 'idxe' => '4'],
        ['giodi' => '17:15:00' , 'gioden' => '02:15:00', 'ngaydi' => $formatngaydi,'ngayden' => $formatngayden, 'idtuyenxe' => '1', 'idxe' => '5'],
        ['giodi' => '20:15:00' , 'gioden' => '05:15:00', 'ngaydi' => $formatngaydi,'ngayden' => $formatngayden, 'idtuyenxe' => '1', 'idxe' => '6'],
            ]);

        // //Xử lý vé
        //  $time = Carbon::now();
        // $timeformat = $time->ToTimeString();
        // $giohientai = substr($timeformat,0,2).substr($timeformat,3,2);
        // $ve = DB::table('ve')->where('trangthai',null)
        // ->get();
        //  $update = [];
        // foreach($ve as $v)
        // {
        //     $giocreated = $v->created_at;
        //     $giosql = substr($v->created_at, 11, 2).substr($v->created_at, 14, 2);
        //     $gio = $giohientai - $giosql;
        //     if($gio >= '100' )
        //     {
        //        $up = DB::table('ve')->where('idve',$v->idve)
        //         ->update(array('trangthai'=>'2'));
        //         $update[$v->idve] = $up;
        //     }
        // }
        //END xử lý vé

        // DD($giohientai,$giosql,$gio);
        // dd($gio);
        // $ve = DB::table('ve')->whereDate('created_at','=','2020-08-23')->get();
        // $ngaydau = substr('2020-08-20 - 2020-08-20',0,10);
        // $ngaycuoi = substr('2020-08-20 - 2020-08-20',-10);
        // $chuyenxe = DB::table('chuyenxe')->whereBetween('ngaydi',[$ngaydau,$ngaycuoi])->get();
        // DD($chuyenxe);
        return view('test');
    }

    public function postTest(Request $req)
    {
        $ngaydi  = $req->ngaydi;
        $ngayden = $req->ngayden;
        DB::table('chuyenxe')->insert([
            ['giodi' => '05:00:00', 'gioden' => '14:00:00', 'ngaydi' => $ngaydi, 'ngayden' => $ngaydi, 'idtuyenxe' => '1', 'idxe' => '1'],
            ['giodi' => '08:15:00', 'gioden' => '17:15:00', 'ngaydi' => $ngaydi, 'ngayden' => $ngaydi, 'idtuyenxe' => '1', 'idxe' => '2'],
            ['giodi' => '11:15:00', 'gioden' => '20:15:00', 'ngaydi' => $ngaydi, 'ngayden' => $ngaydi, 'idtuyenxe' => '1', 'idxe' => '3'],
            ['giodi' => '14:15:00', 'gioden' => '23:15:00', 'ngaydi' => $ngaydi, 'ngayden' => $ngaydi, 'idtuyenxe' => '1', 'idxe' => '4'],
            ['giodi' => '17:15:00', 'gioden' => '02:15:00', 'ngaydi' => $ngaydi, 'ngayden' => $ngayden, 'idtuyenxe' => '1', 'idxe' => '5'],
            ['giodi' => '20:15:00', 'gioden' => '05:15:00', 'ngaydi' => $ngaydi, 'ngayden' => $ngayden, 'idtuyenxe' => '1', 'idxe' => '6'],
        ]);
    }
    public function getIndex()
    {
        $diemkhoihanh = DB::table('tuyenxe')->select('diemdi')->distinct()->get();
        $tuyenxe      = DB::table('tuyenxe')->get();
        $chuyenxe     = DB::table('chuyenxe')->get();
        return view('page.index', compact('tuyenxe', 'diemkhoihanh', 'chuyenxe'));
    }
    public function getChuyenxe($id)
    {
        $time     = now()->toDateString('Y-m-d');
        $hihi     = now()->toTimeString();
        $chuyenxe = DB::table('chuyenxe')
            ->join("xe", "chuyenxe.idxe", "=", "xe.idxe")
            ->where('idtuyenxe', $id)
            ->where('ngaydi', '=', $time)
            ->where('giodi', '>', $hihi)
            ->get();
        $tuyenxe      = DB::table('tuyenxe')->where('idtuyenxe', $id)->first();
        $diemkhoihanh = DB::table('tuyenxe')->select('diemdi')->distinct()->get();
        $now          = Carbon::now('Asia/Ho_Chi_Minh');
        foreach ($chuyenxe as $chuyen) {
            $tongve = DB::table('ve')
                ->join('chuyenxe', 'chuyenxe.idchuyenxe', '=', 've.idchuyenxe')
                ->where('ve.idchuyenxe', $chuyen->idchuyenxe)
                ->sum('soluong');
            $chuyen->sogheconlai = $chuyen->soghe - $tongve;
        }
        return view('page.chuyenxe', compact('chuyenxe', 'tuyenxe', 'diemkhoihanh', 'time', 'now', 'hihi'));
    }

    public function getDangky()
    {
        return view('page.dangky');
    }

    public function getDangnhap(Request $req)
    {
        return view('page.dangnhap');
    }

    public function getDoimatkhau($id)
    {
        $taikhoan = DB::table('users')->where('tentaikhoan', $id)->first();
        return view('page.doimatkhau', compact('taikhoan'));
    }

    public function postDoimatkhau(Request $req, $id)
    {
        $this->validate($req,
            [
                'password'  => 'required',
                'password1' => 'required',
                'password2' => 'required|same:password1',
            ],
            [
                'password.required'  => 'Nhập mật khẩu cũ',
                'password1.required' => ' Nhập mật khẩu mới',
                'password2.required' => ' Nhập lại mật khẩu mới',
                'password2.same'     => 'Xác nhận mật khẩu mới không đúng',
            ]);
        if (Auth::attempt(['tentaikhoan' => $id, 'password' => $req->password])) {
            $taikhoan = DB::table('users')->where('tentaikhoan', $id)->update(['password' => bcrypt($req->password1)]);
            session()->forget('data');
            return redirect('dangnhap')->with('thanhcong', 'Đổi mật khẩu thành công, quý khách vui lòng đăng nhập lại');
        } else {
            return redirect()->route('doimatkhauKH', [$id])->with('thongbao', 'Đổi mật khẩu không thành công');
        }

    }

    public function getSuaThongtincanhan($id)
    {
        $taikhoan = DB::table('users')->where('tentaikhoan', $id)->first();
        return view('page.suathongtincanhan', compact('taikhoan'));
    }

    public function postSuaThongtincanhan(Request $req, $id)
    {
        $this->validate($req,
            [
                'email'  => 'required|email',
                'hoten'  => 'required',
                'diachi' => 'required',
                'cmnd'   => 'required|numeric|not_regex:/^\d{10,11}$/|regex:/^\d{9,12}$/',
                'sdt'    => 'required|regex:/(0)[0-9]{9}/',
            ],
            [
                'email.required'  => 'Bạn chưa nhập email',
                'email.email'     => 'Email không đúng định dạng',
                'hoten.required'  => 'Bạn chưa nhập họ tên',
                'diachi.required' => 'Bạn chưa nhập địa chỉ',
                'cmnd.required'   => 'Bạn chưa nhập chứng minh nhân dân',
                'cmnd.not_regex'  => 'Chứng minh nhân dân và thẻ căn cước chỉ 9 và 12 số',
                'cmnd.regex'      => 'Chứng minh nhân dân và thẻ căn cước chỉ 9 và 12 số',
                'cmnd.numeric'    => 'Chứng minh nhân dân và thẻ căn cước chỉ được số',
                'sdt.required'    => 'Bạn chưa nhập số điện thoại ',
                'sdt.regex'       => 'Số điện thoại phải bắt đầu từ số 0 và quy định bởi 10 số',
            ]);
        $taikhoan = DB::table('users')->where('tentaikhoan', $id)->update(['email' => $req->email, 'hoten' => $req->hoten, 'gioitinh' => $req->gioitinh, 'cmnd' => $req->cmnd, 'sdt' => $req->sdt, 'diachi' => $req->diachi]);
        return redirect()->route('suathongtincanhan', [$id])->with('thanhcong', 'Sửa thông tin bạn thành công');
    }
    public function getChitiet($idtuyenxe, $idchuyenxe, $idxe)
    {
        $now     = Carbon::now('Asia/Ho_Chi_Minh');
        $time    = now()->toDateString('Y-m-d');
        $chitiet = DB::table('tuyenxe')
            ->join('chuyenxe', 'tuyenxe.idtuyenxe', '=', 'chuyenxe.idtuyenxe')
            ->join('xe', 'chuyenxe.idxe', '=', 'xe.idxe')
            ->where('tuyenxe.idtuyenxe', '=', $idtuyenxe)
            ->where('chuyenxe.idchuyenxe', '=', $idchuyenxe)
            ->where('xe.idxe', '=', $idxe)
            ->first();

        $diemkhoihanh   = DB::table('tuyenxe')->select('diemdi')->distinct()->get();
        $thongtinchuyen = DB::table('chuyenxe')
            ->where('idtuyenxe', $idtuyenxe)->get()
            ->where('ngaydi', $time);

        $tongve = DB::table('ve')
            ->join('chuyenxe', 'chuyenxe.idchuyenxe', '=', 've.idchuyenxe')
            ->where('ve.idchuyenxe', '=', $idchuyenxe)
            ->sum('soluong');
        $soghe = $chitiet->soghe - $tongve;
        return view('page.chitietchuyen', compact('chitiet', 'diemkhoihanh', 'thongtinchuyen', 'now', 'time', 'tongve', 'soghe'));
    }
    public function getSearch(Request $req)
    {
        $diemdi      = $req->diemdi;
        $diemden     = $req->diemden;
        $ngaydi      = date('Y-m-d', strtotime($req->ngaydi));
        $hihi        = now()->toTimeString();
        $ngayhientai = now()->toDateString();
        $ngaysql     = DB::table('chuyenxe')->select('ngaydi')->get();
        if ($ngaydi != $ngayhientai) {
            $diemkhoihanh = DB::table('tuyenxe')->select('diemdi')->distinct()->get();
            $chuyenxe     = DB::table("chuyenxe")
                ->join("tuyenxe", "chuyenxe.idtuyenxe", "=", "tuyenxe.idtuyenxe")
                ->join("xe", "chuyenxe.idxe", "=", "xe.idxe")
                ->where('diemdi', 'like', '%' . $req->diemdi . '%')
                ->where('diemden', 'like', '%' . $req->diemden . '%')
                ->where("ngaydi", "=", $ngaydi)
                ->get();
            foreach ($chuyenxe as $chuyen) {
                $tongve = DB::table('ve')
                    ->join('chuyenxe', 'chuyenxe.idchuyenxe', '=', 've.idchuyenxe')
                    ->where('ve.idchuyenxe', $chuyen->idchuyenxe)
                    ->sum('soluong');
                $chuyen->sogheconlai = $chuyen->soghe - $tongve;
            }
            $now = Carbon::now('Asia/Ho_Chi_Minh')->hour;
            return view('page.search', compact('diemkhoihanh', 'diemdi', 'diemden', 'chuyenxe', 'ngaydi'));
        } else {
            $diemkhoihanh = DB::table('tuyenxe')->select('diemdi')->distinct()->get();
            $chuyenxe     = DB::table("chuyenxe")
                ->join("tuyenxe", "chuyenxe.idtuyenxe", "=", "tuyenxe.idtuyenxe")
                ->join("xe", "chuyenxe.idxe", "=", "xe.idxe")
                ->where('diemdi', 'like', '%' . $req->diemdi . '%')
                ->where('diemden', 'like', '%' . $req->diemden . '%')
                ->where("ngaydi", "=", $ngaydi)
                ->where('giodi', '>', $hihi)
                ->get();
            foreach ($chuyenxe as $chuyen) {
                $tongve = DB::table('ve')
                    ->join('chuyenxe', 'chuyenxe.idchuyenxe', '=', 've.idchuyenxe')
                    ->where('ve.idchuyenxe', $chuyen->idchuyenxe)
                    ->sum('soluong');
                $chuyen->sogheconlai = $chuyen->soghe - $tongve;
            }
            $now = Carbon::now('Asia/Ho_Chi_Minh')->hour;
            return view('page.search', compact('diemkhoihanh', 'diemdi', 'diemden', 'chuyenxe', 'ngaydi'));
        }
    }

    public function getSearchtimve(Request $req)
    {
        $ve = DB::table("ve")
            ->join("chuyenxe", "ve.idchuyenxe", "=", "chuyenxe.idchuyenxe")
            ->join("xe", "chuyenxe.idxe", "=", "xe.idxe")
            ->join("tuyenxe", "chuyenxe.idtuyenxe", "=", "tuyenxe.idtuyenxe")
            ->where("idve", "=", $req->idve)
            ->get();
        foreach ($ve as $v) {
            # code...
            $v->hiddensdt = $this->HiddenPhone($v->sdt);
        }
        $nguoidi = DB::table('nguoidi')
            ->join("ve", "ve.idve", "=", "nguoidi.idve")
            ->where('ve.idve', $req->idve)
            ->get();
        foreach ($nguoidi as $nguoi) {
            # code...
            $nguoi->hiddensdt = $this->HiddenPhone($nguoi->sdtnguoidi);
        }
        return view('page.searchtimve', compact('ve', 'nguoidi'));
    }

    public function postDangky(Request $req)
    {
        $this->validate($req,
            [
                'tentaikhoan'          => 'required|min:5|max:35|unique:users,tentaikhoan',
                'password'             => 'required|min:5|max:20',
                're_password'          => 'required|same:password',
                'email'                => 'required|email|unique:users,email',
                'hoten'                => 'required|min:5|max:25',
                'diachi'               => 'required|min:10|max:40',
                'g-recaptcha-response' => new Captcha(),
            ],
            [
                'email.required'       => ' Bạn chưa nhập email.',
                'email.email'          => 'Email không đúng định dạng',
                'email.unique'         => 'Email đã có người sử dụng',
                'password.required'    => 'Bạn nhập mật khẩu.',
                'password.min'         => 'Mật khẩu ít nhất 5 ký tự.',
                'password.max'         => 'Mật khẩu nhiều nhất 20 ký tự.',
                're_password.required' => 'Bạn chưa xác nhận lại mật khẩu.',
                're_password.same'     => 'Mật khẩu không trùng nhau.',
                'tentaikhoan.required' => 'Bạn chưa nhập tên tài khoản.',
                'tentaikhoan.unique'   => 'Tên tài khoản đã có người sử dụng',
                'tentaikhoan.min'      => 'Tên tài khoản ít nhất 5 ký tự.',
                'tentaikhoan.max'      => 'Tên tài khoản nhiều nhất 35 ký tự.',
                'hoten.required'       => 'Bạn chưa nhập họ tên .',
                'hoten.min'            => 'Họ tên trên 5 ký tự.',
                'diachi.required'      => 'Bạn chưa nhập địa chỉ.',
                'diachi.min'           => 'Địa chỉ ít nhất 10 ký tự.',
                'diachi.max'           => 'Địa chỉ nhiều nhất 40 ký tự.',
            ]);

        $user              = new User();
        $user->tentaikhoan = $req->tentaikhoan;
        $user->password    = Hash::make($req->password);
        $user->email       = $req->email;
        $user->hoten       = $req->hoten;
        $user->gioitinh    = $req->gioitinh;
        $user->diachi      = $req->diachi;
        $user->save();
        $req->session()->put('dangky', $req->input());
        return redirect()->route('dangnhap')->with('hihi', 'Bạn Đã Tạo Tài Khoản Thành Công');
    }

    public function postDangnhap(Request $req)
    {
        $this->validate($req,
            [
                'tentaikhoan' => 'required|min:5|max:35',
                'password'    => 'required|min:5|max:20',
            ],
            [

                'tentaikhoan.required' => 'Bạn chưa nhập tên tài khoản.',
                'tentaikhoan.min'      => 'Tên tài khoản ít nhất 5 ký tự.',
                'tentaikhoan.max'      => 'Tên tài khoản nhiều nhất 25 ký tự.',
                'password.required'    => 'Vui lòng nhập mật khẩu',
                'password.min'         => 'Mật khẩu ít nhất 5 kí tự',
                'password.max'         => 'Mật khẩu không quá 20 kí tự',
            ]);

        if (Auth::attempt(['tentaikhoan' => $req->tentaikhoan, 'password' => $req->password])) {
            $taikhoanbicam = DB::table('users')->where('tentaikhoan', $req->tentaikhoan)->first();
            if ($taikhoanbicam->level == 2) {
                return redirect()->back()->with(['flag' => 'danger', 'message' => 'Đăng nhập không thành công, tài khoản này đã bị cấm, vì lý do: ' . $taikhoanbicam->lydo]);
            } else {
                $req->session()->put('data', $req->input());
                return redirect()->route('index')->with('thanhcong', 'Bạn đã đăng nhập thành công');
            }
        } else {
            return redirect()->back()->with(['flag' => 'danger', 'message' => 'Đăng nhập không thành công']);
        }
    }

    public function postLogout()
    {
        session()->forget('data');
        return redirect()->route('index');
    }

    public function getDatve($id)
    {
        $thongtinchuyen = DB::table('chuyenxe')
            ->join('xe', 'chuyenxe.idxe', '=', 'xe.idxe')
            ->where('idchuyenxe', $id)
            ->first();
        $tongve = DB::table('ve')
            ->join('chuyenxe', 'chuyenxe.idchuyenxe', '=', 've.idchuyenxe')
            ->where('ve.idchuyenxe', $id)
            ->sum('soluong');
        $soghe = $thongtinchuyen->soghe - $tongve;
        if (session()->has('data')) {
            $taikhoan = DB::table('users')->where('tentaikhoan', session('data')['tentaikhoan'])->first();
            return view('page.datve', compact('thongtinchuyen', 'tongve', 'soghe', 'taikhoan'));
        }
        return view('page.datve', compact('thongtinchuyen', 'tongve', 'soghe'));
    }

    public function postDatve(Request $req, $id)
    {
        $data   = $req->all();
        $random = Str::random(4);
        $this->validate($req,
            [
                'cmnd'     => 'required|numeric|not_regex:/^\d{10,11}$/|regex:/^\d{9,12}$/',
                // 'cmnd'=>'digits:12',
                'hoten'    => 'required|min:5|max:35',
                'gioitinh' => 'required',
                'sdt'      => 'required|size:10|regex:/(0)[0-9]{9}/', // bắt đầu là số 0 chỉ dx từ 0-9 ,kèm theo 9 số phía sau
                'soluong'  => 'numeric',
            ],
            [
                'cmnd.required'   => 'Bạn chưa nhập chứng minh nhân dân',
                'cmnd.not_regex'  => 'Chứng minh nhân dân và thẻ căn cước chỉ 9 và 12 số',
                'cmnd.regex'      => 'Chứng minh nhân dân và thẻ căn cước chỉ 9 và 12 số',
                'cmnd.numeric'    => 'Chứng minh nhân dân và thẻ căn cước chỉ được số',
                'hoten.required'  => 'Bạn chưa nhập họ tên người đặt vé',
                'hoten.min'       => 'Tên người đặt vé ít nhất 5 ký tự ',
                'hoten.max'       => 'Tên người đặt vé nhiều nhất 35 ký tự',
                'sdt.required'    => 'Bạn chưa nhập số điện thoại ',
                'sdt.numeric'     => 'Số điện thoại chỉ chứa số',
                'sdt.regex'       => 'Số điện thoại phải bắt đầu từ số 0 và quy định bởi 10 số',
                //'sdt.phone_number'=>'Đây thực sự là số điện thoại',
                'sdt.size'        => 'Độ dài của điện thoại chỉ được 10 số',
                'soluong.numeric' => 'Quý khách vui lòng thêm vé',
            ]);
        $chuyenxe       = ChuyenXe::find($id);
        $thongtinchuyen = DB::table('chuyenxe')
            ->join('tuyenxe', 'chuyenxe.idtuyenxe', '=', 'tuyenxe.idtuyenxe')
            ->where('idchuyenxe', $id)
            ->first();
        $thongtinve             = new Ve;
        $thongtinve->idve       = $req->cmnd . $random;
        $thongtinve->soluong    = $req->soluong;
        $thongtinve->hoten      = $req->hoten;
        $thongtinve->gioitinh   = $req->gioitinh;
        $thongtinve->cmnd       = $req->cmnd;
        $thongtinve->sdt        = $req->sdt;
        $thongtinve->tongtien   = $thongtinve->soluong * $thongtinchuyen->dongia;
        $thongtinve->idchuyenxe = $id;
        $thongtinve->save();

        $data             = $req->all();
        $cmndnguoidis     = $data['cmndnguoidi'];
        $hotennguoidis    = $data['hotennguoidi'];
        $gioitinhnguoidis = $data['gioitinhnguoidi'];
        $sdtnguoidis      = $data['sdtnguoidi'];
        foreach ($cmndnguoidis as $k => $v) {
            $cmndnguoidi     = $v;
            $hotennguoidi    = $hotennguoidis[$k];
            $gioitinhnguoidi = $gioitinhnguoidis[$k];
            $sdtnguoidi      = $sdtnguoidis[$k];
            //save tai day
            $thongtinnguoidi                  = new NguoiDi;
            $thongtinnguoidi->cmndnguoidi     = $cmndnguoidi;
            $thongtinnguoidi->hotennguoidi    = $hotennguoidi;
            $thongtinnguoidi->gioitinhnguoidi = $gioitinhnguoidi;
            $thongtinnguoidi->sdtnguoidi      = $sdtnguoidi;
            $thongtinnguoidi->idve            = $thongtinve->idve;
            // $thongtinnguoidi->phonehidden = $sdtnguoidihidden;
            $thongtinnguoidi->save();
        }
        return redirect()->route('thongtinve', [$thongtinve->idve]);
    }

    public function HiddenPhone($number)
    {
        return substr($number, 0, 2) . '*****' . substr($number, -3);
    }

    public function getVe($id)
    {
        $ve = DB::table('ve')
            ->join("chuyenxe", "ve.idchuyenxe", "=", "chuyenxe.idchuyenxe")
            ->join("tuyenxe", "chuyenxe.idtuyenxe", "=", "tuyenxe.idtuyenxe")
            ->join("xe", "chuyenxe.idxe", "=", "xe.idxe")
            ->where('idve', $id)
            ->first();
        $ve->hiddensdt = $this->HiddenPhone($ve->sdt);
        $nguoidi       = DB::table('nguoidi')
            ->join("ve", "ve.idve", "=", "nguoidi.idve")
            ->where('ve.idve', $id)
            ->get();
        foreach ($nguoidi as $nguoi) {
            # code...
            $nguoi->hiddensdt = $this->HiddenPhone($nguoi->sdtnguoidi);
        }
        return view('page.thongtinve', compact('ve', 'nguoidi'));
    }

    public function postThanhtoan(Request $req, $id)
    {
        // $ve = table::('ve')->where('idve',$id)->update(array('trangthai' => '1'));
        $ve = Ve::where('idve', $id)->update(array('trangthai' => '1'));
        // $ve->save();
        $thongtinve = Ve::where('idve', $id)->first();
        return view('page.thanhtoan', compact('ve', 'thongtinve'));
    }

    public function getGioithieu()
    {
        return view('page.gioithieu');
    }

    public function xulyVe()
    {
        $timenow = Carbon::now('Asia/Ho_Chi_Minh')->hour;
        // $timenow->hour;
        echo $timenow;
    }

    public function Huyve($id)
    {
        $ve = Ve::where('idve', $id)->update(array('trangthai' => '2'));
        return redirect()->route('thongtinve', $id)->with('thongbao', 'Vé đã được hủy');
    }

}
