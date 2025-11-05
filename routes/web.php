<?php
//insert Admin/MenuController
namespace App\Http\Controllers\Admin;


use Illuminate\Support\Facades\Route;



// Login route
Route::get('/admin/login', 'App\Http\Controllers\Admin\LoginController@showLoginForm')->name('admin.login');
Route::post('/admin/login', 'App\Http\Controllers\Admin\LoginController@login')->name('admin.login.submit');
Route::get('/admin/logout', 'App\Http\Controllers\Admin\LoginController@logout')->name('admin.logout');

//Project Admin Routes

// Wrap all admin routes with Auth middleware
Route::middleware(['auth'])->group(function () {

Route::get('/admin', function () {
    return view('admin.dashboard');
})->name('admin.dashboard'); 

// admin/menu route to menu controller index function
Route::get('/admin/menu', 'App\Http\Controllers\Admin\MenuController@index')->name('admin.menu');
Route ::get('/admin/menu/create/{$type}', 'App\Http\Controllers\Admin\MenuController@create')->name('admin.menu.create');
Route::post('/admin/menu/store', 'App\Http\Controllers\Admin\MenuController@store')->name('admin.menu.store');
Route::get('/admin/menu/{id}/edit', 'App\Http\Controllers\Admin\MenuController@edit')->name('admin.menu.edit');
//Route::put('/admin/menu/{id}', 'App\Http\Controllers\Admin\MenuController@update')->name('admin.menu.update');
Route::delete('/admin/menu/{id}', 'App\Http\Controllers\Admin\MenuController@destroy')->name('admin.menu.destroy');

// admin/footer menu routes
Route::get('/admin/footer-menu/{type}', 'App\Http\Controllers\Admin\MenuController@index')->name('admin.menu.footer');
Route::get('/admin/menu/create/{type}', 'App\Http\Controllers\Admin\MenuController@create')->name('admin.menu.footer.create');
Route::post('/admin/menu/store/{type}', 'App\Http\Controllers\Admin\MenuController@store')->name('admin.menu.footer.store');
Route::get('/admin/menu/{id}/edit/{type}', 'App\Http\Controllers\Admin\MenuController@edit')->name('admin.menu.footer.edit');
//Route::put('/admin/menu/{id}', 'App\Http\Controllers\Admin\MenuController@update')->name('admin.menu.update');
Route::delete('/admin/menu/{id}/{type}', 'App\Http\Controllers\Admin\MenuController@destroy')->name('admin.menu.footer.destroy');

// admin/language route to language controller index function
Route::get('/admin/language', 'App\Http\Controllers\Admin\LanguageController@index')->name('admin.language');
Route::get('/admin/language/create', 'App\Http\Controllers\Admin\LanguageController@create')->name('admin.language.create');
Route::post('/admin/language/store', 'App\Http\Controllers\Admin\LanguageController@store')->name('admin.language.store');
Route::get('/admin/language/{id}/edit', 'App\Http\Controllers\Admin\LanguageController@edit')->name('admin.language.edit');
Route::put('/admin/language/{id}', 'App\Http\Controllers\Admin\LanguageController@update')->name('admin.language.update');
Route::delete('/admin/language/{id}', 'App\Http\Controllers\Admin\LanguageController@destroy')->name('admin.language.destroy');

// admin/about route to about controller index function
Route::get('/admin/about', 'App\Http\Controllers\Admin\AboutController@index')->name('admin.about');
Route::get('/admin/about/create', 'App\Http\Controllers\Admin\AboutController@create')->name('admin.about.create');
Route::post('/admin/about/store', 'App\Http\Controllers\Admin\AboutController@store')->name('admin.about.store');
Route::get('/admin/about/edit', 'App\Http\Controllers\Admin\AboutController@edit')->name('admin.about.edit');
//Route::put('/admin/about/{id}', 'App\Http\Controllers\Admin\AboutController@update')->name('admin.about.update');
Route::delete('/admin/about/{id}', 'App\Http\Controllers\Admin\AboutController@destroy')->name('admin.about.destroy');

// admin/about/how_we_do route to how_we_do controller index function
Route::get('/admin/about/how_we_do', 'App\Http\Controllers\Admin\AboutController@howWeDoIndex')->name('admin.about.how_we_do');
Route::get('/admin/about/how_we_do/create', 'App\Http\Controllers\Admin\AboutController@howWeDoCreate')->name('admin.about.how_we_do.create');
Route::post('/admin/about/how_we_do/store', 'App\Http\Controllers\Admin\AboutController@howWeDoStore')->name('admin.about.how_we_do.store');
Route::get('/admin/about/how_we_do/{id}/edit', 'App\Http\Controllers\Admin\AboutController@howWeDoEdit')->name('admin.about.how_we_do.edit');
Route::post('/admin/about/how_we_do', 'App\Http\Controllers\Admin\AboutController@howWeDoUpdate')->name('admin.about.how_we_do.update');
Route::delete('/admin/about/how_we_do/{id}', 'App\Http\Controllers\Admin\AboutController@howWeDoDestroy')->name('admin.about.how_we_do.destroy');

// admin/about/what_we_do route to what_we_do controller index function
Route::get('/admin/about/what_we_do', 'App\Http\Controllers\Admin\AboutController@whatWeDoIndex')->name('admin.about.what_we_do');
Route::get('/admin/about/what_we_do/create', 'App\Http\Controllers\Admin\AboutController@whatWeDoCreate')->name('admin.about.what_we_do.create');
Route::post('/admin/about/what_we_do/store', 'App\Http\Controllers\Admin\AboutController@whatWeDoStore')->name('admin.about.what_we_do.store');
Route::get('/admin/about/what_we_do/{id}/edit', 'App\Http\Controllers\Admin\AboutController@whatWeDoEdit')->name('admin.about.what_we_do.edit');
Route::post('/admin/about/what_we_do', 'App\Http\Controllers\Admin\AboutController@whatWeDoUpdate')->name('admin.about.what_we_do.update');
Route::delete('/admin/about/what_we_do/{id}', 'App\Http\Controllers\Admin\AboutController@whatWeDoDestroy')->name('admin.about.what_we_do.destroy');

// admin/about/memberships urls
Route::get('/admin/about/memberships', 'App\Http\Controllers\Admin\AboutController@membershipsIndex')->name('admin.about.memberships');
Route::get('/admin/about/memberships/create', 'App\Http\Controllers\Admin\AboutController@membershipsCreate')->name('admin.about.memberships.create');
Route::post('/admin/about/memberships/store', 'App\Http\Controllers\Admin\AboutController@membershipsStore')->name('admin.about.memberships.store');
Route::get('/admin/about/memberships/{id}/edit', 'App\Http\Controllers\Admin\AboutController@membershipsEdit')->name('admin.about.memberships.edit');
Route::post('/admin/about/memberships', 'App\Http\Controllers\Admin\AboutController@membershipsUpdate')->name('admin.about.memberships.update');
Route::delete('/admin/about/memberships/{id}', 'App\Http\Controllers\Admin\AboutController@membershipsDestroy')->name('admin.about.memberships.destroy');

// admin/about/politics urls
Route::get('/admin/about/politics', 'App\Http\Controllers\Admin\AboutController@politicsIndex')->name('admin.about.politics');
Route::get('/admin/about/politics/create', 'App\Http\Controllers\Admin\AboutController@politicsCreate')->name('admin.about.politics.create');
Route::post('/admin/about/politics/store', 'App\Http\Controllers\Admin\AboutController@politicsStore')->name('admin.about.politics.store');
Route::get('/admin/about/politics/{id}/edit', 'App\Http\Controllers\Admin\AboutController@politicsEdit')->name('admin.about.politics.edit');
Route::post('/admin/about/politics', 'App\Http\Controllers\Admin\AboutController@politicsUpdate')->name('admin.about.politics.update');
Route::delete('/admin/about/politics/{id}', 'App\Http\Controllers\Admin\AboutController@politicsDestroy')->name('admin.about.politics.destroy');

// blog routes
Route::get('/admin/blog', 'App\Http\Controllers\Admin\BlogController@index')->name('admin.blog');
Route::get('/admin/blog/create', 'App\Http\Controllers\Admin\BlogController@create')->name('admin.blog.create');
Route::post('/admin/blog/store', 'App\Http\Controllers\Admin\BlogController@store')->name('admin.blog.store');
Route::get('/admin/blog/{id}/edit', 'App\Http\Controllers\Admin\BlogController@edit')->name('admin.blog.edit');
//Route::post('/admin/blog/{id}', 'App\Http\Controllers\Admin\BlogController@update')->name('admin.blog.update');
Route::delete('/admin/blog/{id}', 'App\Http\Controllers\Admin\BlogController@destroy')->name('admin.blog.destroy');

// blog slider routes
Route::get('/admin/blog/{id}/slider', 'App\Http\Controllers\Admin\BlogController@sliderIndex')->name('admin.blog.slider.index');
Route::get('/admin/blog/{id}/slider/create', 'App\Http\Controllers\Admin\BlogController@sliderCreate')->name('admin.blog.slider.create');
Route::post('/admin/blog/{id}/slider/store', 'App\Http\Controllers\Admin\BlogController@sliderStore')->name('admin.blog.slider.store');
Route::get('/admin/blog/{id}/slider/{sliderId}/edit', 'App\Http\Controllers\Admin\BlogController@sliderEdit')->name('admin.blog.slider.edit');
//Route::post('/admin/blog/{id}/slider/{sliderId}', 'App\Http\Controllers\Admin\BlogController@update')->name('admin.blog.slider.update');
Route::delete('/admin/blog/{id}/slider/{sliderId}', 'App\Http\Controllers\Admin\BlogController@sliderDestroy')->name('admin.blog.slider.destroy');

// Brand routes
Route::get('/admin/brand', 'App\Http\Controllers\Admin\BrandController@index')->name('admin.brand');
Route::get('/admin/brand/create', 'App\Http\Controllers\Admin\BrandController@create')->name('admin.brand.create');
Route::post('/admin/brand/store', 'App\Http\Controllers\Admin\BrandController@store')->name('admin.brand.store');
Route::get('/admin/brand/{id}/edit', 'App\Http\Controllers\Admin\BrandController@edit')->name('admin.brand.edit');
Route::delete('/admin/brand/{id}', 'App\Http\Controllers\Admin\BrandController@destroy')->name('admin.brand.destroy');

// Brand slider1 routes
Route::get('/admin/brand/{id}/slider1', 'App\Http\Controllers\Admin\BrandController@slider1Index')->name('admin.brand.slider1.index');
Route::get('/admin/brand/{id}/slider1/create', 'App\Http\Controllers\Admin\BrandController@slider1Create')->name('admin.brand.slider1.create');
Route::post('/admin/brand/{id}/slider1/store', 'App\Http\Controllers\Admin\BrandController@slider1Store')->name('admin.brand.slider1.store');
Route::get('/admin/brand/{id}/slider1/{sliderId}/edit', 'App\Http\Controllers\Admin\BrandController@slider1Edit')->name('admin.brand.slider1.edit');
Route::delete('/admin/brand/{id}/slider1/{sliderId}', 'App\Http\Controllers\Admin\BrandController@slider1Destroy')->name('admin.brand.slider1.destroy');

// Brand slider2 routes
Route::get('/admin/brand/{id}/slider2', 'App\Http\Controllers\Admin\BrandController@slider2Index')->name('admin.brand.slider2.index');
Route::get('/admin/brand/{id}/slider2/create', 'App\Http\Controllers\Admin\BrandController@slider2Create')->name('admin.brand.slider2.create');
Route::post('/admin/brand/{id}/slider2/store', 'App\Http\Controllers\Admin\BrandController@slider2Store')->name('admin.brand.slider2.store');
Route::get('/admin/brand/{id}/slider2/{sliderId}/edit', 'App\Http\Controllers\Admin\BrandController@slider2Edit')->name('admin.brand.slider2.edit');
Route::delete('/admin/brand/{id}/slider2/{sliderId}', 'App\Http\Controllers\Admin\BrandController@slider2Destroy')->name('admin.brand.slider2.destroy');

// Brand Gallery routes
Route::get('/admin/brand/{id}/gallery', 'App\Http\Controllers\Admin\BrandController@galleryIndex')->name('admin.brand.gallery.index');
Route::get('/admin/brand/{id}/gallery/create', 'App\Http\Controllers\Admin\BrandController@galleryCreate')->name('admin.brand.gallery.create');
Route::post('/admin/brand/{id}/gallery/store', 'App\Http\Controllers\Admin\BrandController@galleryStore')->name('admin.brand.gallery.store');
Route::get('/admin/brand/{id}/gallery/{galleryId}/edit', 'App\Http\Controllers\Admin\BrandController@galleryEdit')->name('admin.brand.gallery.edit');
Route::delete('/admin/brand/{id}/gallery/{galleryId}', 'App\Http\Controllers\Admin\BrandController@galleryDestroy')->name('admin.brand.gallery.destroy');

// Career routes
Route::get('/admin/career', 'App\Http\Controllers\Admin\CareerController@index')->name('admin.career.index');
Route::get('/admin/career/create', 'App\Http\Controllers\Admin\CareerController@create')->name('admin.career.create');
Route::post('/admin/career/store', 'App\Http\Controllers\Admin\CareerController@store')->name('admin.career.store');
Route::get('/admin/career/{id}/edit', 'App\Http\Controllers\Admin\CareerController@edit')->name('admin.career.edit');
Route::delete('/admin/career/{id}', 'App\Http\Controllers\Admin\CareerController@destroy')->name('admin.career.destroy');

// Career Slider routes
Route::get('/admin/career/slider', 'App\Http\Controllers\Admin\CareerController@sliderIndex')->name('admin.career.slider.index');
Route::get('/admin/career/slider/create', 'App\Http\Controllers\Admin\CareerController@sliderCreate')->name('admin.career.slider.create');
Route::post('/admin/career/slider/store', 'App\Http\Controllers\Admin\CareerController@sliderStore')->name('admin.career.slider.store');
Route::get('/admin/career/slider/{sliderId}/edit', 'App\Http\Controllers\Admin\CareerController@sliderEdit')->name('admin.career.slider.edit');
Route::delete('/admin/career/slider/{sliderId}', 'App\Http\Controllers\Admin\CareerController@sliderDestroy')->name('admin.career.slider.destroy');

// Career Jobs routes
Route::get('/admin/career/jobs', 'App\Http\Controllers\Admin\CareerController@jobIndex')->name('admin.career.job.index');
Route::get('/admin/career/jobs/create', 'App\Http\Controllers\Admin\CareerController@jobCreate')->name('admin.career.job.create');
Route::post('/admin/career/jobs/store', 'App\Http\Controllers\Admin\CareerController@jobStore')->name('admin.career.job.store');
Route::get('/admin/career/jobs/{jobId}/edit', 'App\Http\Controllers\Admin\CareerController@jobEdit')->name('admin.career.job.edit');
Route::delete('/admin/career/jobs/{jobId}', 'App\Http\Controllers\Admin\CareerController@jobDestroy')->name('admin.career.job.destroy');

// CatalogGroup routes
Route::get('/admin/catalog/group', 'App\Http\Controllers\Admin\CatalogController@groupIndex')->name('admin.catalog.group.index');
Route::get('/admin/catalog/group/create', 'App\Http\Controllers\Admin\CatalogController@groupCreate')->name('admin.catalog.group.create');
Route::post('/admin/catalog/group/store', 'App\Http\Controllers\Admin\CatalogController@groupStore')->name('admin.catalog.group.store');
Route::get('/admin/catalog/group/{id}/edit', 'App\Http\Controllers\Admin\CatalogController@groupEdit')->name('admin.catalog.group.edit');
Route::delete('/admin/catalog/group/{id}', 'App\Http\Controllers\Admin\CatalogController@groupDestroy')->name('admin.catalog.group.destroy');

// Catalog Routes
Route::get('/admin/catalog/{catalogGroupId}/catalog', 'App\Http\Controllers\Admin\CatalogController@catalogIndex')->name('admin.catalog.index');
Route::get('/admin/catalog/{catalogGroupId}/create', 'App\Http\Controllers\Admin\CatalogController@catalogCreate')->name('admin.catalog.create');
Route::post('/admin/catalog/store', 'App\Http\Controllers\Admin\CatalogController@catalogStore')->name('admin.catalog.store');
Route::get('/admin/catalog/{id}/edit', 'App\Http\Controllers\Admin\CatalogController@catalogEdit')->name('admin.catalog.edit');
Route::delete('/admin/catalog/{id}', 'App\Http\Controllers\Admin\CatalogController@catalogDestroy')->name('admin.catalog.destroy');

// Catalog File routes
Route::get('/admin/catalog/{catalogId}/files', 'App\Http\Controllers\Admin\CatalogController@catalogFileIndex')->name('admin.catalog.files.index');
Route::get('/admin/catalog/{catalogId}/files/create', 'App\Http\Controllers\Admin\CatalogController@catalogFileCreate')->name('admin.catalog.files.create');
Route::post('/admin/catalog/files/store', 'App\Http\Controllers\Admin\CatalogController@catalogFileStore')->name('admin.catalog.files.store');
Route::get('/admin/catalog/files/{fileId}/edit', 'App\Http\Controllers\Admin\CatalogController@catalogFileEdit')->name('admin.catalog.files.edit');
Route::delete('/admin/catalog/files/{fileId}', 'App\Http\Controllers\Admin\CatalogController@catalogFileDestroy')->name('admin.catalog.files.destroy');

// Slider Routes
Route::get('/admin/slider', 'App\Http\Controllers\Admin\SliderController@index')->name('admin.slider.index');
Route::get('/admin/slider/create', 'App\Http\Controllers\Admin\SliderController@create')->name('admin.slider.create');
Route::post('/admin/slider/store', 'App\Http\Controllers\Admin\SliderController@store')->name('admin.slider.store');
Route::get('/admin/slider/{sliderId}/edit', 'App\Http\Controllers\Admin\SliderController@edit')->name('admin.slider.edit');
Route::delete('/admin/slider/{sliderId}', 'App\Http\Controllers\Admin\SliderController@destroy')->name('admin.slider.destroy');

// Sector routes
Route::get('/admin/sector', 'App\Http\Controllers\Admin\SectorController@index')->name('admin.sector.index');
Route::get('/admin/sector/create', 'App\Http\Controllers\Admin\SectorController@create')->name('admin.sector.create');
Route::post('/admin/sector/store', 'App\Http\Controllers\Admin\SectorController@store')->name('admin.sector.store');
Route::get('/admin/sector/{sector}/edit', 'App\Http\Controllers\Admin\SectorController@edit')->name('admin.sector.edit');
Route::delete('/admin/sector/{sector}', 'App\Http\Controllers\Admin\SectorController@destroy')->name('admin.sector.destroy');

// Sector Slider 1 routes
Route::get('/admin/sector/{sector}/slider1', 'App\Http\Controllers\Admin\SectorController@slider1Index')->name('admin.sector.slider1.index');
Route::get('/admin/sector/{sector}/slider1/create', 'App\Http\Controllers\Admin\SectorController@slider1Create')->name('admin.sector.slider1.create');
Route::post('/admin/sector/{sector}/slider1/store', 'App\Http\Controllers\Admin\SectorController@slider1Store')->name('admin.sector.slider1.store');
Route::get('/admin/sector/{sector}/slider1/{sliderId}/edit', 'App\Http\Controllers\Admin\SectorController@slider1Edit')->name('admin.sector.slider1.edit');
Route::delete('/admin/sector/{sector}/slider1/{sliderId}', 'App\Http\Controllers\Admin\SectorController@slider1Destroy')->name('admin.sector.slider1.destroy');

// Sector Slider 2 routes
Route::get('/admin/sector/{sector}/slider2', 'App\Http\Controllers\Admin\SectorController@slider2Index')->name('admin.sector.slider2.index');
Route::get('/admin/sector/{sector}/slider2/create', 'App\Http\Controllers\Admin\SectorController@slider2Create')->name('admin.sector.slider2.create');
Route::post('/admin/sector/{sector}/slider2/store', 'App\Http\Controllers\Admin\SectorController@slider2Store')->name('admin.sector.slider2.store');
Route::get('/admin/sector/{sector}/slider2/{sliderId}/edit', 'App\Http\Controllers\Admin\SectorController@slider2Edit')->name('admin.sector.slider2.edit');
Route::delete('/admin/sector/{sector}/slider2/{sliderId}', 'App\Http\Controllers\Admin\SectorController@slider2Destroy')->name('admin.sector.slider2.destroy');

// Office routes
Route::get('/admin/office', 'App\Http\Controllers\Admin\OfficeController@index')->name('admin.office.index');
Route::get('/admin/office/create', 'App\Http\Controllers\Admin\OfficeController@create')->name('admin.office.create');
Route::post('/admin/office/store', 'App\Http\Controllers\Admin\OfficeController@store')->name('admin.office.store');
Route::get('/admin/office/{office}/edit', 'App\Http\Controllers\Admin\OfficeController@edit')->name('admin.office.edit');
Route::delete('/admin/office/{office}', 'App\Http\Controllers\Admin\OfficeController@destroy')->name('admin.office.destroy');

// Page routes
Route::get('/admin/page', 'App\Http\Controllers\Admin\PageController@index')->name('admin.page.index');
Route::get('/admin/page/create', 'App\Http\Controllers\Admin\PageController@create')->name('admin.page.create');
Route::post('/admin/page/store', 'App\Http\Controllers\Admin\PageController@store')->name('admin.page.store');
Route::get('/admin/page/{id}/edit', 'App\Http\Controllers\Admin\PageController@edit')->name('admin.page.edit');
Route::delete('/admin/page/{id}', 'App\Http\Controllers\Admin\PageController@destroy')->name('admin.page.destroy');

// Seo Settings routes SeoController
Route::get('/admin/seo', 'App\Http\Controllers\Admin\SeoController@index')->name('admin.seo.index');
Route::get('/admin/seo/create', 'App\Http\Controllers\Admin\SeoController@create')->name('admin.seo.create');
Route::post('/admin/seo/store', 'App\Http\Controllers\Admin\SeoController@store')->name('admin.seo.store');
Route::get('/admin/seo/{id}/edit', 'App\Http\Controllers\Admin\SeoController@edit')->name('admin.seo.edit');
Route::delete('/admin/seo/{id}', 'App\Http\Controllers\Admin\SeoController@destroy')->name('admin.seo.destroy');

// Static Text routes
Route::get('/admin/static-text', 'App\Http\Controllers\Admin\StaticTextController@index')->name('admin.static_text.index');
Route::get('/admin/static-text/create', 'App\Http\Controllers\Admin\StaticTextController@create')->name('admin.static_text.create');
Route::post('/admin/static-text/store', 'App\Http\Controllers\Admin\StaticTextController@store')->name('admin.static_text.store');
Route::get('/admin/static-text/{id}/edit', 'App\Http\Controllers\Admin\StaticTextController@edit')->name('admin.static_text.edit');
Route::delete('/admin/static-text/{id}', 'App\Http\Controllers\Admin\StaticTextController@destroy')->name('admin.static_text.destroy');

// FooterInfo routes
Route::get('/admin/footer-info', 'App\Http\Controllers\Admin\FooterInfoController@index')->name('admin.footer_info.index');
Route::get('/admin/footer-info/create', 'App\Http\Controllers\Admin\FooterInfoController@create')->name('admin.footer_info.create');
Route::post('/admin/footer-info/store', 'App\Http\Controllers\Admin\FooterInfoController@store')->name('admin.footer_info.store');
Route::get('/admin/footer-info/{id}/edit', 'App\Http\Controllers\Admin\FooterInfoController@edit')->name('admin.footer_info.edit');
Route::delete('/admin/footer-info/{id}', 'App\Http\Controllers\Admin\FooterInfoController@destroy')->name('admin.footer_info.destroy');

Route::post('/admin/update-order', 'App\Http\Controllers\Admin\FooterInfoController@updateSortOrder')->name('admin.update_order');


}); // End of Auth middleware group
//Project Front End routes
//Home route
Route::get('/', 'App\Http\Controllers\HomeController@index')->name('home');
Route::get('{slug}/{slug2?}', 'App\Http\Controllers\HomeController@route')->name('page.route');
// Route for HomeController copyDB function
//Route::get('/copy-db', 'App\Http\Controllers\HomeController@copyDB')->name('copy.db');