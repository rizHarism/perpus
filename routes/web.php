<?php

use App\Http\Controllers\Koleksi\CollectionController;
use App\Http\Controllers\Koleksi\CirculationController;
use App\Http\Controllers\Koleksi\MemberController;
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


Route::get('/binaan', function () {
    return view('binaan.index');
});
Route::get('/binaan/kondisi-umum', function () {
    return view('binaan.datainput.kondisiumum.index');
})->name('binaanKondisiUmum');
Route::get('/binaan/bahan-pustaka', function () {
    return view('binaan.datainput.bahanpustaka.index');
})->name('binaanBahanPustaka');
Route::get('/binaan/administrasi', function () {
    return view('binaan.datainput.administrasi.index');
})->name('binaanAdministrasi');
Route::get('/binaan/pemberdayaan', function () {
    return view('binaan.datainput.pemberdayaan.index');
})->name('binaanPemberdayaan');
Route::get('/binaan/tenaga', function () {
    return view('binaan.datainput.tenagapustaka.index');
})->name('binaanTenagapustaka');
Route::get('/binaan/sarana', function () {
    return view('binaan.datainput.sarana.index');
})->name('binaanSarana');
Route::get('/binaan/koleksi', function () {
    return view('binaan.datainput.koleksi.index');
})->name('binaanKoleksi');
Route::get('/binaan/layanan', function () {
    return view('binaan.datainput.layanan.index');
})->name('binaanLayanan');
// Route::get('/collection/dashboard', [CollectionController::class, 'dashboard'])->name('collectionDashboard');
// Route::get('/collection/koleksi/datatables', [CollectionController::class, 'datatablesKoleksi'])->name('collectionKoleksi');
// Route::get('/collection/sirkulasi/datatables', [CollectionController::class, 'datatablesSirkulasi'])->name('collectionSirkulasi');


// Route::get('/user', [UserController::class, 'index']);
