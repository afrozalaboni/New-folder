<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TechnicianController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ComplainController;
use App\Http\Controllers\ServiceController;
use App\Models\contact;
use App\Models\User;
use App\Models\Complain;
use App\Models\Category;
use App\Models\Service;

Route::get('/', function () {
    return view('frontend.home');
})->name('home');

Route::get('/contact', function () {
    return view('frontend.contact');
})->name('contact');

// Route::get('/service', function () {
//     return view('frontend.service');
// })->name('service');

Route::post('/contact', [AdminController::class, 'contact_msg'])->name('contact_msg');

Route::get('/service', [ServiceController::class, 'service'])->name('service');


Route::get('/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth'])->name('dashboard');

// admin dashboard
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        $total_users = User::where('role', '2')->count();
        $total_technicians = User::where('role', '3')->count();
        $total_complaint = Complain::get()->count();
        $total_assigned = Complain::where('status', '>', '0')->count();
        $total_completed_task = Complain::where('status', '2')->count();
        $total_pending_task = Complain::where('status', '1')->count();
        return view('admin.dashboard', compact('total_users', 'total_technicians','total_complaint', 'total_assigned', 'total_completed_task', 'total_pending_task'));
    })->name('admin.dashboard');
    
    Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::get('/admin/contact', [AdminController::class, 'contact'])->name('admin.contact');
    Route::get('/admin/complaint', [AdminController::class, 'complaint'])->name('admin.complaint');
    Route::post('/admin/assign', [AdminController::class, 'assign'])->name('admin.assign');
   Route::get('/admin/report/inreport/', [AdminController::class, 'inreport'])->name('admin.report.inreport');
   Route::get('/admin/invoice', [AdminController::class, 'invoice'])->name('admin.invoice');
   //service
   Route::get('/admin/service/index', [ServiceController::class, 'index'])->name('admin.service.index');
   Route::get('/admin/service/create', [ServiceController::class, 'create'])->name('admin.service.create');
   Route::post('/admin/service/store', [ServiceController::class, 'store'])->name('admin.service.store');
   Route::get('/admin/service/edit/{id}', [ServiceController::class, 'edit'])->name('admin.service.edit');
   Route::post('/admin/service/update/{id}', [ServiceController::class, 'update'])->name('admin.service.update');
   Route::get('/admin/service/delete/{id}', [ServiceController::class, 'delete'])->name('admin.service.delete');
    // complaint View page
   
    
    
    //category
     Route::get('/admin/category/index', [CategoryController::class, 'index'])->name('admin.category.index');
     Route::get('/admin/category/create', [CategoryController::class, 'create'])->name('admin.category.create');
     Route::get('/admin/category/edit/{id}', [CategoryController::class, 'edit'])->name('admin.category.edit');
     Route::post('/admin/category/update/{id}', [CategoryController::class, 'update'])->name('admin.category.update');
     Route::post('/admin/category/store', [CategoryController::class, 'store'])->name('admin.category.store');
     Route::get('/admin/category/delete/{id}', [CategoryController::class, 'delete'])->name('admin.category.delete');
     //complaint status
     Route::post('/admin/completed', [AdminController::class, 'completed'])->name('admin.completed');
    
    //  Route::get('/admin/category/index', function () {
    //     return view('admin.category.index');
    // })->middleware(['auth', 'admin'])->name('admin.category.index');
    
    //Technician
    Route::get('/admin/technician/list', [AdminController::class, 'technician_list'])->name('admin.technician.list');
    //user
    Route::get('/admin/user/list', [AdminController::class, 'user_list'])->name('admin.user.list');

    Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');

    // user(technician) delete
    Route::get('/admin/technician_delete/{id}', [AdminController::class, 'technician_delete'])->name('admin.technician_delete');
});
//admin dashboard end


// user dashboard start
Route::middleware(['auth','user'])->group(function () {
    Route::get('/user/dashboard', function () {
        return view('user.dashboard');
    })->name('user.dashboard');
    
    //complain
    Route::get('/user/complain/index', [UserController::class, 'index'])->name('user.complain.index');
    Route::get('/user/complain/create', [UserController::class, 'create'])->name('user.complain.create');
    Route::post('/user/complain/store', [UserController::class, 'store'])->name('user.complain.store');
    Route::get('/user/complain/review/{id}', [UserController::class, 'review_create'])->name('user.complain.review_create');
    Route::post('/user/complain/review', [UserController::class, 'review_post'])->name('user.complain.review_post');
    Route::get('/user/complain/payment/{id}', [UserController::class, 'payment_create'])->name('user.complain.payment_create');
    Route::post('/user/complain/payment', [UserController::class, 'payment_post'])->name('user.complain.payment_post');
    Route::get('/user/invoice/{id}', [UserController::class, 'invoice'])->name('user.invoice');
});
//user dashboard end



// technician dashboard start
Route::middleware(['auth','technician'])->group(function () {
    Route::get('/technician/dashboard', function () {
        return view('technician.dashboard');
    })->name('technician.dashboard');

    
    Route::get('/technician/complaint', [TechnicianController::class, 'complaint'])->name('technician.complaint');
    Route::post('/technician/completed', [TechnicianController::class, 'completed'])->name('technician.completed');
    Route::post('/technician/requested_deadline', [TechnicianController::class, 'requested_deadline'])->name('technician.requested_deadline');
   

});
//technician dashboard end


require __DIR__.'/auth.php';
