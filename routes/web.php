<?php

use App\Events\Adminevent;
use App\Events\Userevent;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\dashboard\DashboardController;
use App\Http\Controllers\dashboard\UseDashController;
use App\Http\Controllers\departmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\History_repairController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\LeaveExportController;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\salaryController;
use App\Http\Controllers\SlipController;
use App\Http\Controllers\StockController;
use App\Http\Controllers\UnitController;
use App\Models\History_repair;
use App\Models\Inventory;
use App\Models\Stock;
use FontLib\Table\Type\name;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\RoundsalaryController;
use App\Http\Controllers\StockExportController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\Admin;
use App\Http\Middleware\Empolyee;
use App\Mail\Mail;
use App\Models\Roundsalary;
use Illuminate\Support\Facades\Mail as FacadesMail;

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
Route::get('/home', [HomeController::class, 'index'])->name('index');

Route::get('/', [LoginController::class, 'getLogin'])->name('getlogin');
Route::post('login', [LoginController::class, 'login'])->name('login');
Route::post('logout', [LoginController::class, 'logout'])->name('logout');

//admin
Route::middleware([Admin::class])->group(function () {
    // Route::middleware([Admin::class])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

        Route::get('/addInventory', [DashboardController::class, 'addInventory'])->name('addInventory');
        Route::get('/stock', [StockController::class, 'index'])->name('stock');
        Route::post('/storeInventory', [StockController::class, 'store'])->name('storeInventory');
        Route::get('Inventory/{id}', [StockController::class, 'show'])->name('Inventory.show');
        Route::get('edit-Inventory/{id}', [StockController::class, 'edit'])->name('edit.Inventory');
        Route::put('update-Inventory/{id}', [StockController::class, 'update'])->name('update.Inventory');
        Route::post('update-Inventory}', [StockController::class, 'updatestatus'])->name('update.statusInventory');

        Route::get('/stockmath', [DashboardController::class, 'stockmath'])->name('stockmath');


        Route::get('/employee', [EmployeeController::class, 'index'])->name('employee');
        Route::get('users/{id}', [EmployeeController::class, 'show'])->name('users.show');
        Route::get('edit-employee/{id}', [EmployeeController::class, 'editemployee'])->name('edit.employee');
        Route::put('update-employee/{id}', [EmployeeController::class, 'updateemployee'])->name('update.employee');
        Route::get('/addEmployee1', [DashboardController::class, 'addEmployee1'])->name('addEmployee1');
        Route::post('/storeEmployee', [EmployeeController::class, 'storeEmployee'])->name('storeEmployee');

        Route::get('/salary', [salaryController::class, 'index'])->name('salary');
        Route::get('salary/{id}', [salaryController::class, 'show'])->name('salary.show');
        Route::get('edit-salary/{id}', [salaryController::class, 'edit'])->name('edit.salary');
        Route::put('update-salary', [salaryController::class, 'update'])->name('update.salary');
        Route::get('/store-salary', [salaryController::class, 'addsalary'])->name('store.salary');

        Route::get('/roundsalary', [RoundsalaryController::class, 'index'])->name('roundsalary');
        Route::get('roundsalary/{id}', [RoundsalaryController::class, 'show'])->name('roundsalary.show');
        Route::get('edit-roundsalary/{id}', [RoundsalaryController::class, 'edit'])->name('edit.roundsalary');
        Route::post('update-roundsalary', [RoundsalaryController::class, 'update'])->name('update.roundsalary');

        Route::get('/absent', [DashboardController::class, 'absent'])->name('absent');
        Route::get('/sumleavework', [LeaveController::class, 'index'])->name('sumleavework');
        // Route::get('absent/{id}', [LeaveController::class, 'show'])->name('absent.show');
        Route::post('/add-absent', [LeaveController::class, 'store'])->name('store.absent');
        Route::get('edit-absent/{id}', [LeaveController::class, 'edit'])->name('edit.absent');
        Route::post('update-absent', [LeaveController::class, 'update'])->name('update.absent');

        Route::get('/stocksetting', [InventoryController::class, 'index'])->name('stocksetting');
        Route::get('stocksetting/{id}', [InventoryController::class, 'show'])->name('stocksetting.show');
        Route::post('/add-stocksetting', [InventoryController::class, 'store'])->name('storestockst');
        Route::get('edit-stockst/{id}', [InventoryController::class, 'edit'])->name('edit.stockst');
        Route::put('update-stockst', [InventoryController::class, 'update'])->name('update.stockst');
        Route::get('update-stockstt', [InventoryController::class, 'updatee'])->name('updatee.stockst');

        // Routedepartment
        Route::get('/departsetting', [departmentController::class, 'index'])->name('departsetting');
        Route::get('department/{id}', [departmentController::class, 'show'])->name('department.show');
        Route::post('/add-departs', [departmentController::class, 'storedepart'])->name('storedepart');
        Route::get('edit-department/{id}', [departmentController::class, 'edit'])->name('edit.department');
        Route::put('update-department', [departmentController::class, 'update'])->name('update.department');
        Route::get('update-status', [departmentController::class, 'updatestatus'])->name('updatestatus.department');
        // RouteUnit
        Route::get('/unitsetting', [UnitController::class, 'index'])->name('unitsetting');
        Route::get('unit/{id}', [UnitController::class, 'show'])->name('unit.show');
        Route::post('/add-unit', [UnitController::class, 'store'])->name('unit.store');
        Route::get('edit-unit/{id}', [UnitController::class, 'edit'])->name('edit.unit');
        Route::put('update-unit', [UnitController::class, 'update'])->name('update.unit');
        Route::get('update-unitt', [UnitController::class, 'updatee'])->name('updatee.unit');

        Route::get('/history_repairs', [History_repairController::class, 'index'])->name('history_repairs');
        Route::get('history/{id}', [History_repairController::class, 'show'])->name('history.show');
        Route::post('/add-history', [History_repairController::class, 'store'])->name('store.history');
        Route::get('edit-history/{id}', [History_repairController::class, 'edexportit'])->name('edit.history');
        Route::put('update-history', [History_repairController::class, 'update'])->name('update.history');


        Route::get('/employeesetting', [EmployeeController::class, 'index1'])->name('employeesetting');

        Route::get('/tax', [DashboardController::class, 'tax'])->name('tax');


        Route::get('/chart/{year}', [DashboardController::class, 'chart'])->name('chartt');

        Route::get('/work', [DashboardController::class, 'work'])->name('work');

        // Route::post('insertform', [TypeofleaveController::class, 'insertform'])->name('insertform');
        Route::post('/sendMail/{id}', [PdfController::class, 'sendMail'])->name('sendMail');
        Route::controller(UserController::class)->group(function () {
            Route::get('users', 'index');
            Route::get('users-export', 'export')->name('users.export');
            Route::post('users-import', 'import')->name('users.import');
        });
        Route::controller(LeaveExportController::class)->group(function () {
            Route::get('users', 'index');
            Route::get('leave-export', 'export')->name('leave.export');
            Route::post('leave-import', 'import')->name('leave.import');
        });

        Route::controller(StockExportController::class)->group(function () {
            Route::get('users', 'index');
            Route::get('stock-export', 'export')->name('stock.export');
        });
    });
});
// Route::controller(UserController::class)->group(function () {
//     Route::get('users', 'index');
//     Route::get('users-export', 'export')->name('users.export');
//     Route::post('users-import', 'import')->name('users.import');
// });
// Route::controller(LeaveExportController::class)->group(function () {
//     Route::get('users', 'index');
//     Route::get('leave-export', 'export')->name('leave.export');
//     Route::post('leave-import', 'import')->name('leave.import');
// });

// Route::controller(StockExportController::class)->group(function () {
//     Route::get('users', 'index');
//     Route::get('stock-export', 'export')->name('stock.export');
// });
Route::get('tax', [SlipController::class, 'index'])->name('taxx');
Route::get('tax/{id}', [SlipController::class, 'show'])->name('tax.show');
Route::post('/add-tax', [SlipController::class, 'store'])->name('store.tax');
Route::get('edit-tax/{id}', [SlipController::class, 'edit'])->name('edit.tax');
Route::put('update-tax/{id}', [SlipController::class, 'update'])->name('update.tax');

Route::get('slip/{id}', [PdfController::class, 'slip'])->name('export');

Route::get('mail', function () {
    $mail = new Mail(['customer' => 'Jams']);
    // Mail::to($request->user())->send(new  $mail);
    Mail::to('foo@example.com')->send($mail);
    // Mail::to($request->user())->send(new MailableClass);
});

Route::get('send', [HomeController::class, 'sendNotification']);
// Route::get('/send-notification', [NotificationController::class, 'sendOfferNotification']);
Route::get('/send-notification', [NotificationController::class, 'sendOfferNotification']);

// Route::get('/absent', [DashboardController::class, 'absent'])->name('absent');
// Route::get('/sumleavework', [LeaveController::class, 'index'])->name('sumleavework');
Route::get('absent/{id}', [LeaveController::class, 'show'])->name('absent.show');
// Route::post('/add-absent', [LeaveController::class, 'store'])->name('store.absent');
// Route::get('edit-absent/{id}', [LeaveController::class, 'edit'])->name('edit.absent');
// Route::post('update-absent', [LeaveController::class, 'update'])->name('update.absent');
// Route::post('updateadmin-absent', [LeaveController::class, 'updateadmin'])->name('updateadmin.absent');

Route::get('/sender', function () {
    return view('sender');
});
Route::post('/sender', [HomeController::class, 'sender']);
Route::get('/readnotify', [DashboardController::class, 'show'])->name('show.read');
Route::get('/update', [DashboardController::class, 'update'])->name('update.read');
Route::get('/updatee', [UseDashController::class, 'update'])->name('update.readuser');
Route::get('/readnotifyy', [UseDashController::class, 'show'])->name('show.readuser');



Route::get('/sender1', function () {
    // $data = request()->data;
    $array = ['user',];
    $test = 'ssss';
    // event(new Userevent($test));
    // event(new Adminevent('user.absent'));
    return view('sender');
});



// user
Route::middleware([Empolyee::class])->group(function () {
    Route::prefix('user')->group(function () {
        Route::get('/', [UseDashController::class, 'index'])->name('user_dashboard');
        // Route::get('/notify', [UseDashController::class, 'notify'])->name('_notify_');
        Route::get('/profile', [UseDashController::class, 'profile'])->name('profile');
        Route::get('/useabsent', [UseDashController::class, 'absent'])->name('useabsent');
        Route::get('/history', [UseDashController::class, 'history'])->name('history');
        Route::get('/history1', [UseDashController::class, 'history1'])->name('history1');
        Route::post('updateuse-absent', [UseDashController::class, 'updateuse'])->name('updateuse.absent');
        Route::post('/add-absentuse', [UseDashController::class, 'storeuse'])->name('store.absentuse');
        Route::get('/chart/{year}', [UseDashController::class, 'chart'])->name('chart');
        Route::get('index/getDate', [UseDashController::class, 'getDate'])->name('Usercontroller.getDate');

        // Route::get('/sendere', function () {
        //     // $data = request()->data;
        //     // event(new Userevent($data));
        //     event(new Adminevent('user.absent'));});

        Route::post('/update-profile', [UseDashController::class, 'updateprofile'])->name('update.profile');
    });
});
// Route::get('logout_ha', function () {
//     Auth::logout();
//     dd('success');
// });

// Auth::routes();
// Route::get('/', function () {
//     return view('user.dashboard');
// });
