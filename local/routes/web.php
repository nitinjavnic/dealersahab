<?php

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




/*Route::get('/index', 'CommonController@home');
Route::get('/', 'CommonController@home');*/





Route::get('/', 'IndexController@sangvish_index');
Route::get('/index', 'IndexController@sangvish_index');
Route::get('/blogList', 'Admin\BlogController@blogList');
Route::get('/readmore/{id}','Admin\BlogController@readmore');
Route::get('/post', 'PostController@formView');
Route::get('/contactseller/{id}/{user_id}', 'PostController@contactseller');
Route::get('/delete_query/{id}','PostController@sangvish_destroy');
Route::get('/buyer_query', 'PostController@buyer_query');
Route::post('/save_post', ['as'=>'save_post','uses'=>'PostController@save']);
Route::post('/save_query', ['as'=>'save_query','uses'=>'PostController@save_query']);
Route::get('/showinquery', ['as'=>'showinquery','uses'=>'PostController@showinquery']);


Route::get('searchajax',array('as'=>'searchajax','uses'=>'IndexController@sangvish_autoComplete'));
Route::get('searchlocation',array('as'=>'searchlocation','uses'=>'IndexController@searchlocation'));
Route::get('getsubservices',array('as'=>'getsubservices','uses'=>'GetsubserviceController@getsubservices'));
Route::get('supercategoryfilter',array('as'=>'supercategoryfilter','uses'=>'GetsubserviceController@supercategory'));
Route::get('filter',array('as'=>'filter','uses'=>'GetsubserviceController@filter'));
Route::get('productstate',array('as'=>'productstate','uses'=>'GetsubserviceController@productstate'));
Route::get('productcity',array('as'=>'productcity','uses'=>'GetsubserviceController@productcity'));
Route::get('shoppincode',array('as'=>'shoppincode','uses'=>'GetsubserviceController@shoppincode'));
Route::get('brandProduct',array('as'=>'brandProduct','uses'=>'GetsubserviceController@brandProduct'));
Route::get('subcategoryfilter',array('as'=>'subcategoryfilter','uses'=>'GetsubserviceController@subcategoryfilter'));
Route::get('getallCategory',array('as'=>'getallCategory','uses'=>'GetsubserviceController@getallCategory'));
Route::get('getsuballCategory',array('as'=>'getsuballCategory','uses'=>'GetsubserviceController@getsuballCategory'));
Route::get('getseller',array('as'=>'getseller','uses'=>'GetsubserviceController@getseller'));
Route::get('getproduct',array('as'=>'getproduct','uses'=>'GetsubserviceController@productCategory'));
Route::post('sellerdata',array('as'=>'sellerdata','uses'=>'GetsubserviceController@sellerdata'));
Route::get('deleteContact/{id}',array('as'=>'deleteContact','uses'=>'GetsubserviceController@deleteContact'));


Route::get('dateavailable/{val}',array('as'=>'dateavailable','uses'=>'BookingController@dateavailable'));

Route::post('pinned',array('as'=>'pinned','uses'=>'GetsubserviceController@pinnedseller'));
Route::get('findRole',array('as'=>'findRole','uses'=>'GetsubserviceController@findRole'));


Route::get('/logout', 'DashboardController@sangvish_logout');
Route::get('/delete-account', 'DashboardController@sangvish_deleteaccount');
Route::post('/dashboard', ['as'=>'dashboard','uses'=>'DashboardController@sangvish_edituserdata']);

Route::get('/shop', 'ShopController@sangvish_viewshop');

Route::get('/addshop', 'ShopController@sangvish_addshop');

Route::get('/editshop', 'ShopController@sangvish_editshop');

Route::get('productDetail/{id}/{shop_id}',array('as'=>'productDetail','uses'=>'GetsubserviceController@productDetail'));

Route::get('download/{id}',array('as'=>'download','uses'=>'GetsubserviceController@download'));




Route::get('/business', 'BusinessController@sangvish_editshop');

Route::post('/editshop', ['as'=>'editshop','uses'=>'ShopController@sangvish_savedata']);

Route::post('/addshop', ['as'=>'addshop','uses'=>'ShopController@sangvish_savedata']);
Route::post('/addbusiness', ['as'=>'addbusiness','uses'=>'BusinessController@sangvish_savedata']);



Route::get('/vendor/{id}', 'VendorController@sangvish_showpage');
Route::post('/vendor', ['as'=>'vendor','uses'=>'VendorController@sangvish_savedata']);




Route::get('/booking/{shop_id}/{product_id}/{userid}', 'BookingController@sangvish_showpage');




Route::get('/booking/', 'BookingController@contactSeller');



Route::post('/booking', ['as'=>'booking','uses'=>'BookingController@sangvish_savedata']);


Route::get('/booking_info', 'BookinginfoController@sangvish_viewbook');

Route::post('/booking_info', ['as'=>'booking_info','uses'=>'PaymentController@sangvish_showpage']);

Route::get('/payment/{sum_val}/{admin_email}', 'PaymentController@sangvish_showpage');


Route::get('/success/{cid}', 'SuccessController@sangvish_success');
Route::post('/stripe-success', ['as'=>'stripe-success','uses'=>'StripeController@sangvish_stripe']);



Route::get('/payu_failed/{cid}', 'CancelController@sangvish_payu_failed');

/*Route::post('payu_failed/{cid}', function () {


	return redirect('payu_failed/{cid}');
});*/


Route::post('payu_failed/{cid}', function($cid) {


    return redirect('payu_failed/'.$cid);
});



Route::get('/payu_success/{cid}/{txtid}', 'SuccessController@sangvish_payu_success');

Route::post('payu_success/{cid}/{txtid}', function($cid,$txtid) {


    return redirect('payu_success/'.$cid.'/'.$txtid);
});


Route::get('/cancel', 'CancelController@sangvish_showpage');

Route::get('/myorder', 'MyorderController@sangvish_showpage');

Route::get('/myorder/{id}','MyorderController@sangvish_destroy');


Route::get('/my_bookings', 'MybookingsController@sangvish_showpage');


Route::post('/my_bookings', ['as'=>'my_bookings','uses'=>'MybookingsController@sangvish_savedata']);


Route::get('/wallet', 'WalletController@sangvish_showpage');

Route::post('/wallet', ['as'=>'wallet','uses'=>'WalletController@sangvish_savedata']);


Auth::routes();


Route::get('/about','PageController@sangvish_about');

Route::get('/404','PageController@sangvish_404');


Route::get('/how-it-works','PageController@sangvish_howit');

Route::get('/safety','PageController@sangvish_safety');

Route::get('/service-guide','PageController@sangvish_guide');

Route::get('/how-to-pages','PageController@sangvish_topages');


Route::get('/success-stories','PageController@sangvish_stories');


Route::get('/terms-conditions','PageController@sangvish_terms');

Route::get('/privacy-policy','PageController@sangvish_privacy');

Route::get('/contact','PageController@sangvish_contact');

Route::post('/contact', ['as'=>'contact','uses'=>'PageController@sangvish_mailsend']);


Route::get('/services','ServicesController@sangvish_index');
Route::get('/pinnedseller','PinnedController@sangvish_index');
Route::get('/deletepinned/{id}','PinnedController@sangvish_destroy');
Route::get('/services/{id}','ServicesController@sangvish_editdata');

Route::post('/services', ['as'=>'services','uses'=>'ServicesController@sangvish_savedata']);
Route::get('/services/{did}/delete','ServicesController@sangvish_destroy');


Route::get('/gallery','GalleryController@sangvish_index');
Route::post('/gallery', ['as'=>'gallery','uses'=>'GalleryController@sangvish_savedata']);
Route::get('/gallery/{id}','GalleryController@sangvish_editdata');
Route::get('/gallery/{did}/delete','GalleryController@sangvish_destroy');


Route::get('/search','SearchController@sangvish_view');

Route::get('/search/{id}','SearchController@sangvish_homeindex');

Route::post('/search', ['as'=>'search','uses'=>'SearchController@sangvish_index']);
Route::get('/shopsearch','SearchController@sangvish_view');
Route::post('/shopsearch', ['as'=>'shopsearch','uses'=>'SearchController@sangvish_search']);



Route::get('/subservices','SubservicesController@sangvish_index');

Route::get('/subservices/{id}','SubservicesController@sangvish_servicefind');


/* Route::group(['namespace' => 'Admin', 'middleware' => 'admin'], function() {*/

Route::group(['middleware' => 'admin'], function() {

    Route::get('/admin','Admin\DashboardController@index');
    Route::get('/admin/requrement','Admin\RequirementController@index');
    Route::get('/admin/seller_req','Admin\RequirementController@seller_req');
    Route::get('/admin/index','Admin\DashboardController@index');
    Route::get('/admin/email/{id}','Admin\EmailController@email');

    /* user */
    Route::get('/admin/users','Admin\UsersController@index');
    Route::get('/admin/subadmin','Admin\SubadminController@index');
    Route::get('/admin/vendors','Admin\VendorsController@index');
    Route::get('/admin/adduser','Admin\AdduserController@formview');
    Route::get('/admin/addsubadmin','Admin\AddsubadminController@formview');
    Route::post('/admin/adduser', ['as'=>'admin.adduser','uses'=>'Admin\AdduserController@adduserdata']);
    Route::post('/admin/addsubadmin', ['as'=>'admin.addsubadmin','uses'=>'Admin\AddsubadminController@addsubuserdata']);
    Route::post('/admin/addemail', ['as'=>'admin.addemail','uses'=>'Admin\EmailController@addemail']);

    Route::get('/admin/users/{id}','Admin\UsersController@destroy');
    Route::get('/admin/edituser/{id}','Admin\EdituserController@showform');
    Route::post('/admin/edituser', ['as'=>'admin.edituser','uses'=>'Admin\EdituserController@edituserdata']);
    /* end user */


    /* services */
    Route::get('/admin/services','Admin\ServicesController@index');
    Route::get('/admin/blog','Admin\BlogController@index');
    Route::get('/admin/addservice','Admin\AddserviceController@formview');
    Route::get('/admin/addblog','Admin\AddblogController@formview');
    Route::post('/admin/addservice', ['as'=>'admin.addservice','uses'=>'Admin\AddserviceController@addservicedata']);
    Route::post('/admin/addblog', ['as'=>'admin.addblog','uses'=>'Admin\AddblogController@addblogedata']);
    Route::get('/admin/services/{id}','Admin\ServicesController@destroy');
    Route::get('/admin/blog/{id}','Admin\BlogController@destroy');
    Route::get('/admin/editservice/{id}','Admin\EditserviceController@showform');
    Route::get('/admin/editblog/{id}','Admin\EditblogController@showform');
    Route::get('/admin/activeblog/{id}','Admin\EditblogController@activeblog');
    Route::get('/admin/activeshop/{id}','Admin\ShopController@activeshop');
    Route::get('/admin/activeservices/{id}','Admin\ServicesController@activeservices');
    Route::get('/admin/activetestmonial/{id}','Admin\EdittestimonialController@activetestmonial');
    Route::post('/admin/editservice', ['as'=>'admin.editservice','uses'=>'Admin\EditserviceController@editservicedata']);
    Route::post('/admin/editblog', ['as'=>'admin.editblog','uses'=>'Admin\EditblogController@editblogedata']);

    /* end services */


    /* sub services */

    Route::get('/admin/subservices','Admin\SubservicesController@index');
    Route::get('/admin/supersubservices','Admin\SupersubController@index');
    Route::get('/admin/addsubservice','Admin\AddsubserviceController@formview');
    Route::get('/admin/superservices','Admin\AddsupersubserviceController@formview');
    Route::get('/admin/addsubservice','Admin\AddsubserviceController@getservice');
    Route::get('/admin/superservices','Admin\AddsupersubserviceController@getservice');
    Route::post('/admin/addsubservice', ['as'=>'admin.addsubservice','uses'=>'Admin\AddsubserviceController@addsubservicedata']);
    Route::post('/admin/addsupersubservice', ['as'=>'admin.addsupersubservice','uses'=>'Admin\AddsupersubserviceController@addsubservicedata']);
    Route::get('/admin/subservices/{id}','Admin\SubservicesController@destroy');
    Route::get('/admin/supersubservices/{id}','Admin\SupersubController@destroy');



    Route::get('/admin/editsubservice/{id}','Admin\EditsubserviceController@edit');
    Route::get('/admin/editsupersubservice/{id}','Admin\EditsupersubserviceController@edit');

    Route::post('/admin/editsubservice', ['as'=>'admin.editsubservice','uses'=>'Admin\EditsubserviceController@editsubservicedata']);
    Route::post('/admin/editsupersubservice/', ['as'=>'admin.editsupersubservice','uses'=>'Admin\EditsupersubserviceController@editsupersubservicedata']);
    /* end sub services */



    /* Testimonials */

    Route::get('/admin/testimonials','Admin\TestimonialsController@index');
    Route::get('/admin/add-testimonial','Admin\AddtestimonialController@formview');
    Route::post('/admin/add-testimonial', ['as'=>'admin.add-testimonial','uses'=>'Admin\AddtestimonialController@addtestimonialdata']);
    Route::get('/admin/testimonials/{id}','Admin\TestimonialsController@destroy');
    Route::get('/admin/edit-testimonial/{id}','Admin\EdittestimonialController@showform');
    Route::post('/admin/edit-testimonial', ['as'=>'admin.edit-testimonial','uses'=>'Admin\EdittestimonialController@testimonialdata']);


    /* end Testimonials */


    /* pages */

    Route::get('/admin/pages','Admin\PagesController@index');
    Route::get('/admin/edit-page/{id}','Admin\PagesController@showform');
    Route::post('/admin/edit-page', ['as'=>'admin.edit-page','uses'=>'Admin\PagesController@pagedata']);

    /* end pages */



    /* start settings */


    Route::get('/admin/settings','Admin\SettingsController@showform');
    Route::post('/admin/settings', ['as'=>'admin.settings','uses'=>'Admin\SettingsController@editsettings']);

    /* end settings */


    /* start shop */

    Route::get('/admin/shop','Admin\ShopController@index');
    Route::get('/admin/edit-shop/{id}','Admin\ShopController@showform');
    Route::post('/admin/edit-shop', ['as'=>'admin.edit-shop','uses'=>'Admin\ShopController@savedata']);
    Route::get('/admin/shop/{id}','Admin\ShopController@destroy');


    /* end shop */



    /* booking history */

    Route::get('/admin/booking','Admin\BookingController@index');
    Route::get('/admin/booking/{id}','Admin\BookingController@destroy');

    /*  end booking history */


    /* withdraw */

    Route::get('/admin/pending_withdraw','Admin\WithdrawController@index');
    Route::get('/admin/pending_withdraw/{id}','Admin\WithdrawController@update');
    Route::get('/admin/completed_withdraw','Admin\WithdrawController@doneindex');

    /* end withdraw */



});


Route::group(['middleware' => 'web'], function (){

    Route::get('/dashboard', 'DashboardController@index');
    Route::get('becomeseller',array('as'=>'becomeseller','uses'=>'GetsubserviceController@becomeseller'));


});




