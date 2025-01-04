<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\nat_LOAI_SAN_PHAMController;
use App\Http\Controllers\nat_SAN_PHAMController;
use App\Http\Controllers\nat_KHACH_HANGcontroller;
use App\Http\Controllers\nat_DANH_SACH_QUAN_TRIController;
use App\Http\Controllers\nat_HOA_DONController;
use App\Http\Controllers\nat_CT_HOA_DONController;
use App\Http\Controllers\nat_TIN_TUCController;
use App\Http\Controllers\nat_LOGIN_USERController;
use App\Http\Controllers\nat_SIGNUPController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/


// admins login --------------------------------------------------------------------------------------------------------------------------------------
use App\Http\Controllers\nat_QUAN_TRIController;
Route::get('/', [nat_QUAN_TRIController::class, 'natLogin'])->name('admins.natLogin');
Route::post('/', [nat_QUAN_TRIController::class, 'natLoginSubmit'])->name('admins.natLoginSubmit');


#admins - route--------------------------------------------------------------------------------------------------------------------------------------
route::get('/nat-admins',function(){
    return view('natAdmins.index');
});
#admins - danh muc--------------------------------------------------------------------------------------------------------------------------------------
Route::get('/nat-admins/natdanhsachquantri/natdanhmuc', [nat_DANH_SACH_QUAN_TRIController::class, 'danhmuc'])->name('natAdmins.natdanhsachquantri.danhmuc');
#admins - tin tức --------------------------------------------------------------------------------------------------------------------------------------
Route::get('/nat-admins/natdanhsachquantri/nattintuc', [nat_DANH_SACH_QUAN_TRIController::class, 'tintuc'])->name('natAdmins.natdanhsachquantri..danhmuc.tintuc');
// Sản phẩm--------------------------------------------------------------------------------------------------------------------------------------
Route::get('/nat-admins/natdanhsachquantri/natsanpham', [nat_DANH_SACH_QUAN_TRIController::class, 'sanpham'])->name('natAdmins.natdanhsachquantri.danhmuc.sanpham');
// Mô tả sản phẩm--------------------------------------------------------------------------------------------------------------------------------------
Route::get('/nat-admins/natdanhsachquantri/natmota/{id}', [nat_DANH_SACH_QUAN_TRIController::class, 'mota'])->name('natAdmins.natdanhsachquantri.danhmuc.mota');
#admins - nguoidung--------------------------------------------------------------------------------------------------------------------------------------
Route::get('/nat-admins/natdanhsachquantri/natnguoidung', [nat_DANH_SACH_QUAN_TRIController::class, 'nguoidung'])->name('natAdmins.natdanhsachquantri.nguoidung');

// loai san pham--------------------------------------------------------------------------------------------------------------------------------------
// list
Route::get('/nat-admins/nat-loai-san-pham',[nat_LOAI_SAN_PHAMController::class,'natList'])->name('natadmins.natloaisanpham');
//create
Route::get('/nat-admins/nat-loai-san-pham/nat-create',[nat_LOAI_SAN_PHAMController::class,'natCreate'])->name('natadmin.natloaisanpham.natcreate');
Route::post('/nat-admins/nat-loai-san-pham/nat-create',[nat_LOAI_SAN_PHAMController::class,'natCreateSunmit'])->name('natadmin.natloaisanpham.natCreateSunmit');
// edit
Route::get('/nat-admins/nat-loai-san-pham/nat-edit/{id}',[nat_LOAI_SAN_PHAMController::class,'natEdit'])->name('natadmin.natloaisanpham.natEdit');
Route::post('/nat-admins/nat-loai-san-pham/nat-edit',[nat_LOAI_SAN_PHAMController::class,'natEditSubmit'])->name('natadmin.natloaisanpham.natEditSubmit');
// detail
Route::get('/nat-admins/nat-loai-san-pham/nat-detail/{id}',[nat_LOAI_SAN_PHAMController::class,'natGetDetail'])->name('natadmin.natloaisanpham.natGetDetail');
// delete
Route::get('/nat-admins/nat-loai-san-pham/nat-delete/{id}',[nat_LOAI_SAN_PHAMController::class,'natDelete'])->name('natadmin.natloaisanpham.natDelete');

// san pham--------------------------------------------------------------------------------------------------------------------------------------
// search
Route::get('/nat-admins/nat-san-pham/search', [nat_SAN_PHAMController::class, 'searchAdmins'])->name('natuser.searchAdmins');
// list

Route::get('/nat-admins/nat-san-pham',[nat_SAN_PHAMController::class,'natList'])->name('natadims.natsanpham');
//create
Route::get('/nat-admins/nat-san-pham/nat-create',[nat_SAN_PHAMController::class,'natCreate'])->name('natadmin.natsanpham.natcreate');
Route::post('/nat-admins/nat-san-pham/nat-create',[nat_SAN_PHAMController::class,'natCreateSubmit'])->name('natadmin.natsanpham.natCreateSubmit');
//detail
Route::get('/nat-admins/nat-san-pham/nat-detail/{id}', [nat_SAN_PHAMController::class, 'natDetail'])->name('natadmin.natsanpham.natDetail');
// edit
Route::get('/nat-admins/nat-san-pham/nat-edit/{id}', [nat_SAN_PHAMController::class, 'natEdit'])->name('natadmin.natsanpham.natedit');

// Xử lý cập nhật sản phẩm
Route::post('/nat-admins/nat-san-pham/nat-edit/{id}', [nat_SAN_PHAMController::class, 'natEditSubmit'])->name('natadmin.natsanpham.natEditSubmit');
//delete
// Đảm bảo sử dụng phương thức POST để gọi route xóa sản phẩm
Route::get('/nat-admins/nat-san-pham/nat-delete/{id}', [nat_SAN_PHAMController::class, 'natdelete'])->name('natadmin.natsanpham.natdelete');


// khach hang--------------------------------------------------------------------------------------------------------------------------------------
// list
Route::get('/nat-admins/nat-khach-hang',[nat_KHACH_HANGcontroller::class,'natList'])->name('natadmins.natkhachhang');
//detail
Route::get('/nat-admins/nat-khach-hang/nat-detail/{id}', [nat_KHACH_HANGcontroller::class, 'natDetail'])->name('natadmin.natkhachhang.natDetail');
//create
Route::get('/nat-admins/nat-khach-hang/nat-create',[nat_KHACH_HANGcontroller::class,'natCreate'])->name('natadmin.natkhachhang.natcreate');
Route::post('/nat-admins/nat-khach-hang/nat-create',[nat_KHACH_HANGcontroller::class,'natCreateSubmit'])->name('natadmin.natkhachhang.natCreateSubmit');
//edit
Route::get('/nat-admins/nat-khach-hang/nat-edit/{id}', [nat_KHACH_HANGcontroller::class, 'natEdit'])->name('natadmin.natkhachhang.natedit');
Route::post('/nat-admins/nat-khach-hang/nat-edit/{id}', [nat_KHACH_HANGcontroller::class, 'natEditSubmit'])->name('natadmin.natkhachhang.natEditSubmit');
//delete
// Đảm bảo sử dụng phương thức POST để gọi route xóa sản phẩm
Route::get('/nat-admins/nat-khach-hang/nat-delete/{id}', [nat_KHACH_HANGcontroller::class, 'natDelete'])->name('natadmin.natkhachhang.natdelete');

// Hóa Đơn--------------------------------------------------------------------------------------------------------------------------------------
// list
Route::get('/nat-admins/nat-hoa-don',[nat_HOA_DONController::class,'natList'])->name('natadmins.nathoadon');
//detail
Route::get('/nat-admins/nat-hoa-don/nat-detail/{id}', [nat_HOA_DONController::class, 'natDetail'])->name('natadmin.nathoadon.natDetail');
//create
Route::get('/nat-admins/nat-hoa-don/nat-create',[nat_HOA_DONController::class,'natCreate'])->name('natadmin.nathoadon.natcreate');
Route::post('/nat-admins/nat-hoa-don/nat-create',[nat_HOA_DONController::class,'natCreateSubmit'])->name('natadmin.nathoadon.natCreateSubmit');
//edit
Route::get('/nat-admins/nat-hoa-don/nat-edit/{id}', [nat_HOA_DONController::class, 'natEdit'])->name('natadmin.nathoadon.natedit');
Route::post('/nat-admins/nat-hoa-don/nat-edit/{id}', [nat_HOA_DONController::class, 'natEditSubmit'])->name('natadmin.nathoadon.natEditSubmit');
//delete
// Đảm bảo sử dụng phương thức POST để gọi route xóa sản phẩm
Route::get('/nat-admins/nat-hoa-don/nat-delete/{id}', [nat_HOA_DONController::class, 'natDelete'])->name('natadmin.nathoadon.natdelete');


// Chi Tiết Hóa Đơn--------------------------------------------------------------------------------------------------------------------------------------
// list
Route::get('/nat-admins/nat-ct-hoa-don',[nat_CT_HOA_DONController::class,'natList'])->name('natadmins.natcthoadon');
//detail
Route::get('/nat-admins/nat-ct-hoa-don/nat-detail/{id}', [nat_CT_HOA_DONController::class, 'natDetail'])->name('natadmin.natcthoadon.natDetail');
//create
Route::get('/nat-admins/nat-ct-hoa-don/nat-create',[nat_CT_HOA_DONController::class,'natCreate'])->name('natadmin.natcthoadon.natcreate');
Route::post('/nat-admins/nat-ct-hoa-don/nat-create',[nat_CT_HOA_DONController::class,'natCreateSubmit'])->name('natadmin.natcthoadon.natCreateSubmit');
//edit
Route::get('/nat-admins/nat-ct-hoa-don/nat-edit/{id}', [nat_CT_HOA_DONController::class, 'natEdit'])->name('natadmin.natcthoadon.natedit');
Route::post('/nat-admins/nat-ct-hoa-don/nat-edit/{id}', [nat_CT_HOA_DONController::class, 'natEditSubmit'])->name('natadmin.natcthoadon.natEditSubmit');
//delete
// Đảm bảo sử dụng phương thức POST để gọi route xóa sản phẩm
Route::get('/nat-admins/nat-ct-hoa-don/nat-delete/{id}', [nat_CT_HOA_DONController::class, 'natDelete'])->name('natadmin.natcthoadon.natdelete');


// Quản trị Viên--------------------------------------------------------------------------------------------------------------------------------------
// list
Route::get('/nat-admins/nat-quan-tri',[nat_QUAN_TRIController::class,'natList'])->name('natadmins.natquantri');
//detail
Route::get('/nat-admins/nat-quan-tri/nat-detail/{id}', [nat_QUAN_TRIController::class, 'natDetail'])->name('natadmin.natquantri.natDetail');
//create
Route::get('/nat-admins/nat-quan-tri/nat-create',[nat_QUAN_TRIController::class,'natCreate'])->name('natadmin.natquantri.natcreate');
Route::post('/nat-admins/nat-quan-tri/nat-create',[nat_QUAN_TRIController::class,'natCreateSubmit'])->name('natadmin.natquantri.natCreateSubmit');
//edit
Route::get('/nat-admins/nat-quan-tri/nat-edit/{id}', [nat_QUAN_TRIController::class, 'natEdit'])->name('natadmin.natquantri.natedit');
Route::post('/nat-admins/nat-quan-tri/nat-edit/{id}', [nat_QUAN_TRIController::class, 'natEditSubmit'])->name('natadmin.natquantri.natEditSubmit');
//delete
// Đảm bảo sử dụng phương thức POST để gọi route xóa sản phẩm
Route::get('/nat-admins/nat-quan-tri/nat-delete/{id}', [nat_QUAN_TRIController::class, 'natDelete'])->name('natadmin.natquantri.natdelete');

// Tin Tức--------------------------------------------------------------------------------------------------------------------------------------
// list
Route::get('/nat-admins/nat-tin-tuc',[nat_TIN_TUCController::class,'natList'])->name('natadmins.nattintuc');
//detail
Route::get('/nat-admins/nat-tin-tuc/nat-detail/{id}', [nat_TIN_TUCController::class, 'natDetail'])->name('natadmin.nattintuc.natDetail');
//create
Route::get('/nat-admins/nat-tin-tuc/nat-create',[nat_TIN_TUCController::class,'natCreate'])->name('natadmin.nattintuc.natcreate');
Route::post('/nat-admins/nat-tin-tuc/nat-create',[nat_TIN_TUCController::class,'natCreateSubmit'])->name('natadmin.nattintuc.natCreateSubmit');
//edit
Route::get('/nat-admins/nat-tin-tuc/nat-edit/{id}', [nat_TIN_TUCController::class, 'natEdit'])->name('natadmin.nattintuc.natedit');
Route::post('/nat-admins/nat-tin-tuc/nat-edit/{id}', [nat_TIN_TUCController::class, 'natEditSubmit'])->name('natadmin.nattintuc.natEditSubmit');
//delete
// Đảm bảo sử dụng phương thức POST để gọi route xóa sản phẩm
Route::get('/nat-admins/nat-tin-tuc/nat-delete/{id}', [nat_TIN_TUCController::class, 'natDelete'])->name('natadmin.nattintuc.natdelete');














use App\Http\Controllers\HomeController;

// User - Routes
Route::get('/nat-user', [HomeController::class, 'index'])->name('natuser.home');
Route::get('/nat-user1', [HomeController::class, 'index1'])->name('natuser.home1');
// Hiển thị chi tiết sản phẩm
Route::get('/nat-user/show/{id}', [HomeController::class, 'show'])->name('natuser.show');
// search
Route::get('/search', [nat_SAN_PHAMController::class, 'search'])->name('natuser.search');
Route::get('/search1', [nat_SAN_PHAMController::class, 'search1'])->name('natuser.search1');

Route::get('/natuser/login', [nat_LOGIN_USERController::class, 'natLogin'])->name('natuser.login');
Route::post('/natuser/login', [nat_LOGIN_USERController::class, 'natLoginSubmit'])->name('natuser.natLoginSubmit');
Route::get('/natuser/logout', [nat_LOGIN_USERController::class, 'natLogout'])->name('natuser.logout');


// hỗ trợ 
route::get('/nat-user/support',function()
{
    return view('natuser.support');
});

// signup
Route::get('/nat-user/signup', [nat_SIGNUPController::class, 'natsignup'])->name('natuser.natsignup');
Route::post('/nat-user/signup', [nat_SIGNUPController::class, 'natsignupSubmit'])->name('natuser.natsignupSubmit');



// Route để hiển thị sản phẩm trong trang thanh toán
Route::get('/nat-user/thanhtoan/{product_id}', [nat_CT_HOA_DONController::class, 'natthanhtoan'])->name('natuser.natthanhtoan');

// Route để xử lý thanh toán
Route::post('/nat-user/thanhtoan', [nat_CT_HOA_DONController::class, 'storeThanhtoan'])->name('natuser.storeThanhtoan');
// create hóa đơn user


// tạo bảng hóa đơn
Route::get('san-pham/{sanPham}', [nat_CT_HOA_DONController::class, 'show'])->name('sanpham.show');
Route::post('mua-san-pham/{sanPham}', [nat_CT_HOA_DONController::class, 'store'])->name('hoadon.store');

// xem bảng Hóa Đơn mới Tạo
Route::get('hoa-don/{hoaDonId}/san-pham/{sanPhamId}', [nat_HOA_DONController::class, 'show'])->name('hoadon.show');



// tạo bảng chi tiết hóa đơn


// Route để tạo mới chi tiết hóa đơn
Route::get('/cthoadon/{hoaDonId}/{sanPhamId}', [nat_CT_HOA_DONController::class, 'create'])->name('cthoadon.create');

// Route để lưu chi tiết hóa đơn
Route::post('/cthoadon/store', [nat_CT_HOA_DONController::class, 'storecthoadon'])->name('cthoadon.storecthoadon');

// Route để hiển thị chi tiết hóa đơn
Route::get('/hoa-don-id/{hoaDonId}/san-pham-id/{sanPhamId}', [nat_CT_HOA_DONController::class, 'cthoadonshow'])->name('cthoadon.cthoadonshow');


// giỏ hàng
use App\Http\Controllers\CartController;

Route::post('/cart/add', [CartController::class, 'addToCart'])->name('cart.add');

// liên hệ (_menu) 
route::get('/natuser-lienhe',function(){
    return view('natuser.lienhe');
})->name('natuser.lienhe');
// giới thiệt (_menu) 
route::get('/natuser-gioithieu',function(){
    return view('natuser.gioithieu');
})->name('natuser.gioithieu');


// thông tin cá nhân
use App\Http\Controllers\nat_TTNHUOIDUNGController;
// Route hiển thị form chỉnh sửa thông tin khách hàng
Route::get('/nat-user/nat-edit/{id}', [nat_TTNHUOIDUNGController::class, 'natEdit'])->name('natuser.tt.natedit');
Route::post('/nat-user/nat-edit/{id}', [nat_TTNHUOIDUNGController::class, 'natEditSubmit'])->name('natuser.tt.natEditSubmit');