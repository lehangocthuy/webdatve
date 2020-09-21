<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('test','PageController@test');
Route::post('test','PageController@postTest');

Route::get('/','PageController@getIndex')->name('index');
Route::get('tuyenxe/{idtuyenxe}','PageController@getChuyenxe');
Route::get('dangky','PageController@getDangky')->name('dangky');
Route::post('dangky','PageController@postDangky');
Route::get('dangnhap','PageController@getDangnhap')->name('dangnhap');
Route::post('dangnhap','PageController@postDangnhap');
Route::get('logout','PageController@postLogout');
Route::get('doimatkhauKH/{id}','PageController@getDoimatkhau');
Route::post('doimatkhauKH/{id}','PageController@postDoimatkhau')->name('doimatkhauKH');
Route::get('suathongtincanhan/{id}','PageController@getSuaThongtincanhan');
Route::post('suathongtincanhan/{id}','PageController@postSuaThongtincanhan')->name('suathongtincanhan');
Route::get('chitietchuyen/{idtuyenxe}/{idchuyenxe}/{idxe}','PageController@getChitiet');
Route::get('search','PageController@getSearch');
Route::get('datve/{idchuyenxe}','PageController@getDatve');
Route::post('datve/{idchuyenxe}','PageController@postDatve');
Route::get('thongtinve/{idve}','PageController@getVe')->name('thongtinve');
Route::get('huyve/{idve}','PageController@Huyve')->name('huyve');
Route::get('searchtimve','PageController@getSearchtimve');
Route::post('thanhtoan/{idve}','PageController@postThanhtoan');
Route::get('gioithieu','PageController@getGioithieu');

Route::get('xulyve','PageController@xulyVe');
// View Admin

Route::get('admin','AdminUsers@getLogin');
Route::post('admin','AdminUsers@postLogin');
Route::get('admin/logout','AdminUsers@getLogout');

Route::group(['prefix'=>'admin','middleware'=>'baomat'],function(){

		Route::get('noidung','AdminController@getAdmin');
		Route::get('tongquat','AdminController@getTongquat');

		Route::group(['prefix'=>'thongke'],function(){
			Route::get('lichtrinh','AdminThongKe@getLichtrinh');
			Route::post('lichtrinh','AdminThongKe@postLichtrinh');
			Route::get('doanhthu','AdminThongKe@getDoanhthu');
			Route::post('doanhthu','AdminThongKe@postDoanhthu');
		});

		Route::group(['prefix'=>'tuyenxe'],function(){
			Route::get('danhsach','AdminTuyenXe@getTuyenxe');
			Route::get('them','AdminTuyenXe@getThem');
			Route::post('them','AdminTuyenXe@postThem');
			Route::get('xoa/{idtuyenxe}','AdminTuyenXe@getXoa');
			Route::get('sua/{idtuyenxe}','AdminTuyenXe@getSua');
			Route::post('sua/{idtuyenxe}','AdminTuyenXe@postSua');
		});
		
		
		Route::group(['prefix'=>'chuyenxe'],function(){
			Route::get('danhsach','AdminChuyenXe@getChuyenxe');
			Route::get('them','AdminChuyenXe@getThem');
			Route::post('them','AdminChuyenXe@postThem');
			Route::get('xoa/{id}','AdminChuyenXe@getXoa');
			Route::get('sua/{idchuyenxe}','AdminChuyenXe@getSua');
			Route::post('sua/{idchuyenxe}','AdminChuyenXe@postSua')->name('admin/chuyenxe/sua');
		});
		
		Route::group(['prefix'=>'xe'],function(){
			Route::get('danhsach','AdminXe@getXe');
			Route::get('them','AdminXe@getThem');
			Route::post('them','AdminXe@postThem');
			Route::get('xoa/{id}','AdminXe@getXoa');
			Route::get('sua/{idxe}','AdminXe@getSua');
			Route::post('sua/{idxe}','AdminXe@postSua');
		});
		
		Route::group(['prefix'=>'phieuve'],function(){
			Route::get('danhsach','AdminPhieuVe@getPhieuVe');
			Route::get('danhsachve/{id}','AdminPhieuVe@getVeTheoPhieu');
			Route::get('them','AdminPhieuVe@getThem');
			Route::post('them','AdminPhieuVe@postThem');
			Route::get('xoa/{id}','AdminPhieuVe@getXoa');
			Route::get('sua/{idnguoidi}','AdminPhieuVe@getSua');
			Route::post('sua/{idnguoidi}','AdminPhieuVe@postSua');

		});

		Route::group(['prefix'=>'ve'],function(){
			Route::get('danhsach','AdminVe@getNguoidi');
			Route::get('them','AdminVe@getThem');
			Route::post('them','AdminVe@postThem');
			Route::get('xoa/{id}','AdminVe@getXoa');
			Route::get('sua/{id}','AdminVe@getSua');
			Route::post('sua/{id}','AdminVe@postSua');

		});


		Route::group(['prefix'=>'users'],function(){
			Route::get('danhsach','AdminUsers@getUsers');
			Route::get('cam/{id}','AdminUsers@getCam');
			Route::post('cam/{id}','AdminUsers@postCam');
			Route::get('danhsachadmin','AdminUsers@getAdmin');
			Route::get('them','AdminUsers@getThem');
			Route::post('them','AdminUsers@postThem');
			Route::get('themadmin','AdminUsers@getThemAdmin');
			Route::post('themadmin','AdminUsers@postThemAdmin');
			
			Route::get('xoa/{id}','AdminUsers@getXoaAdmin');
			Route::get('sua/{idtk}','AdminUsers@getSua');
			Route::post('sua/{idtk}','AdminUsers@postSua');
			Route::get('suaadmin/{idtk}','AdminUsers@getSuaAdmin');
			Route::post('suaadmin/{idtk}','AdminUsers@postSuaAdmin');
			Route::get('doimatkhau/{idtk}','AdminUsers@getDoimk');
			Route::post('doimatkhau/{idtk}','AdminUsers@postDoimk');
			Route::get('doimatkhauadmin/{idtk}','AdminUsers@getDoimkAdmin');
			Route::post('doimatkhauadmin/{idtk}','AdminUsers@postDoimkAdmin');

		});

		
	
});



	
		







