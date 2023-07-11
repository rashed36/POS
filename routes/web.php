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
//     return view('wel.wellcome');
// });

Route::get('/','Frontend\FrontendController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware'=>'auth'],function(){

    Route::get('/clear-cache', function() {
        Artisan::call('cache:clear');
        return "Cache is cleared";
    });

    Route::prefix('users')->group(function(){
        Route::get('/view','Backend\UserController@view')->name('users.view');
        Route::get('/add','Backend\UserController@add')->name('users.add');
        Route::post('/store','Backend\UserController@store')->name('users.store');
        Route::get('/edit/{id}','Backend\UserController@edit')->name('users.edit');
        Route::post('/update/{id}','Backend\UserController@update')->name('users.update');
        Route::get('/delete/{id}','Backend\UserController@delete')->name('users.delete');
    });

    Route::prefix('profiles')->group(function(){
        Route::get('/view','Backend\ProfileController@view')->name('profiles.view');
        Route::get('/edit','Backend\ProfileController@edit')->name('profiles.edit');
        Route::post('/update','Backend\ProfileController@update')->name('profiles.update');
        Route::get('/password/view','Backend\ProfileController@passwordView')->name('profiles.password.view');
        Route::post('/password/update','Backend\ProfileController@passwordUpdate')->name('profiles.password.update');
    });

    Route::prefix('suppliers')->group(function(){
        Route::get('/view','Backend\SuppliersController@view')->name('suppliers.view');
        Route::get('/add','Backend\SuppliersController@add')->name('suppliers.add');
        Route::post('/store','Backend\SuppliersController@store')->name('suppliers.store');
        Route::get('/edit/{id}','Backend\SuppliersController@edit')->name('suppliers.edit');
        Route::post('/update/{id}','Backend\SuppliersController@update')->name('suppliers.update');
        Route::get('/delete/{id}','Backend\SuppliersController@delete')->name('suppliers.delete');
    });

    Route::prefix('customers')->group(function(){
        Route::get('/view','Backend\customersController@view')->name('customers.view');
        Route::get('/add','Backend\customersController@add')->name('customers.add');
        Route::post('/store','Backend\customersController@store')->name('customers.store');
        Route::get('/edit/{id}','Backend\customersController@edit')->name('customers.edit');
        Route::post('/update/{id}','Backend\customersController@update')->name('customers.update');
        Route::get('/delete/{id}','Backend\customersController@delete')->name('customers.delete');
        Route::get('/credit','Backend\customersController@creditCustomer')->name('customers.credit');
        Route::get('/credit/pdf','Backend\customersController@creditCustomerPdf')->name('customers.credit.pdf');
        Route::get('/invoice/edit/{invoice_id}','Backend\customersController@editInvoice')->name('customers.edit.invoice');
        Route::post('/invoice/edit/update/{invoice_id}','Backend\customersController@updateInvoice')->name('customers.update.invoice');
        Route::get('/invoice/details/pdf/{invoice_id}','Backend\customersController@InvoiceDetailsPdf')->name('invoice.details.pdf');
        Route::get('/paid','Backend\customersController@paidCustomer')->name('customers.paid');
        Route::get('/paid/pdf','Backend\customersController@paidCustomerPdf')->name('customers.paid.pdf');
        Route::get('/wise/report','Backend\customersController@customerWiseReport')->name('customers.wise.report');
        Route::get('/wise/credit/report','Backend\customersController@customerWiseCredit')->name('customers.wise.credit.report');
        Route::get('/wise/paid/report','Backend\customersController@customerWisePaid')->name('customers.wise.paid.report');
        
    });

    Route::prefix('units')->group(function(){
        Route::get('/view','Backend\UnitController@view')->name('units.view');
        Route::get('/add','Backend\UnitController@add')->name('units.add');
        Route::post('/store','Backend\UnitController@store')->name('units.store');
        Route::get('/edit/{id}','Backend\UnitController@edit')->name('units.edit');
        Route::post('/update/{id}','Backend\UnitController@update')->name('units.update');
        Route::get('/delete/{id}','Backend\UnitController@delete')->name('units.delete');
    });

    Route::prefix('categories')->group(function(){
        Route::get('/view','Backend\CategoryController@view')->name('categories.view');
        Route::get('/add','Backend\CategoryController@add')->name('categories.add');
        Route::post('/store','Backend\CategoryController@store')->name('categories.store');
        Route::get('/edit/{id}','Backend\CategoryController@edit')->name('categories.edit');
        Route::post('/update/{id}','Backend\CategoryController@update')->name('categories.update');
        Route::get('/delete/{id}','Backend\CategoryController@delete')->name('categories.delete');
    });

    Route::prefix('products')->group(function(){
        Route::get('/view','Backend\ProductController@view')->name('products.view');
        Route::get('/add','Backend\ProductController@add')->name('products.add');
        Route::post('/store','Backend\ProductController@store')->name('products.store');
        Route::get('/edit/{id}','Backend\ProductController@edit')->name('products.edit');
        Route::post('/update/{id}','Backend\ProductController@update')->name('products.update');
        Route::get('/delete/{id}','Backend\ProductController@delete')->name('products.delete');
    });

    Route::prefix('purchase')->group(function(){
        Route::get('/view','Backend\PurchaseController@view')->name('purchase.view');
        Route::get('/add','Backend\PurchaseController@add')->name('purchase.add');
        Route::post('/store','Backend\PurchaseController@store')->name('purchase.store');
        Route::get('/panding','Backend\PurchaseController@pendingList')->name('purchase.pending.list');
        Route::get('/approve/{id}','Backend\PurchaseController@approve')->name('purchase.approve');
        Route::get('/delete/{id}','Backend\PurchaseController@delete')->name('purchase.delete');
        Route::get('/report','Backend\PurchaseController@purchaseReport')->name('purchase.report');
        Route::get('/report/pdf','Backend\PurchaseController@purchaseReportPdf')->name('purchase.report.pdf');
    });

    Route::get('/get-category','Backend\DefaultController@getCategory')->name('get-category');
    Route::get('/get-product','Backend\DefaultController@getProduct')->name('get-product');
    Route::get('/get-stock','Backend\DefaultController@getStock')->name('check-product-stock');
    Route::get('/get-parchese','Backend\DefaultController@getPerchase')->name('check-product-parchase');

    Route::prefix('invoice')->group(function(){
        Route::get('/view','Backend\InvoiceController@view')->name('invoice.view');
        Route::get('/add','Backend\InvoiceController@add')->name('invoice.add');
        Route::post('/store','Backend\InvoiceController@store')->name('invoice.store');
        Route::get('/panding','Backend\InvoiceController@pendingList')->name('invoice.pending.list');
        Route::get('/approve/{id}','Backend\InvoiceController@approve')->name('invoice.approve');
        Route::get('/delete/{id}','Backend\InvoiceController@delete')->name('invoice.delete');
        Route::post('/approve/store/{id}','Backend\InvoiceController@ApprovalStore')->name('approval.store');
        Route::get('/print/list','Backend\InvoiceController@printInvoiceList')->name('invoice.print.list');
        Route::get('/print/{id}','Backend\InvoiceController@printInvoice')->name('invoice.print');
        Route::get('/daily/report','Backend\InvoiceController@dailyReport')->name('invoice.daily.report');
        Route::get('/daily/report/pdf','Backend\InvoiceController@dailyReportPdf')->name('daily.invoice.report.pdf');
    });

    Route::prefix('stock')->group(function(){
        Route::get('/report','Backend\StockController@stockReport')->name('stock.report');
        Route::get('/print','Backend\StockController@printReport')->name('print.report.stock');
        Route::get('/report/supplier/wise','Backend\StockController@supplierProductWise')->name('supplier.product.wise');
        Route::get('/report/supplier/wise/pdf','Backend\StockController@supplierProductWisePdf')->name('supplier.product.wise.pdf');
        Route::get('/report/product/wise/pdf','Backend\StockController@ProductWisePdf')->name('product.wise.pdf');
    });

    Route::prefix('cost')->group(function(){
        Route::get('/cost/view','Backend\CostController@view')->name('account.cost.view');
        Route::get('/cost/add','Backend\CostController@add')->name('account.cost.add');
        Route::post('/cost/store','Backend\CostController@store')->name('account.cost.store');
        Route::get('/cost/edit/{id}','Backend\CostController@edit')->name('account.cost.edit');
        Route::post('/cost/update/{id}','Backend\CostController@update')->name('account.cost.update'); 
    });

    Route::prefix('employees')->group(function(){
        //employee registration.
        Route::get('/reg/employee/view','Backend\EmployeeController@view')->name('employee.reg.view');
        Route::get('/reg/employee/add','Backend\EmployeeController@add')->name('employee.reg.add');
        Route::post('/reg/employee/store','Backend\EmployeeController@store')->name('employee.reg.store');
        Route::get('/reg/employee/edit/{id}','Backend\EmployeeController@edit')->name('employee.reg.edit');
        Route::post('/reg/employee/update/{id}','Backend\EmployeeController@update')->name('employee.reg.update'); 
        Route::get('/reg/employee/single/view/{id}','Backend\EmployeeController@single_view')->name('employee.reg.single.view');
        //employee salary.
        Route::get('/salary/view','Backend\EmployeeSalaryController@view')->name('employee.salary.view');
        Route::get('/salary/increment/{id}','Backend\EmployeeSalaryController@increment')->name('employee.salary.increment');
        Route::post('/salary/store/{id}','Backend\EmployeeSalaryController@store')->name('employee.salary.store'); 
        Route::get('/salary/detils/{id}','Backend\EmployeeSalaryController@detils')->name('employee.salary.detils.view');
        //employee Leave.
        Route::get('/leave/employee/view','Backend\EmployeeLeaveController@view')->name('employee.leave.view');
        Route::get('/leave/employee/add','Backend\EmployeeLeaveController@add')->name('employee.leave.add');
        Route::post('/leave/employee/store','Backend\EmployeeLeaveController@store')->name('employee.leave.store');
        Route::get('/leave/employee/edit/{id}','Backend\EmployeeLeaveController@edit')->name('employee.leave.edit');
        Route::post('/leave/employee/update/{id}','Backend\EmployeeLeaveController@update')->name('employee.leave.update'); 
        //employee Attendence.
        Route::get('/attend/employee/view','Backend\EmployeeAttendController@view')->name('employee.attend.view');
        Route::get('/attend/employee/add','Backend\EmployeeAttendController@add')->name('employee.attend.add');
        Route::post('/attend/employee/store','Backend\EmployeeAttendController@store')->name('employee.attend.store');
        Route::get('/attend/employee/edit/{date}','Backend\EmployeeAttendController@edit')->name('employee.attend.edit');
        Route::get('/attend/employee/detils/{date}','Backend\EmployeeAttendController@detils')->name('employee.attend.detils'); 
        //employee Monthlay Salary.
        Route::get('/monthly/salary/view','Backend\MonthlySalaryController@view')->name('employee.monthly.salary.view');
        Route::get('/monthly/salary/get','Backend\MonthlySalaryController@getSalary')->name('employee.monthly.salary.get');
        Route::get('/monthly/salary/payslip/{employee_id}','Backend\MonthlySalaryController@paySlip')->name('employee.monthly.salary.payslip'); 
    });

});


