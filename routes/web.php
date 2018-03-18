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






Route::prefix('/')->group(function (){
    Route::get('/', [
        'as' => 'home',
        'uses' => 'HomeController@getHome'
    ]);
    Route::get('/kind/{id_t}', [
        'as' => 'kind',
        'uses' => 'HomeController@getKind'
    ]);
    Route::get('/contact', function(){
        return view('front-end.pages.contact');
    });
    Route::post('/search', [
        'as' => 'search-product',
        'uses' => 'ProductController@search'
    ]);
    Route::get('/new-book',[
        'as' => 'new-book',
        'uses' => 'HomeController@getNewBooks'
    ]);
    Route::get('/bestseller',[
        'as' => 'best',
        'uses' => 'HomeController@getBestBooks'
    ]);
    Route::get('/product/{id_prd}', [
        'as' =>'product-detail',
        'uses' => 'HomeController@getProductDetail'
    ]);
    Route::get('/buy-product/{id}',[
        'as' => 'buy',
        'uses' => 'HomeController@getCart'
    ]);
    Route::get('/cart', [
        'as' => 'cart',
        'uses' => 'HomeController@showCart'
    ]);
    Route::get('/cart-delete/{id}',[
        'as' => 'cart-delete',
        'uses' => 'HomeController@deleteCart'
    ]);
    Route::get('/update-cart/{id}/{num}',[
        'as' =>'cart-update',
        'uses' => 'HomeController@updateCart'
    ]);
    Route::get('/customer/login', [
        'as' => 'cus-login',
        'uses' => 'CustomerController@login'
    ]);
    Route::get('/customer/register', [
        'as' => 'cus-res',
        'uses' => 'CustomerController@register'
    ]);
    Route::post('/customer/login',[
        'as' => 'post-cus-login',
        'uses' => 'CustomerController@postlogin'
    ]);
    Route::post('/customer/register', [
        'as' => 'post-cus-register',
        'uses' => 'CustomerController@postregister'
    ]);
   
        Route::get('/customer/buy', [
            'as' => 'buy',
            'uses' => 'CustomerController@buy'
        ]);
        Route::get('/customer/buy-success',[
            'as' => 'buy-success',
            'uses' => 'CustomerController@buysuccess'
        ]);
  
    Route::get('/customer/logout', [
        'as' => 'logout',
        'uses' => 'CustomerController@logout'
    ]);
    Route::post('/customer/comment/{id}',[
        'as' => 'comment',
        'uses' => 'CustomerController@comment'
    ]);
    Route::post('/customer/contact',[
        'as' => 'contact',
        'uses' => 'CustomerController@contact'
    ]);
    Route::get('/cart-delete-all', [
        'uses' => 'CustomerController@destroyCart'
    ]);
    Route::get('/mail', function(){
        return view('front-end.pages.mail');
    });    
});

// ADMIN

Route::get('/login', [
    'as' => 'login',
    'uses'=>'LoginController@getLogin'
    ]
);
Route::post('/login', 'LoginController@postLogin');
Route::get('/logout', 'LoginController@getLogout');


Route::middleware('auth')->group(function () {
    Route::prefix('admin-ts')->group(function () {
        Route::get('/', [
            'as' => 'admin',
            'uses' => 'DashboardController@index'
        ]);
        Route::prefix('user')->group(function(){
            Route::get('/list', [
                'as' => 'list-user',
                'uses' => 'UserController@getListUser'
                ]);
            Route::get('/add', [
                'as' => 'add-user',
                'uses' => 'UserController@getAddUser'
            ]);
            Route::post('/add',[
                'as' => 'post-add-user',
                'uses' => 'UserController@postAddUser'
            ]);
            Route::get('/delete/{id}', [
                'as' => 'delete-user',
                'uses' => 'UserController@getDeleUser'
            ]);
            Route::get('/edit/{id}',[
                'as'=> 'edit-user',
                'uses' => 'UserController@getEditUser'
            ]);
            Route::post('/edit/{id}', [
                'as' => 'post-edit-user',
                'uses' => 'UserController@postEditUser'
            ]);
            Route::post('search',[
                'as' => 'search',
                'uses' => 'UserController@search'
            ]);
            Route::get('sort', [
                'as' => 'sort',
                'uses' => 'UserController@sort'
            ]);
        });
        Route::prefix('category')->group(function(){
            Route::get('/list', [
                'as' => 'list-category',
                'uses' => 'TypeController@getList'    
            ]);
            Route::get('/add',[
                'as' => 'add-category',
                'uses' => 'TypeController@getCate'
            ]);
            Route::post('/add',[
                'as' => 'post-category',
                'uses'=> 'TypeController@postCate'
            ]);
            Route::get('/delete/{id}',[
                'as' => 'delete-cate',
                'uses' => 'TypeController@getDele'
            ]);
            Route::get('/edit/{id}',[
                'as' => 'edit-cate',
                'uses' => 'TypeController@getEdit'
            ]);
            Route::post('/edit/{id}', [
                'as' => 'post-edit-cate',
                'uses' => 'TypeController@postEdit'
            ]);
        });
        Route::prefix('publish')->group(function(){
            Route::get('/list', [
                'as' => 'list-publish',
                'uses' => 'PublishController@getList'    
            ]);
            Route::get('/add',[
                'as' => 'add-publish',
                'uses' => 'PublishController@getPublish'
            ]);
            Route::post('/add',[
                'as' => 'post-publish',
                'uses'=> 'PublishController@postPublish'
            ]);
            Route::get('/delete/{id}',[
                'as' => 'delete-publish',
                'uses' => 'PublishController@getDele'
            ]);
            Route::get('/edit/{id}',[
                'as' => 'edit-publish',
                'uses' => 'PublishController@getEdit'
            ]);
            Route::post('/edit/{id}', [
                'as' => 'post-edit-publish',
                'uses' => 'PublishController@postEdit'
            ]);
        });
        Route::prefix('product')->group(function(){
            Route::get('/list', [
                'as' => 'list-product',
                'uses'=> 'ProductController@getListProduct'
            ]);
            Route::get('/add',[
                'as' => 'add-product',
                'uses' => 'ProductController@getAddProduct'    
            ]);
            Route::post('/add',[
                'as' => 'post-add-product',
                'uses' => 'ProductController@postAddProduct'
            ]);
            Route::get('/delete/{id_prd}', [
                'as' => 'delete-product',
                'uses' => 'ProductController@getDeleteProduct'
            ]);
            Route::get('/edit/{id_prd}', [
                'as' => 'edit-product',
                'uses' => 'ProductController@getEditProduct'
            ]);
            Route::post('/edit/{id_prd}',[
                'as' => 'post-edit-product',
                'uses' => 'ProductController@postEditProduct'
            ]);
            Route::post('/search', [
                'as' =>'search-product',
                'uses' => 'ProductController@searchProduct'
            ]);
        });
    });
});