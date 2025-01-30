<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AssignmentController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EditController;
use App\Http\Controllers\MerchantCategory;
use App\Http\Controllers\MerchantController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SalesPersonController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SocialLoginController;
use App\Models\Merchant;

Route::get('/', function () {
    return view('welcome');
})->middleware('guest');




Route::middleware('auth')->group(function () {
    Route::get('/logout', function () {
        Auth::logout();
        return redirect('/login');
    });


    //category rotes
    Route::get('/admin', [AdminController::class, 'admin'])->name('dashboard');
    Route::get('/category_view', [AdminController::class, 'show_data'])->name('category_view');
    Route::post('/category_data', [AdminController::class, 'category_data'])->name('category_data');
    Route::get('/save_category', [AdminController::class, 'save_category'])->name('save_category');
    Route::get('/update_category/{id}', [AdminController::class, 'update_category'])->name('update_category');
    Route::post('/update_category/{id}', [AdminController::class, 'update_category_post'])->name('update_category_post');
    Route::get('/delete_category/{id}', [AdminController::class, 'delete_category'])->name('delete_category');

    //produt routes
    Route::get('/product_view', [AdminController::class, 'product_view'])->name('product_view');
    Route::post('/create_product', [AdminController::class, 'create_product'])->name('create_product');
    Route::get('/product_new', [AdminController::class, 'product_new'])->name('product_new');
    Route::get('/delete_product/{id}', [AdminController::class, 'delete_product'])->name('delete_product');
    Route::get('/edit_productForm/{id}', [AdminController::class, 'edit_product'])->name('edit_product');
    Route::post('/update_product/{id}', [AdminController::class, 'update_product'])->name('update_product');

    //product variant routes
    Route::get('/product_variant_view', [AdminController::class, 'product_variant_view'])->name('product_variant_view');
    Route::post('/create_product_variant', [AdminController::class, 'create_product_variant'])->name('create_product_variant');
    Route::get('/product_variant_new', [AdminController::class, 'product_variant_new'])->name('product_variant_new');
    Route::get('/delete_product_variant/{id}', [AdminController::class, 'delete_product_variant'])->name('delete_product_variant');
    Route::get('/edit_product_variantForm/{id}', [AdminController::class, 'edit_product_variant'])->name('edit_product_variant');
    Route::post('/update_product_variant/{id}', [AdminController::class, 'update_product_variant'])->name('update_product_variant');

    //merchant routes
    Route::get('/merchant_view', [MerchantController::class, 'merchant_view'])->name('merchant_view');
    Route::post('/create_merchant', [MerchantController::class, 'create_merchant'])->name('create_merchant');
    Route::get('/merchant_new', [MerchantController::class, 'merchant_new'])->name('merchant_new');
    Route::get('/delete_merchant/{id}', [MerchantController::class, 'delete_merchant'])->name('delete_merchant');
    Route::get('/edit_merchantForm/{id}', [MerchantController::class, 'edit_merchant'])->name('edit_merchant');
    Route::post('/update_merchant/{id}', [MerchantController::class, 'update_merchant'])->name('update_merchant');


    //sales person route
    Route::get('/sales_person_view', [SalesPersonController::class, 'sales_person'])->name('sales_person');
    Route::post('/create_sales_person', [SalesPersonController::class, 'create_sales_person'])->name('create_sales_person');
    Route::get('/new_sales_person', [SalesPersonController::class, 'new_sales_person'])->name('new_sales_person');
    Route::get('/delete_sales_person/{id}', [SalesPersonController::class, 'delete_sales_person'])->name('delete_sales_person');
    Route::get('/edit_sales_personForm/{id}', [SalesPersonController::class, 'edit_sales_person'])->name('edit_sales_person');
    Route::post('/update_sales_person/{id}', [SalesPersonController::class, 'update_sales_person'])->name('update_sales_person');

    //Customers route
    Route::get('/customer_view', [CustomerController::class, 'customer_view'])->name('customer_view');




    //Admin user route
    Route::get('/admin_user_view', [AdminUserController::class, 'admin_user_view'])->name('admin_user_view');
    Route::get('/admin_user_new', [AdminUserController::class, 'admin_user_new'])->name('admin_user_new');
    Route::post('/create_admin_user', [AdminUserController::class, 'create_admin_user'])->name('create_admin_user');
    Route::get('/edit_admin_userForm/{id}', [AdminUserController::class, 'edit_admin_user'])->name('edit_admin_user');
    Route::post('/update_admin_user/{id}', [AdminUserController::class, 'update_admin_user'])->name('update_admin_user');
    Route::get('/delete_admin_user/{id}', [AdminUserController::class, 'delete_admin_user'])->name('delete_admin_user');


    //Assignment
    Route::post('/assignProductToUser', [AssignmentController::class, 'assignProductToUser'])->name('assignProductToUser');
    Route::get('/user_assignment', [AssignmentController::class, 'user_assignment'])->name('user_assignment');
    Route::post('/assignPincodesToProduct', [AssignmentController::class, 'assignPincodesToProduct'])->name('assignPincodesToProduct');
    Route::get('/product_assignment', [AssignmentController::class, 'product_assignment'])->name('product_assignment');
    //view Product Assignment
    Route::get('/assign_pincode_to_product', [AssignmentController::class, 'assign_pincode_to_product'])->name('assign_pincode_to_product');

    Route::get('/pincode_view', [AssignmentController::class, 'pincode_view'])->name('pincode_view');
    Route::post('/create_pincode', [AssignmentController::class, 'create_pincode'])->name('create_pincode');
    Route::get('/add_pincode', [AssignmentController::class, 'add_pincode'])->name('add_pincode');
    Route::get('/delete_pincode/{id}', [AssignmentController::class, 'delete_pincode'])->name('delete_pincode');
    Route::get('/edit_pincodeForm/{id}', [AssignmentController::class, 'edit_pincode'])->name('edit_pincode');
    Route::post('/update_pincode/{id}', [AssignmentController::class, 'update_pincode'])->name('update_pincode');
    Route::get('/example', [AssignmentController::class, 'example'])->name('example');



    //policies routes
    Route::get('/ckeditor', [EditController::class, 'editor'])->name('ckeditor.index');
    Route::post('/save-policy', [EditController::class, 'store'])->name('policy.store');
    Route::get('/policy/{id}', [EditController::class, 'show'])->name('policy.show');
    Route::get('/Policy_info', [EditController::class, 'Policy_info'])->name('policy.info');
    Route::get('/policy_edit/{id}', [EditController::class, 'edit'])->name('policy.edit');
    Route::post('/policy_update/{id}', [EditController::class, 'update'])->name('policy.update');
    Route::get('/policy_delete/{id}', [EditController::class, 'delete'])->name('policy.delete');
    //mobile
    Route::get('/mobile_view/{id}', [EditController::class, 'mobile_policy'])->name('mobile_policy');


    //Mervhant Category routes
    Route::get('/merchant_category', [MerchantCategory::class, 'merchant_category'])->name('merchant_category');
    Route::post('/create_merchant_category', [MerchantCategory::class, 'create_merchant_category'])->name('create_merchant_category');
    Route::get('/new_merchant_category', [MerchantCategory::class, 'merchant_category_new'])->name('merchant_category_new');
});

// /auth/google/call-back

Route::get('auth/{provider}', [SocialLoginController::class, 'redirectToProvider']);
Route::get('auth/{provider}/call-back', [SocialLoginController::class, 'handleProviderCallback']);




require __DIR__ . '/auth.php';

// 