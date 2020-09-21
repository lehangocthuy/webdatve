<?php

namespace App\Http\Controllers;

use DB;

class AdminController extends Controller
{
    //
    public function getAdmin()
    {
        $tuyenxe  = DB::table('tuyenxe')->count();
        $chuyenxe = DB::table('chuyenxe')->count();
        $xe       = DB::table('xe')->count();
        $ve       = DB::table('nguoidi')->count();
        $users    = DB::table('users')->where('level', 0)->OrWhere('level', null)->count();
        $doanhthu = DB::table('ve')->where('trangthai', 1)->sum('tongtien');
        $vecho    = DB::table('ve')
            ->where('trangthai', null)->sum('soluong');
        $vethanhtoan = DB::table('ve')
            ->where('trangthai', 1)->sum('soluong');
        $vedahuy = DB::table('ve')
            ->where('trangthai', 2)->sum('soluong');

        //Biểu đồ
        $range          = \Carbon\Carbon::now()->year;
        $var1           = '01';
        $var2           = '02';
        $var3           = '03';
        $var4           = '04';
        $var5           = '05';
        $var6           = '06';
        $var7           = '07';
        $var8           = '08';
        $var9           = '09';
        $var10          = '10';
        $var11          = '11';
        $var12          = '12';
        $doanhthuthang1 = DB::table('ve')->where(DB::raw('month(created_at)'), '=', $var1)
            ->where('trangthai', 1)
            ->sum('soluong');
        $doanhthuthang2 = DB::table('ve')->where(DB::raw('month(created_at)'), '=', $var2)
            ->where('trangthai', 1)
            ->sum('soluong');
        $doanhthuthang3 = DB::table('ve')->where(DB::raw('month(created_at)'), '=', $var3)
            ->where('trangthai', 1)
            ->sum('soluong');
        $doanhthuthang4 = DB::table('ve')->where(DB::raw('month(created_at)'), '=', $var4)
            ->where('trangthai', 1)
            ->sum('soluong');
        $doanhthuthang5 = DB::table('ve')->where(DB::raw('month(created_at)'), '=', $var5)
            ->where('trangthai', 1)
            ->sum('soluong');
        $doanhthuthang6 = DB::table('ve')->where(DB::raw('month(created_at)'), '=', $var6)
            ->where('trangthai', 1)
            ->sum('soluong');
        $doanhthuthang7 = DB::table('ve')->where(DB::raw('month(created_at)'), '=', $var7)
            ->where('trangthai', 1)
            ->sum('soluong');
        $doanhthuthang8 = DB::table('ve')->where(DB::raw('month(created_at)'), '=', $var8)
            ->where('trangthai', 1)
            ->sum('soluong');
        $doanhthuthang9 = DB::table('ve')->where(DB::raw('month(created_at)'), '=', $var9)
            ->where('trangthai', 1)
            ->sum('soluong');
        $doanhthuthang10 = DB::table('ve')->where(DB::raw('month(created_at)'), '=', $var10)
            ->where('trangthai', 1)
            ->sum('soluong');
        $doanhthuthang11 = DB::table('ve')->where(DB::raw('month(created_at)'), '=', $var11)
            ->where('trangthai', 1)
            ->sum('soluong');
        $doanhthuthang12 = DB::table('ve')->where(DB::raw('month(created_at)'), '=', $var12)
            ->where('trangthai', 1)
            ->sum('soluong');
        $data[] = $doanhthuthang1;
        $data[] = $doanhthuthang2;
        $data[] = $doanhthuthang3;
        $data[] = $doanhthuthang4;
        $data[] = $doanhthuthang5;
        $data[] = $doanhthuthang6;
        $data[] = $doanhthuthang7;
        $data[] = $doanhthuthang8;
        $data[] = $doanhthuthang9;
        $data[] = $doanhthuthang10;
        $data[] = $doanhthuthang11;
        $data[] = $doanhthuthang12;

        $vehuy1 = DB::table('ve')->where(DB::raw('month(created_at)'), '=', $var1)
            ->where('trangthai', 2)
            ->sum('soluong');
        $vehuy2 = DB::table('ve')->where(DB::raw('month(created_at)'), '=', $var2)
            ->where('trangthai', 2)
            ->sum('soluong');
        $vehuy3 = DB::table('ve')->where(DB::raw('month(created_at)'), '=', $var3)
            ->where('trangthai', 2)
            ->sum('soluong');
        $vehuy4 = DB::table('ve')->where(DB::raw('month(created_at)'), '=', $var4)
            ->where('trangthai', 2)
            ->sum('soluong');
        $vehuy5 = DB::table('ve')->where(DB::raw('month(created_at)'), '=', $var5)
            ->where('trangthai', 2)
            ->sum('soluong');
        $vehuy6 = DB::table('ve')->where(DB::raw('month(created_at)'), '=', $var6)
            ->where('trangthai', 2)
            ->sum('soluong');
        $vehuy7 = DB::table('ve')->where(DB::raw('month(created_at)'), '=', $var7)
            ->where('trangthai', 2)
            ->sum('soluong');
        $vehuy8 = DB::table('ve')->where(DB::raw('month(created_at)'), '=', $var8)
            ->where('trangthai', 2)
            ->sum('soluong');
        $vehuy9 = DB::table('ve')->where(DB::raw('month(created_at)'), '=', $var9)
            ->where('trangthai', 2)
            ->sum('soluong');
        $vehuy10 = DB::table('ve')->where(DB::raw('month(created_at)'), '=', $var10)
            ->where('trangthai', 2)
            ->sum('soluong');
        $vehuy11 = DB::table('ve')->where(DB::raw('month(created_at)'), '=', $var11)
            ->where('trangthai', 2)
            ->sum('soluong');
        $vehuy12 = DB::table('ve')->where(DB::raw('month(created_at)'), '=', $var12)
            ->where('trangthai', 2)
            ->sum('soluong');
        $vehuy[] = $vehuy1;
        $vehuy[] = $vehuy2;
        $vehuy[] = $vehuy3;
        $vehuy[] = $vehuy4;
        $vehuy[] = $vehuy5;
        $vehuy[] = $vehuy6;
        $vehuy[] = $vehuy7;
        $vehuy[] = $vehuy8;
        $vehuy[] = $vehuy9;
        $vehuy[] = $vehuy10;
        $vehuy[] = $vehuy11;
        $vehuy[] = $vehuy12;
        return view('admin.page.noidung', compact('tuyenxe', 'chuyenxe', 'xe', 've', 'users', 'doanhthu', 'vecho', 'vethanhtoan', 'doanhthuthang8', 'data', 'vehuy', 'vedahuy'));
    }

    public function getTongquat()
    {
        return view('admin.page.tongquat');
    }

    public function getThongke()
    {
        return view('admin.page.thongke');
    }
}
