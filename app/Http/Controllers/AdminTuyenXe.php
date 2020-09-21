<?php

namespace App\Http\Controllers;

use App\TuyenXe;
use DB;
use Illuminate\Http\Request;

class AdminTuyenXe extends Controller
{
    //
    public function getTuyenxe()
    {
        $tuyenxe = DB::table('tuyenxe')->get();
        return view('admin.page.tuyenxe.danhsach', compact('tuyenxe'));
    }

    public function getThem()
    {
        $tuyenxe = DB::table('tuyenxe')->get();
        return view('admin.page.tuyenxe.them', $tuyenxe);
    }

    public function postThem(Request $req)
    {
        $this->validate($req,
            [
                'diemdi'  => 'required',
                'diemden' => 'required',
                'dongia'  => 'required|numeric',
                'hinhanh' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',

            ],
            [
                'diemdi.required'  => ' Bạn hãy nhập điểm đi',
                'diemden.required' => ' Bạn hãy nhập điểm đến',
                'dongia.required'  => ' Bạn hãy nhập đơn giá',
                'dongia.numeric'   => ' Đơn giá chỉ được số',
                'hinhanh.required' => 'Bạn chưa chọn hình ảnh',
                'hinhanh.mimes'    => 'Vui lòng chọn đúng định dạng hình ảnh:jpeg,png,jpg,gif,svg',

            ]);
        $tuyen = DB::table('tuyenxe')->get();
        foreach ($tuyen as $t) {
            $diemdi   = $req->diemdi;
            $diemden  = $req->diemden;
            $rangbuoc = DB::table('tuyenxe')->where('idtuyenxe', $t->idtuyenxe)->first();
            if ($diemdi == $rangbuoc->diemdi && $diemden == $rangbuoc->diemden) {
                return redirect('admin/tuyenxe/them')->with('thongbao', 'Đã có tuyến này không thể thêm nữa');
            }

        }
        $tuyenxe         = new TuyenXe();
        $tuyenxe->diemdi = $req->diemdi;
        if ($req->diemdi == $req->diemden) {
            return redirect('admin/tuyenxe/them')->with('thongbao', 'Bạn không được điểm đi và điểm đến trùng nhau');
        } else {
            $tuyenxe->diemdi  = $req->diemdi;
            $tuyenxe->diemden = $req->diemden;
            if ($req->hasFile('hinhanh')) // có tồn tại hình ảnh
            {
                // // File này có th?c, b?t d?u d?i tên và move
                // $fileExtension = $req->file('hinh')->getClientOriginalExtension(); // L?y . c?a file
                // // Filename c?c shock d? kh?i b? trùng
                // $fileName = time() . "_" . rand(0,9999999) . "_" . md5(rand(0,9999999)) . "." . $fileExtension;
                // Thu m?c upload
                $uploadPath = public_path('/images/anh'); // Thu m?c upload
                // B?t d?u chuy?n file vào thu m?c
                // $req->file('hinh')->move($uploadPath, $fileName);
                $req->file('hinhanh')->move($uploadPath, $req->file('hinhanh')->getClientOriginalName()); //đưa h.a vào thư mục
                // Thành công, show thành công
                // $req->file('hinh')->getClientOriginalName();
                // return redirect()->back()->with('thongbao', 'Upload files thành công!');
            } else {
                // Lỗi file
                return redirect()->back()->with('error', 'Upload files thất bại!');
            }
            $tuyenxe->hinhanh = $req->file('hinhanh')->getClientOriginalName();
            $tuyenxe->dongia  = $req->dongia;
            $tuyenxe->save();
            return redirect('admin/tuyenxe/danhsach')->with('thongbao', 'Thêm thành công');
        }
    }

    public function getSua($id)
    {
        $tuyenxe = DB::table('tuyenxe')->where('idtuyenxe', $id)->first();
        return view('admin.page.tuyenxe.sua', compact('tuyenxe'));
    }
    public function postSua(Request $req, $id)
    {
        $this->validate($req,
            [
                'diemdi'  => 'required',
                'diemden' => 'required',
                'hinhanh' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
                'dongia'  => 'required|numeric',

            ],
            [
                'diemdi.required'  => ' Bạn hãy nhập điểm đi',
                'diemden.required' => ' Bạn hãy nhập điểm đến',
                'hinhanh.required' => 'Bạn chưa chọn hình ảnh',
                'hinhanh.mimes'    => 'Vui lòng chọn đúng định dạng hình ảnh:jpeg,png,jpg,gif,svg',
                'dongia.required'  => ' Bạn hãy nhập đơn giá',
                'dongia.numeric'   => ' Đơn giá chỉ được số',

            ]);
        $tuyenxe          = TuyenXe::find($id);
        $tuyenxe->diemdi  = $req->diemdi;
        $tuyenxe->diemden = $req->diemden;
        if ($req->hasFile('hinhanh')) {
            // // File này có th?c, b?t d?u d?i tên và move
            // $fileExtension = $req->file('hinh')->getClientOriginalExtension(); // L?y . c?a file
            // // Filename c?c shock d? kh?i b? trùng
            // $fileName = time() . "_" . rand(0,9999999) . "_" . md5(rand(0,9999999)) . "." . $fileExtension;
            // Thu m?c upload
            $uploadPath = public_path('/images/anh'); // Thu m?c upload
            // B?t d?u chuy?n file vào thu m?c
            // $req->file('hinh')->move($uploadPath, $fileName);
            $req->file('hinhanh')->move($uploadPath, $req->file('hinhanh')->getClientOriginalName());
            // Thành công, show thành công
            // $req->file('hinh')->getClientOriginalName();
            // return redirect()->back()->with('thongbao', 'Upload files thành công!');
            $tuyenxe->hinhanh = $req->file('hinhanh')->getClientOriginalName(); //lưu hình ảnh mình chọn mới
        } else {
            $tuyenxe->hinhanh = $req->hinhanh2; //luu hình ảnh củ
        }
        $tuyenxe->dongia = $req->dongia;
        $tuyenxe->save();
        return redirect('admin/tuyenxe/danhsach')->with('thongbao', 'Sửa thành công');
    }

    public function getXoa($id)
    {
        $chuyen = DB::table('chuyenxe')->select('idtuyenxe')->where('idtuyenxe', $id)->first();
        $tuyen  = DB::table('tuyenxe')->select('idtuyenxe')->where('idtuyenxe', $id)->first();
        if ($tuyen == $chuyen) {
            return redirect('admin/tuyenxe/danhsach')->with('thongbao', 'Xóa thất bại,vui lòng xóa chuyến xe trước khi xóa tuyến xe');
        } else {
            $tuyenxe = DB::table('tuyenxe')->where('idtuyenxe', $id)->delete();
            return redirect('admin/tuyenxe/danhsach')->with('thongbao', 'Xóa thành công');
        }
    }
}
