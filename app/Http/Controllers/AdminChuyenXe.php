<?php

namespace App\Http\Controllers;

use App\ChuyenXe;
use DB;
use Illuminate\Http\Request;

class AdminChuyenXe extends Controller
{
    //
    public function getChuyenxe()
    {
        $chuyenxe = DB::table('chuyenxe')->get();
        $stt      = 0;
        foreach ($chuyenxe as $chuyen) {
            $stt         = $stt + 1;
            $chuyen->stt = $stt;
        }
        return view('admin.page.chuyenxe.danhsach', compact('chuyenxe'));
    }
    public function getThem()
    {
        $chuyenxe = DB::table('chuyenxe')->get();
        $tuyenxe  = DB::table('tuyenxe')->get();
        foreach ($chuyenxe as $chuyen) {
            $data[] = $chuyen->idxe;
        }
        $xe = DB::table('xe')
            ->whereNotIn('idxe', $data)
            ->get();
        return view('admin.page.chuyenxe.them', compact('chuyenxe', 'tuyenxe', 'xe'));
    }
    public function postThem(Request $req)
    {
        $chuyen = DB::table('chuyenxe')->get();
        $ngaydi = date('Y-m-d', strtotime($req->ngaydi));
        $this->validate($req,
            [
                'giodi'   => 'required|regex:/[0-9]/',
                'gioden'  => 'required|regex:/[0-9]/',
                'ngaydi'  => 'required',
                'ngayden' => 'required',

            ],
            [
                'giodi.required'   => 'Bạn chưa nhập giờ đi',
                'giodi.regex'      => 'Giờ đi không được nhập chữ',
                'gioden.required'  => 'Bạn chưa nhập giờ đến',
                'gioden.regex'     => 'Giờ đến không được nhập chữ',
                'ngaydi.required'  => 'Bạn chưa chọn ngày đi',
                'ngayden.required' => 'Bạn chưa chọn ngày đến',

            ]);
        foreach ($chuyen as $c) {
            $giodisql  = substr($c->giodi, 0, 5);
            $giodensql = substr($c->gioden, 0, 5);
            if ($ngaydi == $c->ngaydi) {
                if ($req->giodi == $giodisql || $req->gioden == $giodensql || $req->giodi == $c->giodi || $req->gioden == $c->gioden) {
                    return redirect()->back()->with('thongbao', 'Thêm thất bại, giờ đi hoặc giờ đến không thể trùng trong một ngày của chuyến');
                }

            }
        }
        $chuyenxe = new ChuyenXe();
        if ($req->giodi == $req->gioden) {
            return redirect('admin/chuyenxe/them')->with('thongbao', 'Bạn không được nhập giờ đi và giờ đến trùng nhau');
        } else {
            $chuyenxe->giodi     = $req->giodi;
            $chuyenxe->gioden    = $req->gioden;
            $chuyenxe->ngaydi    = $req->ngaydi;
            $chuyenxe->ngayden   = $req->ngayden;
            $chuyenxe->idtuyenxe = $req->idtuyenxe;
            $chuyenxe->idxe      = $req->idxe;
            $chuyenxe->save();
            return redirect('admin/chuyenxe/danhsach')->with('thongbao', 'Thêm thành công');
        }
    }

    public function getSua($id)
    {
        $chuyenxe = DB::table('chuyenxe')
            ->join('tuyenxe', 'chuyenxe.idtuyenxe', '=', 'tuyenxe.idtuyenxe')
            ->join('xe', 'chuyenxe.idxe', '=', 'xe.idxe')
            ->where('idchuyenxe', $id)->first();
        $layxe   = DB::table('chuyenxe')->get();
        $tuyenxe = DB::table('tuyenxe')->get();
        foreach ($layxe as $chuyen) {
            $data[] = $chuyen->idxe;
        }
        $xe = DB::table('xe')
            ->whereNotIn('idxe', $data)
            ->get();
        return view('admin.page.chuyenxe.sua', compact('chuyenxe', 'tuyenxe', 'xe'));
    }

    public function postSua(Request $req, $id)
    {
        $chuyen = DB::table('chuyenxe')->get();
        $ngaydi = date('Y-m-d', strtotime($req->ngaydi));
        $this->validate($req,
            [
                'giodi'   => 'required|regex:/[0-9]/',
                'gioden'  => 'required|regex:/[0-9]/',
                'ngaydi'  => 'required',
                'ngayden' => 'required',

            ],
            [
                'giodi.required'   => 'Bạn chưa nhập giờ đi',
                'giodi.regex'      => 'Giờ đi không được nhập chữ',
                'gioden.required'  => 'Bạn chưa nhập giờ đến',
                'gioden.regex'     => 'Giờ đến không được nhập chữ',
                'ngaydi.required'  => 'Bạn chưa chọn ngày đi',
                'ngayden.required' => 'Bạn chưa chọn ngày đến',

            ]);
        $chuyenxe            = ChuyenXe::find($id);
        $chuyenxe->giodi     = $req->giodi;
        $chuyenxe->gioden    = $req->gioden;
        $chuyenxe->ngaydi    = $req->ngaydi;
        $chuyenxe->ngayden   = $req->ngayden;
        $chuyenxe->idtuyenxe = $req->idtuyenxe;
        $chuyenxe->idxe      = $req->idxe;
        $chuyenxe->save();
        return redirect('admin/chuyenxe/danhsach')->with('thongbao', 'Sửa thành công');
    }

    public function getXoa($id)
    {
        $chuyen = DB::table('chuyenxe')->select('idchuyenxe')->where('idchuyenxe', $id)->first();
        $ve     = DB::table('ve')->select('idchuyenxe')->where('idchuyenxe', $id)->first();
        if ($chuyen == $ve) {
            return redirect('admin/chuyenxe/danhsach')->with('thongbao', 'Xóa thất bại,chuyến xe này đã có vé được đặt');
        } else {
            $chuyen = DB::table('chuyenxe')->where('idchuyenxe', $id)->delete();
            return redirect('admin/chuyenxe/danhsach')->with('thongbao', 'Xóa thành công');
        }
    }

}
