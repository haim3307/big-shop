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
# Client
Route::get('/', 'PagesController@home');
Route::get('home', 'PagesController@home')->name('home');
Route::get('home/tags/{tagName}', 'HomeController@byTag');
Route::get('about', 'PagesController@about');
Route::get('contact-us', 'PagesController@contact');
Route::post('contact-us', 'PagesController@contactPost');


Route::get('sale', 'PagesController@sale');
Route::get('deals', 'PagesController@deals');

Route::prefix('user')->middleware('auth')->group(function () {
    Route::get('/', 'UserController@index');
    Route::post('/', 'UserController@updateInfoPost');
    Route::get('/profile', 'UserController@index');
    Route::post('/profile', 'UserController@updateInfoPost');

    Route::get('/orders', 'UserController@orders');
    Route::get('/wishlist', 'WishListController@index');
    Route::post('/wishlist', 'WishListController@store');
    Route::delete('/wishlist/{wishItem}', 'WishListController@destroy');

});

Route::prefix('shop')->group(function () {
    Route::get('/', 'ShopController@index');
    Route::get('{mainCategory}/{itemTitle}', 'ShopController@productPage');
    Route::get('{category}/{page?}', 'ShopController@show');

});

# Blog
Route::prefix('blog')->middleware('auth')->group(function () {
    Route::get('/', 'BlogController@index');
    Route::get('/post/{post}', 'BlogController@show');
});

# CMS
Route::prefix('cms')->middleware('cms')->group(function () {
    Route::get('/', 'CMS\CMSControlller@index')->name('cms.home');

    ## Tag
/*    Route::get('tag', 'CMS\CMSTagController@index');
    Route::get('tag/create', 'CMS\CMSTagController@create');
    Route::post('tag', 'CMS\CMSTagController@store');
    Route::delete('tag/{tagId}', 'CMS\CMSTagController@delete');
    Route::put('tag/{id}', 'CMS\CMSTagController@update');*/
    Route::resource('tag', 'CMS\CMSTagController');

    ## Category
    Route::get('category', 'CMS\CMSCategoryController@index');
    Route::post('category', 'CMS\CMSCategoryController@store');
    Route::get('category/create', 'CMS\CMSCategoryController@create');
    Route::get('category/{categoryUrl}', 'CMS\CMSCategoryController@show');
    Route::get('category/{id}/edit', 'CMS\CMSCategoryController@edit');
    Route::put('category/{id}', 'CMS\CMSCategoryController@update');
    Route::delete('category/{categoryId}', 'CMS\CMSCategoryController@delete');

    ## Product
    Route::get('product', 'CMS\CMSProductController@index');
    Route::post('product', 'CMS\CMSProductController@store');
    Route::get('product/create', 'CMS\CMSProductController@create');
    Route::get('product/{productUrl}', 'CMS\CMSProductController@show');
    Route::get('product/{id}/edit', 'CMS\CMSProductController@edit');
    Route::put('product/{id}', 'CMS\CMSProductController@update');
    Route::delete('product/{productId}', 'CMS\CMSProductController@delete');

    ## Page
    Route::get('page/all', 'CMS\CMSPagesController@index');
    Route::get('page/', 'CMS\CMSPagesController@index');
    Route::post('page/', 'CMS\CMSPagesController@store');
    Route::get('page/create', 'CMS\CMSPagesController@create');
    Route::get('page/home/{pageList?}', 'CMS\CMSPagesController@home');
    Route::get('page/deals/{pageList?}', 'CMS\CMSPagesController@deals');
    Route::get('page/about/{pageList?}', 'CMS\CMSPagesController@about');
    Route::get('page/shop/{pageList?}', 'CMS\CMSPagesController@shop');
    Route::post('page/shop/', 'CMS\CMSPagesController@shop');
    Route::get('page/sale/{pageList?}', 'CMS\CMSPagesController@sale');
    Route::get('page/contact-us/{pageList?}', 'CMS\CMSPagesController@contactUs');
    Route::post('page/contact-us/', 'CMS\CMSPagesController@contactUs');

    ## Page - Part 2
    Route::patch('page/{page}/list/{pageList}', 'CMS\CMSPagesController@updatePageListItem');
    Route::patch('page/{customPage}/{listUrl}/order','CMS\CMSPagesController@updateOrder');
    Route::post('page/{page?}/{pageList}/{itemId}/{entity}', 'CMS\CMSPagesController@storePageListItem');
    Route::post('page/{page}/{pageList}', 'CMS\CMSPagesController@createStorePageItem');

    Route::put('page/{customPage}/edit', 'CMS\CMSPagesController@update');
    Route::put('page/{customPage}', 'CMS\CMSPagesController@update');

    Route::delete('page/list/{listItem}', 'CMS\CMSPagesController@deletePageListItem');
    Route::delete('page/{pageID}', 'CMS\CMSPagesController@delete');

    Route::get('page/{page}/{pageList}/{listItem}/edit', 'CMS\CMSPagesController@editPageListItem');
    Route::get('page/{page}/{pageList}/create', 'CMS\CMSPagesController@createPageListItem');
    Route::get('page/{customPage}/{pageList?}', 'CMS\CMSPagesController@custom');
    Route::get('page/{customPage}/edit', 'CMS\CMSPagesController@custom');

    ## Link
    Route::resource('link', 'CMS\CMSLinksController');

    ## Menus
    Route::get('menus', 'CMS\CMSMenusController@index');
    Route::post('menus/{menu}/add-item', 'CMS\CMSMenusController@addItem');
    Route::post('menus', 'CMS\CMSMenusController@store');
    Route::delete('menus/{id}', 'CMS\CMSMenusController@delete');
    Route::put('menus/{id}', 'CMS\CMSMenusController@update');

    ## User
/*    Route::get('user', 'CMS\CMSUsersController@index')->middleware('cms.admin');
    Route::get('user', 'CMS\CMSUsersController@index');
    */
    Route::patch('user/{user}/role', 'CMS\CMSUsersController@updateRole')->middleware('cms.admin');
    Route::resource('user','CMS\CMSUsersController')->middleware('cms.admin');
    Route::get('/api/entities/{listUrl}/{toSearch}', 'AjaxAutoCompleteController@getByListType');

    ## Order
    Route::get('order', 'CMS\CMSOrdersController@index')->middleware('cms.admin');

});;


/*Route::get('/api/categories/{categoryId}', function ($categoryId) {
    $category = \App\Category::find($categoryId);
    return ['selected' => $category, 'sub_categories' => $subCategories];
});*/

# Cart
Route::get('cart', 'CartController@index');

Route::prefix('cart')->middleware('auth')->group(function (){
    Route::post('/', 'CartController@storeOrderList');
});

Auth::routes();


Route::get('/api/tags',  'AjaxAutoCompleteController@getTags');
Route::get('/api/entities/{search}', 'AjaxAutoCompleteController@searchEntities');

Route::get('/{page}','PagesController@custom');