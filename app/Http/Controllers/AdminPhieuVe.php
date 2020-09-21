<?php

namespace App\Http\Controllers;

use App\Ve;
use DB;
use Illuminate\Http\Request;

class AdminPhieuVe extends Controller
{
    //
    public function getPhieuVe()
    {
        $PhieuVe = DB::table('chuyenxe')
            ->join('ve', 'chuyenxe.idchuyenxe', '=', 've.idchuyenxe')
            ->join('tuyenxe', 'chuyenxe.idtuyenxe', '=', 'tuyenxe.idtuyenxe')
            ->get();
        $stt = 0;
        foreach ($PhieuVe as $phieu) {
            $stt        = $stt + 1;
            $phieu->stt = $stt;
        }
        return view('admin.page.phieudatve.dsphieu.danhsach', compact('PhieuVe'));
    }

    public function getVeTheoPhieu($id)
    {
        $PhieuVe = DB::table('nguoidi')
            ->where('idve', $id)
            ->get();
        $stt = 0;
        foreach ($PhieuVe as $phieu) {
            $stt        = $stt + 1;
            $phieu->stt = $stt;
        }
        return view('admin.page.phieudatve.dsve.danhsachtheophieu', compact('PhieuVe'));
    }

    public function getThem()
    {
        $PhieuVe = DB::table('ve')->get();
        return view('admin.page.phieudatve.dsphieu.danhsach', compact('PhieuVe'));
    }

    public function postThem(Request $req)
    {
        $PhieuVe              = new PhieuVe();
        $PhieuVe->bienso      = $req->bienso;
        $PhieuVe->soghe       = $req->soghe;
        $PhieuVe->loaiPhieuVe = $req->loaiPhieuVe;
        $PhieuVe->hinhPhieuVe = $req->hinhPhieuVe;
        $PhieuVe->save();
        return redirect('admin/phieuve/danhsach')->with('thongbao', 'Thêm thành công');
    }

    public function getSua($id)
    {
        $PhieuVe = DB::table('ve')
            ->where('idPhieuVe', $id)->first();
        return view('admin.page.phieuve.sua', compact('PhieuVe'));
    }

    public function postSua(Request $req, $id)
    {
        $PhieuVe            = Ve::find($id);
        $PhieuVe->cmnd      = $req->cmnd;
        $PhieuVe->hoten     = $req->hoten;
        $PhieuVe->gioitinh  = $req->gioitinh;
        $PhieuVe->sdt       = $req->sdt;
        $PhieuVe->soluong   = $req->soluong;
        $PhieuVe->tongtien  = $req->tongtien;
        $PhieuVe->trangthai = $req->trangthai;
        $PhieuVe->save();
        return redirect('admin/phieuve/danhsach')->with('thongbao', 'Sửa thành công');
    }

    public function getXoa($id)
    {
        // $ve = DB::table('ve')->select('idve')->where('idve',$id)->first();
        // $nguoidi = DB::table('nguoidi')->select('idve')->where('idve',$id)->first();
        // if($ve == $nguoidi)
        //     return redirect('admin/phieuve/danhsach')->with('thongbao','Xóa thất bại,vui lòng xóa vé trước khi xóa phiếu đặt');
        // else{
        //    $PhieuVe = DB::table('ve')->where('idve',$id)->delete();
        //    return redirect('admin/phieuve/danhsach')->with('thongbao','Xóa thành công');
        //        }
        $ve = Ve::where('idve', $id)->update(array('trangthai' => '2'));
        return redirect('admin/phieuve/danhsach')->with('thongbao', 'Vé đã được hủy');
        //        }
    }
}
