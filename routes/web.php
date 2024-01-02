<?php

use App\Livewire\AdminLogin;
use App\Livewire\MakeAdmin;
use App\Livewire\SearchProducts;
use Illuminate\Support\Facades\Route;
use App\Livewire\Home;
use App\Livewire\About;
use App\Livewire\Shop;
use App\Livewire\Contact;
use App\Livewire\Signup;
use App\Livewire\Login;
use App\Livewire\AdminDashboard;
use App\Livewire\AddCategory;
use App\Livewire\AddProduct;
use App\Livewire\ProductDetails;
use App\Livewire\ProductsWithCategory;
use App\Livewire\Checkout;
use App\Livewire\UserAccount;
use App\Livewire\AdminOrder;
use App\Livewire\AdminOrderItems;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', Home::class)->name('home');
Route::get('/about', About::class);
Route::get('/searchproducts', SearchProducts::class);
Route::get('/shop', Shop::class);
Route::get('/contact', Contact::class);
Route::get('/signup', Signup::class);
Route::get('/login', Login::class);
Route::get('/adminlogin', AdminLogin::class);
Route::get('/makeuseradmin', MakeAdmin::class);
Route::get('/admin', AdminDashboard::class);
Route::get('/addcategory', AddCategory::class);
Route::get('/addproduct', AddProduct::class);
Route::get('/myaccount', UserAccount::class);
Route::get('/myaccount', UserAccount::class);
Route::get('/adminorders', AdminOrder::class);
Route::get('/adminorderitems', AdminOrderItems::class);
Route::get('/checkout', Checkout::class);
Route::get('/productdetails', ProductDetails::class)->name('productdetails');
Route::get('/products-with-category', ProductsWithCategory::class)->name('products-with-category');
