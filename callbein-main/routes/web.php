<?php

use App\Http\Controllers\AdminExpenseController;
use App\Http\Controllers\AdminProductPriceController;
use App\Http\Controllers\AmountCollectionController;
use App\Http\Controllers\BeinController;
use App\Http\Controllers\ChequeController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\DeliveryInformationController;
use App\Http\Controllers\DeliveryManController;
use App\Http\Controllers\EmployeeRegistration;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\MoneyDisburseController;
use App\Http\Controllers\ProcurementController;
use App\Http\Controllers\ProductBrandController;
use App\Http\Controllers\ProductCategoryController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProductDeliveyController;
use App\Http\Controllers\ProductPricingController;
use App\Http\Controllers\ProductSourceController;
use App\Http\Controllers\RequisitionController;
use App\Http\Controllers\ReturnManagementController;
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

 Route::get('/register', function () {
     return redirect()->route('login');
 });

Route::get('/', function () {
    if (Auth::check()) {
        return redirect()->route('dashboard');
    }
    return view('auth.login');
})->name('auth.login');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::group(['middleware' => 'auth:sanctum'], function () {

//Employee Registration
    Route::get('/employee-registration', [EmployeeRegistration::class, 'registration'])->name('employee-registration');
    Route::post('/employee-store', [EmployeeRegistration::class, 'store'])->name('employee-store');

//Guest Route
    Route::get('/guest-info', [GuestController::class, 'index'])->name('guest-info');
    Route::post('/get-member', [GuestController::class, 'getMember'])->name('get-member');
    Route::get('/add-guest', [GuestController::class, 'addGuest'])->name('add-guest');
    Route::post('/guest-store', [GuestController::class, 'store'])->name('guest-store');
    Route::get('/guest-edit/{id}', [GuestController::class, 'edit'])->name('guest-edit');
    Route::post('/guest-update/{id}', [GuestController::class, 'update'])->name('guest-update');

// bein route
    Route::get('/bein', [BeinController::class, 'index'])->name('bein');
    Route::post('/bein-search', [BeinController::class, 'search'])->name('bein-search');
    Route::post('/bein-program', [BeinController::class, 'beinProgram'])->name('bein-program');
    Route::get('/bein-all-program', [BeinController::class, 'allBeinProgram'])->name('bein.all-program');
    Route::get('/bein-program-view/{id}', [BeinController::class, 'view'])->name('bein.program-view');
    Route::get('/bein-program-edit/{id}', [BeinController::class, 'edit'])->name('bein.program-edit');
    Route::post('/bein-program-update/{id}', [BeinController::class, 'update'])->name('bein-program-update');

// bein requisition route
    Route::post('/bein-getMemberDetail', [RequisitionController::class, 'getMemberDetail'])->name('bein-getMemberDetail');
    Route::get('/bein-orderMemberDetail/{id}', [RequisitionController::class, 'orderMemberDetail'])->name('bein-orderMemberDetail');
    Route::get('/bein-requisition', [RequisitionController::class, 'beinRequisiiton'])->name('bein-requisition');
    Route::get('/bein-requisition-price/{id}', [RequisitionController::class, 'getPrice'])->name('bein-requisition-price');
    Route::get('/bein-all-requisiton', [RequisitionController::class, 'allBeinRequisition'])->name('bein.all-requisition');

// bein procurement route
    Route::get('/bein-procurement', [ProcurementController::class, 'beinProcurement'])->name('bein-procurement');

// Admin expense route
    Route::get('/admin-expense', [AdminExpenseController::class, 'index'])->name('admin.expense');
    Route::post('/admin-expense-store', [AdminExpenseController::class, 'store'])->name('admin-expense-store');
    Route::get('/admin-expense-edit/{id}', [AdminExpenseController::class, 'edit'])->name('admin-expense-edit');
    Route::post('/admin-expense-update/{id}', [AdminExpenseController::class, 'update'])->name('admin-expense-update');

// Admin Product Pricing
    Route::get('/admin-product-pricing', [AdminProductPriceController::class, 'index'])->name('admin-product-pricing');
    Route::post('/product-price-store', [AdminProductPriceController::class, 'store'])->name('product-price-store');
    Route::get('/product-price-edit/{id}', [AdminProductPriceController::class, 'edit'])->name('product-price-edit');
    Route::post('/product-price-update/{id}', [AdminProductPriceController::class, 'update'])->name('product-price-update');

// Product Pricing
    Route::get('/product-pricing', [ProductPricingController::class, 'index'])->name('product.pricing');

// invoiceAmount Collection Route
    Route::get('/invoice-amount-collection', [AmountCollectionController::class, 'index'])->name('amount.collection');

// return Management Route
    Route::get('/return-management', [ReturnManagementController::class, 'index'])->name('return.management');
    Route::post('/return-management-store', [ReturnManagementController::class, 'store'])->name('return-management-store');
    Route::get('/return-management-edit/{id}', [ReturnManagementController::class, 'edit'])->name('return-management-edit');
    Route::post('/return-management-update/{id}', [ReturnManagementController::class, 'update'])->name('return-management-update');

//Company Route
    Route::get('/add-company', [CompanyController::class, 'index'])->name('add-company');
    Route::post('/store-company', [CompanyController::class, 'store'])->name('store-company');
    Route::get('/edit-company/{id}', [CompanyController::class, 'edit'])->name('edit-company');
    Route::post('/edit-company/{id}', [CompanyController::class, 'update'])->name('update-company');

//Product Category Route
    Route::get('/add-category', [ProductCategoryController::class, 'index'])->name('add-category');
    Route::post('/store-category', [ProductCategoryController::class, 'store'])->name('store-category');
    Route::get('/edit-category/{id}', [ProductCategoryController::class, 'edit'])->name('edit-category');
    Route::post('/update-category/{id}', [ProductCategoryController::class, 'update'])->name('update-category');

//Product Brand Route
    Route::get('/add-brand', [ProductBrandController::class, 'index'])->name('add-brand');
    Route::post('/store-brand', [ProductBrandController::class, 'store'])->name('store-brand');
    Route::get('/edit-brand/{id}', [ProductBrandController::class, 'edit'])->name('edit-brand');
    Route::post('/update-brand/{id}', [ProductBrandController::class, 'update'])->name('update-brand');

//Product Route
    Route::get('/add-product', [ProductController::class, 'index'])->name('add-product');
    Route::post('/store-product', [ProductController::class, 'store'])->name('store-product');
    Route::get('/edit-product/{id}', [ProductController::class, 'edit'])->name('edit-product');
    Route::post('/update-product/{id}', [ProductController::class, 'update'])->name('update-product');

//Product Source Route
    Route::get('/add-product-source', [ProductSourceController::class, 'index'])->name('add-product-source');
    Route::post('/store-product-source', [ProductSourceController::class, 'store'])->name('store-product-source');
    Route::get('/edit-product-source/{id}', [ProductSourceController::class, 'edit'])->name('edit-product-source');
    Route::post('/update-product-source/{id}', [ProductSourceController::class, 'update'])->name('update-product-source');

//Money Disburse Route
    Route::get('/money-Disburse', [MoneyDisburseController::class, 'index'])->name('money-Disburse');

// member testing
// Route::get('/memberinfo',[MemberController::class, 'getRecord']) -> name('memberinfo');

//Cheque Management Route
    Route::get('/cheque-management', [ChequeController::class, 'index'])->name('cheque-management');
    Route::post('/store-cheque', [ChequeController::class, 'store'])->name('store-cheque');
    Route::get('/edit-cheque/{id}', [ChequeController::class, 'edit'])->name('edit-cheque');
    Route::post('/update-cheque/{id}', [ChequeController::class, 'update'])->name('update-cheque');

//Inventory Route
    Route::get('/inventory-entry', [InventoryController::class, 'index'])->name('inventory-entry');

//Deliveryman Registration Route
    Route::get('/deliveryman-registration', [DeliveryManController::class, 'index'])->name('deliveryman-registration');
    Route::post('/store-deliveryman', [DeliveryManController::class, 'store'])->name('store-deliveryman');
    Route::get('/edit-deliveryman/{id}', [DeliveryManController::class, 'edit'])->name('edit-deliveryman');
    Route::post('/update-deliveryman/{id}', [DeliveryManController::class, 'update'])->name('update-deliveryman');

//Product Delivery Route
    Route::get('/product-delivery', [ProductDeliveyController::class, 'index'])->name('product-delivery');
    Route::post('/product-delivery-store', [ProductDeliveyController::class, 'store'])->name('product-delivery-store');
    Route::get('/product-delivery-edit/{id}', [ProductDeliveyController::class, 'edit'])->name('product-delivery-edit');
    Route::post('/product-delivery-update/{id}', [ProductDeliveyController::class, 'update'])->name('product-delivery-update');
// chalan route
    Route::post('/chalan-store', [ProductDeliveyController::class, 'chalanStore'])->name('chalan-store');
    Route::get('/chalan-view', [ProductDeliveyController::class, 'chalanView'])->name('chalan-view');
    Route::get('/chalan-view-details/{id}', [ProductDeliveyController::class, 'chalanViewDetails'])->name('chalan-view-details');

//Delivery Information Route
    Route::get('/delivery-information', [DeliveryInformationController::class, 'index'])->name('delivery-information');
    Route::post('/delivery-information-store', [DeliveryInformationController::class, 'store'])->name('delivery-information-store');
    Route::get('/delivery-information-edit/{id}', [DeliveryInformationController::class, 'edit'])->name('delivery-information-edit');
    Route::post('/delivery-information-update/{id}', [DeliveryInformationController::class, 'update'])->name('delivery-information-update');

});
