<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;

class AdminThongKe extends Controller
{
    //
    public function getLichtrinh()
    {
        $danhsach = DB::table('chuyenxe')
            ->join("tuyenxe", "tuyenxe.idtuyenxe", "=", "chuyenxe.idtuyenxe")
            ->get();
        $stt = 0;
        foreach ($danhsach as $ds) {
            $stt     = $stt + 1;
            $ds->stt = $stt;
        }
        $thongke = DB::table('chuyenxe')->count();
        return view('admin.page.thongke.lichtrinh', compact('danhsach', 'thongke'));
    }

    public function postLichtrinh(Request $req)
    {

        $locngay  = $req->locngay;
        $tosub    = substr($locngay, -10);
        $to       = substr($tosub, -4) . '-' . substr($tosub, 3, 2) . '-' . substr($tosub, 0, 2);
        $fromsub  = substr($locngay, 0, 10);
        $from     = substr($fromsub, -4) . '-' . substr($fromsub, 3, 2) . '-' . substr($fromsub, 0, 2);
        $chuyenxe = DB::table('chuyenxe')
            ->join('tuyenxe', 'chuyenxe.idtuyenxe', '=', 'tuyenxe.idtuyenxe')
            ->whereBetween('ngaydi', [$from, $to])
            ->get();
        $stt = 0;
        foreach ($chuyenxe as $ds) {
            $stt     = $stt + 1;
            $ds->stt = $stt;
        }
        $tongchuyen = DB::table('chuyenxe')->whereBetween('ngaydi', [$from, $to])
            ->count();
        return view('admin.page.thongke.lichtrinh-theongay', compact('chuyenxe', 'tongchuyen', 'fromsub', 'tosub', 'locngay'));
    }
    public function getDoanhThu()
    {
        $ve = DB::table('nguoidi')
            ->join('ve', 'nguoidi.idve', '=', 've.idve')
            ->join('chuyenxe', 've.idchuyenxe', '=', 'chuyenxe.idchuyenxe')
            ->join('tuyenxe', 'chuyenxe.idtuyenxe', '=', 'tuyenxe.idtuyenxe')
            ->join('xe', 'chuyenxe.idxe', '=', 'xe.idxe')
            ->get();
        $doanhthu = DB::table('ve')->where('trangthai', 1)->sum('tongtien');
        $stt      = 0;
        foreach ($ve as $ds) {
            $ngaylapve = DB::table('ve')
                ->where('idve', $ds->idve)
                ->first();
            $sub           = substr($ngaylapve->created_at, 0, 10);
            $format        = substr($sub, 8, 2) . '-' . substr($sub, 5, 2) . '-' . substr($sub, 0, 4);
            $ds->ngaylapve = $ngaylapve->created_at;
            $stt           = $stt + 1;
            $ds->stt       = $stt;
        }
        return view('admin.page.thongke.doanhthu', compact('ve', 'doanhthu'));
    }

    public function postDoanhThu(Request $req)
    {
        $stt     = 0;
        $locngay = $req->locngay;
        $tosub   = substr($locngay, -10);
        $to      = substr($tosub, -4) . '-' . substr($tosub, 3, 2) . '-' . substr($tosub, 0, 2);
        $fromsub = substr($locngay, 0, 10);
        $from    = substr($fromsub, -4) . '-' . substr($fromsub, 3, 2) . '-' . substr($fromsub, 0, 2);
        $ve      = DB::table('nguoidi')
            ->join('ve', 'nguoidi.idve', '=', 've.idve')
            ->join('chuyenxe', 've.idchuyenxe', '=', 'chuyenxe.idchuyenxe')
            ->join('tuyenxe', 'chuyenxe.idtuyenxe', '=', 'tuyenxe.idtuyenxe')
            ->join('xe', 'chuyenxe.idxe', '=', 'xe.idxe')
            ->where('ve.trangthai', 1)
            ->whereBetween(DB::raw('DATE(ve.created_at)'), array($from, $to))
            ->get();
        $doanhthu = DB::table('ve')->whereBetween(DB::raw('DATE(created_at)'), array($from, $to))->sum('tongtien');
        foreach ($ve as $ds) {
            $ngaylapve = DB::table('ve')
                ->where('idve', $ds->idve)
                ->where('trangthai', 1)
                ->first();
            $sub           = substr($ngaylapve->created_at, 0, 10);
            $format        = substr($sub, 8, 2) . '-' . substr($sub, 5, 2) . '-' . substr($sub, 0, 4);
            $ds->ngaylapve = $format;
            $stt           = $stt + 1;
            $ds->stt       = $stt;
        }
        return view('admin.page.thongke.doanhthu-theongay', compact('ve', 'doanhthu', 'from', 'to', 'locngay'));
    }
}
