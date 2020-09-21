<?php

namespace App\Http\Controllers;

use App\Xe;
use DB;
use Illuminate\Http\Request;

class AdminXe extends Controller
{
    //
    public function getXe()
    {
        $xe = DB::table('xe')->get();
        return view('admin.page.xe.danhsach', compact('xe'));
    }
    public function getThem()
    {
        $xe = DB::table('xe')->get();
        return view('admin.page.xe.them', compact('xe'));
    }

    public function postThem(Request $req)
    {
        $this->validate($req,
            [
                'bienso' => 'required|max:10',
                'soghe'  => 'required|numeric|max:52',
                'hinhxe' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],
            [
                'bienso.required' => ' Bạn hãy nhập biển số',
                'soghe.required'  => ' Bạn hãy nhập số ghế',
                'bienso.max'      => ' Biển số vượt mức quy định',

                'soghe.numeric'   => 'Số  ghế chỉ được số',
                'soghe.max'       => ' Số ghế vượt mức',
                'hinhxe.required' => 'Bạn chưa chọn hình xe',
                'hinhxe.mimes'    => 'Vui lòng chọn đúng định dạng hình ảnh:jpeg,png,jpg,gif,svg',
            ]);
        $xe         = new xe();
        $xe->bienso = $req->bienso;
        $xe->soghe  = $req->soghe;
        $xe->loaixe = $req->loaixe;
        if ($req->hasFile('hinhxe')) {
            // // File này có th?c, b?t d?u d?i tên và move
            // $fileExtension = $req->file('hinh')->getClientOriginalExtension(); // L?y . c?a file
            // // Filename c?c shock d? kh?i b? trùng
            // $fileName = time() . "_" . rand(0,9999999) . "_" . md5(rand(0,9999999)) . "." . $fileExtension;
            // Thu m?c upload
            $uploadPath = public_path('/images/anhxe'); // Thu m?c upload
            // B?t d?u chuy?n file vào thu m?c
            // $req->file('hinh')->move($uploadPath, $fileName);
            $req->file('hinhxe')->move($uploadPath, $req->file('hinhxe')->getClientOriginalName());
            // Thành công, show thành công
            // $req->file('hinh')->getClientOriginalName();
            // return redirect()->back()->with('thongbao', 'Upload files thành công!');
        } else {
            // Lỗi file
            return redirect()->back()->with('error', 'Upload files thất bại!');
        }
        $xe->hinhxe = $req->file('hinhxe')->getClientOriginalName();
        $xe->save();
        return redirect('admin/xe/danhsach')->with('thongbao', 'Thêm thành công');
    }

    public function getSua($id)
    {
        $xe = DB::table('xe')
            ->where('idxe', $id)->first();
        return view('admin.page.xe.sua', compact('xe'));
    }

    public function postSua(Request $req, $id)
    {
        $this->validate($req,
            [
                'bienso' => 'required|max:10',
                'soghe'  => 'required|numeric|max:52',
                'hinhxe' => 'mimes:jpeg,png,jpg,gif,svg|max:2048',
            ],
            [
                'bienso.required' => ' Bạn chưa nhập biển số',
                'soghe.required'  => ' Bạn chưa nhập số ghế',
                'bienso.max'      => ' Biển số vượt mức quy định',
                // 'bienso.alpha'=>' HIHI',
                'soghe.numeric'   => 'Số ghế chỉ được số',
                'soghe.max'       => ' Số ghế vượt mức',
                'hinhxe.required' => 'Bạn chưa chọn hình xe',
                'hinhxe.mimes'    => 'Vui lòng chọn đúng định dạng hình ảnh:jpeg,png,jpg,gif,svg',
            ]);
        $xe         = Xe::find($id);
        $xe->bienso = $req->bienso;
        $xe->soghe  = $req->soghe;
        $xe->loaixe = $req->loaixe;
        if ($req->hasFile('hinhxe')) {
            // // File này có th?c, b?t d?u d?i tên và move
            // $fileExtension = $req->file('hinh')->getClientOriginalExtension(); // L?y . c?a file
            // // Filename c?c shock d? kh?i b? trùng
            // $fileName = time() . "_" . rand(0,9999999) . "_" . md5(rand(0,9999999)) . "." . $fileExtension;
            // Thu m?c upload
            $uploadPath = public_path('/images/anhxe'); // Thu m?c upload
            // B?t d?u chuy?n file vào thu m?c
            // $req->file('hinh')->move($uploadPath, $fileName);
            $req->file('hinhxe')->move($uploadPath, $req->file('hinhxe')->getClientOriginalName());
            // Thành công, show thành công
            // $req->file('hinh')->getClientOriginalName();
            // return redirect()->back()->with('thongbao', 'Upload files thành công!');
            $xe->hinhxe = $req->file('hinhxe')->getClientOriginalName();
        } else {
            // Lỗi file
            $xe->hinhxe = $req->hinhxe2;
        }
        $xe->save();
        return redirect('admin/xe/danhsach')->with('thongbao', 'Sửa thành công');
    }

    public function getXoa($id)
    {
        $chuyen = DB::table('chuyenxe')->select('idxe')->where('idxe', $id)->first();
        $x      = DB::table('xe')->select('idxe')->where('idxe', $id)->first();
        if ($chuyen == $x) {
            return redirect('admin/xe/danhsach')->with('thongbao', 'Xóa thất bại,vui lòng xóa chuyến xe trước khi xóa xe');
        } else {
            $xe = DB::table('xe')->where('idxe', $id)->delete();
            return redirect('admin/xe/danhsach')->with('thongbao', 'Xóa thành công');
        }
    }
}
