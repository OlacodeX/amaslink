<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

// Implement API login for Admin right here
// Set the auth:guard in web

// Route::get('/', function () {
//     return view('home');
// });
// Route::get('home', [HomeController::class, '\App\Http\Controllers\index']);

// Auth::routes();

Route::get('/', '\App\Http\Controllers\PagesController@index'); 
Route::get('/favorites', '\App\Http\Controllers\PagesController@favorites')->middleware('auth');
Route::get('/adintro', '\App\Http\Controllers\PagesController@adintro')->middleware('auth');
Route::get('/auctionintro', '\App\Http\Controllers\PagesController@auctionintro')->middleware('auth');
Route::get('/alllistings', '\App\Http\Controllers\PagesController@listings');
Route::get('/alluctions', '\App\Http\Controllers\PagesController@auctions');
Route::get('/listinginner', '\App\Http\Controllers\PagesController@listinginner');
Route::get('/help', '\App\Http\Controllers\PagesController@help');
Route::post('/ad_packs', '\App\Http\Controllers\PagesController@ad_packs');
Route::get('/ad_packs_free', '\App\Http\Controllers\PagesController@ad_packs_free');
Route::get('/categories', '\App\Http\Controllers\PagesController@categories');
Route::get('/category_result', '\App\Http\Controllers\PagesController@category');
Route::get('/ppolicy', '\App\Http\Controllers\PagesController@ppolicy');
Route::post('/auction_item', '\App\Http\Controllers\PagesController@auction');
Route::get('/contact', '\App\Http\Controllers\PagesController@contact');
Route::post('/store', '\App\Http\Controllers\ContactMailController@store');
Route::post('/createmessage', '\App\Http\Controllers\MessagingController@createmessage');
Route::get('/search_result', '\App\Http\Controllers\PagesController@search_result')->name('search_result');
// Route::post('/login', '\App\Http\Controllers\Common\LoginController@login')->name('loginAction');

Route::post('count', '\App\Http\Controllers\PostsController@updatecount');
//Route::post('bookmark', '\App\Http\Controllers\PostsController@bookmark');
Route::post('bookmark', '\App\Http\Controllers\ListingsController@bookmark');
Route::post('removebookmark', '\App\Http\Controllers\ListingsController@removebookmark');
Route::post('store_paid', '\App\Http\Controllers\ListingsController@store_paid');
Route::post('store_paid_auction', '\App\Http\Controllers\ListingsController@store_paid_auction');
Route::get('removeimg', '\App\Http\Controllers\ListingsController@removeimg');
Route::post('store_paid_free', '\App\Http\Controllers\ListingsController@store_paid_free');
Route::post('edit_t', '\App\Http\Controllers\ListingsController@edit_t');
Route::resource('blog', '\App\Http\Controllers\PostsController');
Route::resource('announcements', '\App\Http\Controllers\AnnouncementsController');
Route::resource('listings', '\App\Http\Controllers\ListingsController');
Route::post('show_f', '\App\Http\Controllers\ListingsController@show_f');
Route::post('delist', '\App\Http\Controllers\ListingsController@delist');
Route::post('/boost', '\App\Http\Controllers\ListingsController@boost');
Route::resource('auctions', '\App\Http\Controllers\AuctionsController');
Route::post('update_bid', '\App\Http\Controllers\AuctionsController@update_bid');
Route::resource('profile', '\App\Http\Controllers\UpdateuserController');
Route::post('/profile_free', '\App\Http\Controllers\UpdateuserController@show_free');
Route::resource('communities', '\App\Http\Controllers\ForumController');
Route::post('like', '\App\Http\Controllers\ForumController@like');
Route::resource('newsletter', '\App\Http\Controllers\NewsletterController');
Route::resource('chat', '\App\Http\Controllers\MessagingController');
Route::get('chatunread', '\App\Http\Controllers\MessagingController@unread');
Route::get('chatread', '\App\Http\Controllers\MessagingController@read');
Route::get('chatadmin', '\App\Http\Controllers\MessagingController@indexadmin')->middleware('role:ROLE_SUPERADMIN');
Route::post('/store_reply', '\App\Http\Controllers\MessagingController@store_reply');
//Route::resource('chatreply', '\App\Http\Controllers\MessagingController');

Auth::routes();

Route::get('/dashboard', '\App\Http\Controllers\HomeController@index');
Route::get('/pending', '\App\Http\Controllers\HomeController@pending');
Route::get('/approved', '\App\Http\Controllers\HomeController@approved');
Route::get('/showbids', '\App\Http\Controllers\HomeController@show');
Route::post('accept_bid', '\App\Http\Controllers\HomeController@accept_bid');
Route::get('/auctions', '\App\Http\Controllers\HomeController@auctions');
Route::get('/all', '\App\Http\Controllers\HomeController@all');
Route::get('/adminall', '\App\Http\Controllers\HomeController@alladmin')->middleware('role:ROLE_SUPERADMIN');
Route::get('/superadmin', '\App\Http\Controllers\SuperadminController@index');
Route::get('/new_users_list', '\App\Http\Controllers\SuperadminController@new_users_list');
Route::get('/users_list', '\App\Http\Controllers\SuperadminController@users_list');
Route::get('/all_listings', '\App\Http\Controllers\SuperadminController@all_listings');
Route::get('/all_approved', '\App\Http\Controllers\SuperadminController@all_approved');
Route::get('/admin_pending', '\App\Http\Controllers\SuperadminController@admin_pending');
Route::get('/adminpending', '\App\Http\Controllers\SuperadminController@adminpending');
Route::get('/adminapproved', '\App\Http\Controllers\SuperadminController@adminapproved');
Route::get('/adminauctions', '\App\Http\Controllers\SuperadminController@adminauctions');
Route::post('update', '\App\Http\Controllers\SuperadminController@update');
Route::post('/send_bc', '\App\Http\Controllers\SuperadminController@send_bc');
Route::post('/send_external_bc', '\App\Http\Controllers\SuperadminController@send_external');
Route::get('/custom_bc', '\App\Http\Controllers\SuperadminController@custom_nl');
Route::get('/adminposts', '\App\Http\Controllers\SuperadminController@adminposts');
Route::get('/admintopics', '\App\Http\Controllers\SuperadminController@topics');
Route::get('/payments', '\App\Http\Controllers\SuperadminController@payments');
Route::post('/newsletter', '\App\Http\Controllers\SuperadminController@emails');
Route::get('/subscribed_users', '\App\Http\Controllers\SuperadminController@subscribed_users');
Route::get('/admin', '\App\Http\Controllers\AdminController@index');
//Route::post('/comments/{id}/act', '\App\Http\Controllers\CommentsController@actOnComment');
Route::resource('comments', '\App\Http\Controllers\CommentsController');




//PayPal 
// Route::post('payment-status',array('as'=>'payment.status','uses'=>'PaymentController@paymentInfo'));
// Route::post('payment',array('as'=>'payment','uses'=>'PaymentController@payment'));
// Route::get('payment-cancel', function () {
//    return 'Payment has been canceled';
// });


Route::post('payment', '\App\Http\Controllers\PaymentController@index');
Route::post('book', '\App\Http\Controllers\PaymentController@book');
Route::post('charge', '\App\Http\Controllers\PaymentController@charge');
// Route::post('payWithpaypal', '\App\Http\Controllers\PaymentController@payWithpaypal');
Route::get('paymentsuccess', '\App\Http\Controllers\PaymentController@payment_success');
Route::get('paymenterror', '\App\Http\Controllers\PaymentController@payment_error');
Route::post('auction', '\App\Http\Controllers\PaymentController@auction');
Route::get('paymentauctionsuccess', '\App\Http\Controllers\PaymentController@payment_auction_success');
Route::get('paymentauctionerror', '\App\Http\Controllers\PaymentController@payment_auction_error');
Route::post('charge_free', '\App\Http\Controllers\PaymentController@charge_free');
Route::get('paymentsuccessfree', '\App\Http\Controllers\PaymentController@payment_success_free');
Route::get('paymenterrorfree', '\App\Http\Controllers\PaymentController@payment_error_free');
Route::any('delete_user', '\App\Http\Controllers\SuperadminController@delete_user');


 // Clear application cache
 Route::get('/clear-cache', function() {
     \Artisan::call('cache:clear');
     return 'Application cache cleared';
 });

