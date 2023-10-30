<?php
use App\Http\Controllers;
use App\Http\Controllers\Frontend\DirectoryController;
use App\Http\Controllers\Frontend\FrontendController;
use Illuminate\Support\Facades\Route;

  Route::redirect('admin', 'admin/login');
  Route::post('the/genius/ocean/2441139', 'Frontend\FrontendController@subscription');
  Route::get('finalize', 'Frontend\FrontendController@finalize');

  Route::get('/under-maintenance', 'Frontend\FrontendController@maintenance')->name('front-maintenance');
  Route::group(['middleware'=>'maintenance'],function(){
    Route::get('/', [FrontendController::class,'index'])->name('front.index');

    Route::get('/listing', [DirectoryController::class,'listing'])->name('front.listing');
    Route::get('/listing/{slug}', [DirectoryController::class,'listingDetails'])->name('front.listing.details');
    Route::post('/listing/wishlist', [DirectoryController::class,'wishlist'])->name('front.property.wishlist');
    Route::get('/author/{username}', [DirectoryController::class,'authorDetails'])->name('front.author.details');
    Route::post('/listing-enquiry', [DirectoryController::class,'listingEnquiry'])->name('front.listing.enquiry');
    Route::post('/listing/review', [DirectoryController::class,'review'])->name('front.listing.review');
    Route::post('/follow', [DirectoryController::class,'follow'])->name('front.property.follow');

    Route::get('blogs', [FrontendController::class,'blog'])->name('front.blog');
    Route::get('blog/{slug}', [FrontendController::class,'blogdetails'])->name('blog.details');
    Route::get('/blog-search', [FrontendController::class,'blogsearch'])->name('front.blogsearch');
    Route::get('/blog/category/{slug}', [FrontendController::class,'blogcategory'])->name('front.blogcategory');
    Route::get('/blog/tag/{slug}', [FrontendController::class,'blogtags'])->name('front.blogtags');
    Route::get('/blog/archive/{slug}', [FrontendController::class,'blogarchive'])->name('front.blogarchive');

    Route::get('/pricing-plans', [FrontendController::class,'plans'])->name('front.plans');

    Route::get('/contact', [FrontendController::class,'contact'])->name('front.contact');
    Route::post('/contact', [FrontendController::class,'contactemail'])->name('front.contact.submit');
    Route::get('/faq', [FrontendController::class,'faq'])->name('front.faq');
    Route::get('/{slug}', [FrontendController::class,'page'])->name('front.page');
    Route::post('/subscriber', [FrontendController::class,'subscriber'])->name('front.subscriber');

    Route::get('/currency/{id}', [FrontendController::class,'currency'])->name('front.currency');
    Route::get('/language/{id}', [FrontendController::class,'language'])->name('front.language');

    Route::get('/signup-session/flus', [FrontendController::class,'signupSession'])->name('front.signup.session');

});
Route::get('/profit/send', [FrontendController::class,'profitSend'])->name('front.profit.send');

