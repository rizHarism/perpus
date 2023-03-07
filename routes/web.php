<?php

use App\Http\Controllers\Auth\CheckAuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Binaan\AdministrasiController;
use App\Http\Controllers\Binaan\BahanPustakaController;
use App\Http\Controllers\Binaan\KoleksiController;
use App\Http\Controllers\Binaan\KondisiUmumController;
use App\Http\Controllers\Binaan\LayananController;
use App\Http\Controllers\Binaan\PemberdayaanController;
use App\Http\Controllers\Binaan\ProfileController;
use App\Http\Controllers\Binaan\SaranaController;
use App\Http\Controllers\Binaan\StatistikController;
use App\Http\Controllers\Binaan\TenagaController;
use App\Http\Controllers\Koleksi\CollectionController;
use App\Http\Controllers\Koleksi\CirculationController;
use App\Http\Controllers\Koleksi\InlisliteUserController;
use App\Http\Controllers\Koleksi\InlisliteProfileController;
use App\Http\Controllers\Koleksi\MemberController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('front-page.index');
})->name('login');

// Route::get('/inlislite/login', function () {
//     return view('login-page.inlislite');
// })->name('loginInlislite');
Route::get('/inlislite/logintrial', function () {
    return view('login-page.inlislite');
})->name('loginInlislite');

Route::post('inlislite/logincheck', [CheckAuthController::class, 'inlisliteAuth'])->name('inlisliteAuth');
Route::post('binaan/logincheck', [CheckAuthController::class, 'binaanAuth'])->name('binaanAuth');
Route::post('survey/logincheck', [CheckAuthController::class, 'surveyAuth'])->name('surveyAuth');
Route::post('pustakawan/logincheck', [CheckAuthController::class, 'surveyAuth'])->name('pustakawanAuth');
Route::post('bidang/logincheck', [CheckAuthController::class, 'bidangAuth'])->name('bidangAuth');

Route::post('inlislite/login', [LoginController::class, 'inlisliteLogin'])->name('inlisliteLogin');
Route::post('binaan/login', [LoginController::class, 'binaanLogin'])->name('binaanLogin');
Route::post('survey/login', [LoginController::class, 'surveyLogin'])->name('surveyLogin');
Route::post('pustakawan/login', [LoginController::class, 'pustakawanLogin'])->name('pustakawanLogin');
Route::post('bidang/login', [LoginController::class, 'bidangLogin'])->name('bidangLogin');

Route::post('inlislite/logout', [LoginController::class, 'inlisliteLogout'])->name('inlisliteLogout');
Route::post('binaan/logout', [LoginController::class, 'binaanLogout'])->name('binaanLogout');

Route::group(['middleware' => 'auth:inlislite', 'prefix' => 'inlislite'], function () {
    Route::get('/collection/catalogue', [CollectionController::class, 'collectionCatalogue'])->name('collectionCatalogue');
    Route::get('/collection/catalogue/{years}/filter', [CollectionController::class, 'collectionCatalogueFilter'])->name('collectionCatalogueFilter');
    Route::get('/collection/klas', [CollectionController::class, 'collectionKlas'])->name('collectionKlas');
    Route::get('/collection/klas/{years}/filter', [CollectionController::class, 'collectionKlasFilter'])->name('collectionKlasFilter');
    Route::get('/collection/source', [CollectionController::class, 'collectionSource'])->name('collectionSource');
    Route::get('/collection/source/{years}/filter', [CollectionController::class, 'collectionSourceFilter'])->name('collectionSourceFilter');
    Route::get('/collection/location', [CollectionController::class, 'collectionLocation'])->name('collectionLocation');
    Route::get('/collection/location/{years}/filter', [CollectionController::class, 'collectionLocationFilter'])->name('collectionLocationFilter');

    Route::get('/circulation/catalogue', [CirculationController::class, 'circulationCatalogue'])->name('circulationCatalogue');
    Route::get('/circulation/catalogue/{req}/filter', [CirculationController::class, 'circulationCatalogueFilter'])->name('circulationCatalogueFilter');
    Route::get('/circulation/klas', [CirculationController::class, 'circulationKlas'])->name('circulationKlas');
    Route::get('/circulation/klas/{req}/filter', [CirculationController::class, 'circulationKlasFilter'])->name('circulationKlasFilter');
    Route::get('/circulation/member', [CirculationController::class, 'circulationMember'])->name('circulationMember');
    Route::get('/circulation/member/{req}/filter', [CirculationController::class, 'circulationMemberFilter'])->name('circulationMemberFilter');
    Route::get('/circulation/usia', [CirculationController::class, 'circulationUsia'])->name('circulationUsia');
    Route::get('/circulation/usia/{req}/filter', [CirculationController::class, 'circulationUsiaFilter'])->name('circulationUsiaFilter');
    Route::get('/circulation/pekerjaan', [CirculationController::class, 'circulationPekerjaan'])->name('circulationPekerjaan');
    Route::get('/circulation/pekerjaan/{req}/filter', [CirculationController::class, 'circulationPekerjaanFilter'])->name('circulationPekerjaanFilter');

    Route::get('/member/data-umum', [MemberController::class, 'memberUmum'])->name('memberUmum');
    Route::get('/member/data-umum/{status}/filter', [MemberController::class, 'memberUmumFilter'])->name('memberUmumFilter');
    Route::get('/member/usia', [MemberController::class, 'memberUsia'])->name('memberUsia');
    Route::get('/member/usia/{status}/filter', [MemberController::class, 'memberUsiaFilter'])->name('memberUsiaFilter');
    Route::get('/member/pekerjaan', [MemberController::class, 'memberPekerjaan'])->name('memberPekerjaan');
    Route::get('/member/pekerjaan/{status}/filter', [MemberController::class, 'memberPekerjaanFilter'])->name('memberPekerjaanFilter');

    // route user profile
    Route::get('/user/profile', [InlisliteProfileController::class, 'index'])->name('inlisliteProfile');
    Route::put('/user/update/profile', [InlisliteProfileController::class, 'updateProfile'])->name('inlisliteUpdateProfile');
    Route::put('/user/update/password', [InlisliteProfileController::class, 'updatePassword'])->name('inlisliteUpdatePassword');

    //route Administrator
    Route::get('/administrator/user', [InlisliteUserController::class, 'index'])->name('inlisliteUser');
    Route::get('/administrator/user/datatable', [InlisliteUserController::class, 'datatable'])->name('inlisliteUserDatatable');
    Route::get('/administrator/{id}/user/edit', [InlisliteUserController::class, 'edit'])->name('inlisliteUserEdit');
    Route::put('/administrator/{id}/user/update', [InlisliteUserController::class, 'update'])->name('inlisliteUserUpdate');
    Route::get('/administrator/user/create', [InlisliteUserController::class, 'create'])->name('inlisliteUserCreate');
    Route::post('/administrator/user/create', [InlisliteUserController::class, 'store'])->name('inlisliteUserStore');
});

Route::group(['middleware' => 'auth:binaan', 'prefix' => 'binaan'], function () {

    Route::get('/profile', [ProfileController::class, 'show'])->name('binaanProfile');

    Route::get('/binaan/kondisi-umum', [KondisiUmumController::class, 'show'])->name('binaanKondisiUmum');
    Route::get('/filter/{id}/{tahun}/kondisi-umum', [KondisiUmumController::class, 'filter'])->name('filterKondisiUmum');
    Route::get('/edit/{id}/{tahun}/kondisi-umum', [KondisiUmumController::class, 'edit'])->name('editKondisiUmum');
    Route::put('/update/{id}/kondisi-umum', [KondisiUmumController::class, 'update'])->name('updateKondisiUmum');
    Route::get('/create/kondisi-umum', [KondisiUmumController::class, 'create'])->name('createKondisiUmum');
    Route::post('/store/kondisi-umum', [KondisiUmumController::class, 'store'])->name('storeKondisiUmum');

    Route::get('/binaan/bahan-pustaka', [BahanPustakaController::class, 'show'])->name('binaanBahanPustaka');
    Route::get('/filter/{id}/{tahun}/bahan-pustaka', [BahanPustakaController::class, 'filter'])->name('filterBahanPustaka');
    Route::get('/edit/{id}/{tahun}/bahan-pustaka', [BahanPustakaController::class, 'edit'])->name('editBahanPustaka');
    Route::put('/update/{id}/bahan-pustaka', [BahanPustakaController::class, 'update'])->name('updateBahanPustaka');
    Route::get('/create/bahan-pustaka', [BahanPustakaController::class, 'create'])->name('createBahanPustaka');
    Route::post('/store/bahan-pustaka', [BahanPustakaController::class, 'store'])->name('storeBahanPustaka');

    Route::get('/binaan/administrasi', [AdministrasiController::class, 'show'])->name('binaanAdministrasi');
    Route::get('/filter/{id}/{tahun}/administrasi', [AdministrasiController::class, 'filter'])->name('filterAdministrasi');
    Route::get('/edit/{id}/{tahun}/administrasi', [AdministrasiController::class, 'edit'])->name('editAdministrasi');
    Route::put('/update/{id}/administrasi', [AdministrasiController::class, 'update'])->name('updateAdministrasi');
    Route::get('/create/administrasi', [AdministrasiController::class, 'create'])->name('createAdministrasi');
    Route::post('/store/administrasi', [AdministrasiController::class, 'store'])->name('storeAdministrasi');

    Route::get('/binaan/pemberdayaan', [PemberdayaanController::class, 'show'])->name('binaanPemberdayaan');
    Route::get('/filter/{id}/{tahun}/pemberdayaan', [PemberdayaanController::class, 'filter'])->name('filterPemberdayaan');
    Route::get('/edit/{id}/{tahun}/pemberdayaan', [PemberdayaanController::class, 'edit'])->name('editPemberdayaan');
    Route::put('/update/{id}/pemberdayaan', [PemberdayaanController::class, 'update'])->name('updatePemberdayaan');
    Route::get('/create/pemberdayaan', [PemberdayaanController::class, 'create'])->name('createPemberdayaan');
    Route::post('/store/pemberdayaan', [PemberdayaanController::class, 'store'])->name('storePemberdayaan');


    // data tenaga not yet
    Route::get('/binaan/tenaga', [TenagaController::class, 'show'])->name('binaanTenagapustaka');
    Route::get('/filter/{id}/{tahun}/tenaga', [TenagaController::class, 'filter'])->name('filterTenagapustaka');
    Route::get('/edit/{id}/tenaga', [TenagaController::class, 'edit'])->name('editTenagapustaka');
    Route::put('/update/{id}/tenaga', [TenagaController::class, 'update'])->name('updateTenagapustaka');
    Route::get('/create/tenaga', [TenagaController::class, 'create'])->name('createTenagapustaka');
    Route::post('/store/tenaga', [TenagaController::class, 'store'])->name('storeTenagapustaka');

    Route::get('/binaan/sarana', [SaranaController::class, 'show'])->name('binaanSarana');
    Route::get('/filter/{id}/{tahun}/sarana', [SaranaController::class, 'filter'])->name('filterSarana');
    Route::get('/edit/{id}/{tahun}/sarana', [SaranaController::class, 'edit'])->name('editSarana');
    Route::put('/update/{id}/sarana', [SaranaController::class, 'update'])->name('updateSarana');
    Route::get('/create/sarana', [SaranaController::class, 'create'])->name('createSarana');
    Route::post('/store/sarana', [SaranaController::class, 'store'])->name('storeSarana');

    Route::get('/binaan/koleksi', [KoleksiController::class, 'show'])->name('binaanKoleksi');
    Route::get('/filter/{id}/{tahun}/koleksi', [KoleksiController::class, 'filter'])->name('filterKoleksi');
    Route::get('/edit/{id}/{tahun}/koleksi', [KoleksiController::class, 'edit'])->name('editKoleksi');
    Route::put('/update/{id}/koleksi', [KoleksiController::class, 'update'])->name('updateKoleksi');
    Route::get('/create/koleksi', [KoleksiController::class, 'create'])->name('createKoleksi');
    Route::post('/store/koleksi', [KoleksiController::class, 'store'])->name('storeKoleksi');

    Route::get('/binaan/layanan', [LayananController::class, 'show'])->name('binaanLayanan');
    Route::get('/filter/{id}/{tahun}/layanan', [LayananController::class, 'filter'])->name('filterLayanan');
    Route::get('/edit/{id}/{tahun}/layanan', [LayananController::class, 'edit'])->name('editLayanan');
    Route::put('/update/{id}/layanan', [LayananController::class, 'update'])->name('updateLayanan');
    Route::get('/create/layanan', [LayananController::class, 'create'])->name('createLayanan');
    Route::post('/store/layanan', [LayananController::class, 'store'])->name('storeLayanan');

    Route::get('/statistik/koleksi', [StatistikController::class, 'koleksi'])->name('binaanStatistikKoleksi');
    Route::get('/statistik/layanan', [StatistikController::class, 'layanan'])->name('binaanStatistikLayanan');
});


// route middleware survey
Route::group(['middleware' => 'auth:survey', 'prefix' => 'survey'], function () {
});

// route middleware kredit pustakawan
Route::group(['middleware' => 'auth:pustakawan', 'prefix' => 'pustakawan'], function () {
});

// route middleware bidang
Route::group(['middleware' => 'auth:bidang', 'prefix' => 'bidang'], function () {
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home2');
