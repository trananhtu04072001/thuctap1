<?php

use App\Http\Controllers\admin\AdminController;
use App\Http\Controllers\admin\AtributeController;
use App\Http\Controllers\admin\BannerController;
use App\Http\Controllers\admin\BrandController;
use App\Http\Controllers\admin\EventController;
use App\Http\Controllers\admin\HomeController;
use App\Http\Controllers\admin\ImportController;
use App\Http\Controllers\admin\InforController;
use App\Http\Controllers\admin\LevelController;
use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\admin\MonthProductController;
use App\Http\Controllers\admin\OrderController;
use App\Http\Controllers\admin\PaymentController;
use App\Http\Controllers\admin\ProductController;
use App\Http\Controllers\admin\ShipController;
use App\Http\Controllers\admin\TypeController;
use Illuminate\Support\Facades\Route;


Route::prefix('admin')->group(function () {
    // account
    Route::get('/regis', [LoginController::class,'regis'])->name('admin.regis');
    Route::post('/regis', [LoginController::class,'formregis']);
    Route::get('/login',[LoginController::class,'loginform'])->name('login.admin');
    Route::post('/login',[LoginController::class,'login']);
    Route::get('/checkout', [LoginController::class,'checkout'])->name('checkout.admin');
    Route::get('/liststaff', [AdminController::class,'liststaff'])->name('admin.liststaff');
    Route::get('/staffdelete/{id}', [AdminController::class,'destroy'])->name('staff.delete');
    Route::get('/listcustomer', [AdminController::class, 'listcus'])->name('customer.list');
    Route::get('/activecus/{id}', [AdminController::class, 'activecus'])->name('active.cus');
    Route::get('/deletecus/{id}', [AdminController::class, 'deletecus'])->name('delete.cus');
    // adminlevel
    Route::get('/home', [AdminController::class,'index'])->name('admin.home');
    Route::get('/listlevel', [LevelController::class,'list'])->name('admin.listlevel');
    Route::get('/addlevel', [LevelController::class,'add'])->name('admin.addlevel');
    Route::post('/addlevel', [LevelController::class,'addform']);
    Route::get('/destroy/{id}', [LevelController::class,'destroy'])->name('admin.destroylevel');
    // atribute
    Route::get('/brand', [BrandController::class,'list'])->name('brand.list');
    Route::get('/branddele/{id}', [BrandController::class, 'destroy'])->name('brand.destroy');
    Route::get('/addbrand',[BrandController::class, 'add'])->name('brand.add');
    Route::post('/addbrand', [BrandController::class, 'formadd']);
    Route::get('/listtype', [TypeController::class, 'list'])->name('type.list');
    Route::get('/addtype', [TypeController::class, 'add'])->name('type.add');
    Route::post('/addtype', [TypeController::class, 'formadd']);
    Route::get('/typedelete/{id}', [TypeController::class, 'destroy'])->name('destroy.type');
    Route::get('/groupatr', [AtributeController::class, 'listgroup'])->name('atribute.group');
    Route::get('/addgroup',[AtributeController::class, 'addgroup'])->name('atribute.addgroup');
    Route::post('/addgroup',[AtributeController::class, 'groupform']);
    Route::get('/listatr', [AtributeController::class, 'list'])->name('atribute.list');
    Route::get('/add', [AtributeController::class, 'add'])->name('atribute.add');
    Route::post('add', [AtributeController::class, 'addlist']);
    Route::get('/atrdelete/{id}', [AtributeController::class, 'destroy'])->name('atribute.destroy');
    Route::get('/atrgrodelete/{id}', [AtributeController::class, 'destroygro'])->name('atributegro.destroy');
    // product
    Route::get('/listproduct', [ProductController::class, 'list'])->name('product.list');
    Route::get('/detail/{id}', [ProductController::class, 'detail'])->name('product.detail');
    Route::get('/proupdate/{id}',[ProductController::class, 'update'])->name('product.update');
    Route::post('/proupdate/{id}',[ProductController::class, 'updateform']);
    Route::get('/addproduct', [ProductController::class, 'add'])->name('product.add');
    Route::post('/addproduct', [ProductController::class, 'formadd'])->name(('product.formadd'));
    Route::get('/deleteproduct/{id}', [ProductController::class, 'destroy'])->name('product.destroy');
    // event
    Route::get('listevent', [EventController::class, 'list'])->name('event.list');
    Route::get('addevent', [EventController::class, 'add'])->name('event.add');
    Route::post('addevent', [EventController::class, 'addform']);
    Route::get('/eventadd', [EventController::class, 'addevent'])->name('add.event');
    Route::post('/eventadd', [EventController::class, 'formadd']);
    Route::get('/eventdelete/{id}', [EventController::class, 'destroy'])->name('destroy.event');
    // ship
    Route::get('/listship', [ShipController::class, 'list'])->name('ship.list');
    Route::get('/addship', [ShipController::class, 'add'])->name('ship.add');
    Route::post('addship', [ShipController::class, 'formadd']);
    Route::get('deleteship/{id}', [ShipController::class, 'destroy'])->name('ship.destroy');
    // banner
    Route::get('/bannerlist', [BannerController::class, 'list'])->name('banner.list');
    Route::get('/banneradd', [BannerController::class, 'add'])->name('banner.add');
    Route::post('/banneradd', [BannerController::class, 'formadd'])->name('banner.post');
    Route::get('/delete/{id}',[BannerController::class, 'destroy'])->name('banner.delete');
    // infor
    Route::get('/infor', [InforController::class, 'list'])->name('infor.list');
    Route::get('/updateinfor/{id}',[InforController::class,'update'])->name('infor.update');
    Route::post('/updateinfor/{id}',[InforController::class,'updateform']);
    // import
    Route::get('/importhistory',[ImportController::class,'history'])->name('admin.import.list');
    Route::get('/importdetail/{id}',[ImportController::class,'detail'])->name('admin.import.detail');
    Route::get('/import',[ImportController::class,'import'])->name('admin.import.add');
    Route::post('/import',[ImportController::class,'importform']);
    Route::get('/statusimport/{id}',[ImportController::class,'status'])->name('admin.import.status');
    Route::get('/productimport', [ImportController::class, 'productlist'])->name('admin.import.listproduct');
    Route::get('/importstatus/{id}', [ImportController::class, 'updateimport'])->name('admin.import.update');
    // payment method
    Route::get('/paymentlist', [PaymentController::class, 'list'])->name('payment.list');
    Route::get('/paymentadd', [PaymentController::class, 'addpayment'])->name('payment.add');
    Route::post('/paymentadd', [PaymentController::class, 'postpayment']);
    Route::get('/paymentdelete/{id}', [PaymentController::class, 'deletepayment'])->name('payment.delete');

    // AdminCart
    Route::get('/listOrder', [OrderController::class, 'list'])->name('admins.show_order');
    Route::get('/detailOrder/{id}', [OrderController::class, 'orderDetail'])->name('admin.detail_order');
    Route::get('/statusOrder/{id}', [OrderController::class, 'updatestatus'])->name('admin.order.status');

    // Doanh thu
    Route::get('/reven', [HomeController::class, 'index'])->name('admin.reven');
    Route::get('/turnover', [OrderController::class, 'turnover'])->name('admin.turnover');
    // PDF
    Route::get('/importpdf/{id}',[ImportController::class, 'importpdf'])->name('import.pdf');
    Route::get('/orderpdf/{id}', [OrderController::class, 'orderPDF'])->name('admin.order.pdf');
});