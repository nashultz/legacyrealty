<?php

Route::controller('auth/password', 'Auth\PasswordController', [
  'getEmail' => 'auth.password.email',
  'getReset' => 'auth.password.reset'
]);

Route::get('auth/login', ['as'=>'auth.login','uses'=>'Auth\AuthController@getLogin']);
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', ['as'=>'auth.logout','uses'=>'Auth\AuthController@logout']);

Route::group(['middleware'=>'auth', 'prefix'=>'mylegacy/api'], function() {
   Route::get('users', 'Backend\ApiController@users');
   Route::post('users', 'Backend\ApiController@storeUser');
   Route::get('users/{id}', 'Backend\ApiController@editUser');
   Route::post('users/{id}', 'Backend\ApiController@updateUser');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('mylegacy/users/{users}/confirm', ['as'=>'mylegacy.users.confirm','uses'=>'Backend\UsersController@confirm']);
    Route::resource('mylegacy/users', 'Backend\UsersController', ['only'=>['index']]);

    Route::get('mylegacy/pages/{pages}/confirm', ['as'=>'mylegacy.pages.confirm','uses'=>'Backend\PagesController@confirm']);
    Route::resource('mylegacy/pages', 'Backend\PagesController');

    Route::get('mylegacy/employees/{employee}/confirm', ['as'=>'mylegacy.employees.confirm','uses'=>'Backend\EmployeesController@confirm']);
    Route::get('mylegacy/employees/{employee}/images/{image}/confirm', ['as'=>'mylegacy.employees.{employee}.images.confirm','uses'=>'Backend\EmployeeImagesController@confirm']);
    Route::resource('mylegacy/employees/{employee}/images','Backend\EmployeeImagesController');
    Route::resource('mylegacy/employees', 'Backend\EmployeesController');

    Route::get('mylegacy/listings/{listing}/confirm', ['as'=>'mylegacy.listings.confirm','uses'=>'Backend\ListingsController@confirm']);
    Route::get('mylegacy/listings/{listing}/images/{image}/confirm', ['as'=>'mylegacy.listings.{listing}.images.confirm','uses'=>'Backend\ListingImagesController@confirm']);
    Route::resource('mylegacy/listings/{listing}/images','Backend\ListingImagesController', ['except' => ['update', 'edit']]);
    Route::resource('mylegacy/listings', 'Backend\ListingsController');

    Route::get('mylegacy/offices/{office}/confirm', ['as'=>'mylegacy.offices.confirm','uses'=>'Backend\OfficesController@confirm']);
    Route::resource('mylegacy/offices', 'Backend\OfficesController');

    Route::get('mylegacy/titles/{title}/confirm', ['as'=>'mylegacy.titles.confirm','uses'=>'Backend\TitlesController@confirm']);
    Route::resource('mylegacy/titles', 'Backend\TitlesController');

    Route::get('mylegacy/specialties/{specialty}/confirm', ['as'=>'mylegacy.specialties.confirm','uses'=>'Backend\SpecialtiesController@confirm']);
    Route::resource('mylegacy/specialties', 'Backend\SpecialtiesController');

    Route::get('mylegacy/cities/{city}/confirm', ['as'=>'mylegacy.cities.confirm','uses'=>'Backend\ListingCitiesController@confirm']);
    Route::resource('mylegacy/cities', 'Backend\ListingCitiesController');

    Route::get('mylegacy/states/{state}/confirm', ['as'=>'mylegacy.states.confirm','uses'=>'Backend\ListingStatesController@confirm']);
    Route::resource('mylegacy/states', 'Backend\ListingStatesController');

    Route::get('mylegacy/counties/{county}/confirm', ['as'=>'mylegacy.counties.confirm','uses'=>'Backend\ListingCountiesController@confirm']);
    Route::resource('mylegacy/counties', 'Backend\ListingCountiesController');

    Route::get('mylegacy/statuses/{status}/confirm', ['as'=>'mylegacy.statuses.confirm','uses'=>'Backend\ListingStatusesController@confirm']);
    Route::resource('mylegacy/statuses', 'Backend\ListingStatusesController');

    Route::get('mylegacy/types/{type}/confirm', ['as'=>'mylegacy.types.confirm','uses'=>'Backend\ListingTypesController@confirm']);
    Route::resource('mylegacy/types', 'Backend\ListingTypesController');

    Route::get('mylegacy/subtypes/{subtype}/confirm', ['as'=>'mylegacy.subtypes.confirm','uses'=>'Backend\ListingSubtypesController@confirm']);
    Route::resource('mylegacy/subtypes', 'Backend\ListingSubtypesController');

    Route::get('mylegacy/testimonies/{testimony}/confirm', ['as'=>'mylegacy.testimonies.confirm','uses'=>'Backend\TestimoniesController@confirm']);
    Route::resource('mylegacy/testimonies', 'Backend\TestimoniesController');

    Route::get('mylegacy/dashboard', ['as'=>'backend.dashboard', 'uses'=>'Backend\DashboardController@index']);
});

Route::get('/', ['as'=>'site.home','uses'=>'HomeController@index']);

Route::get('properties', ['as'=>'site.properties','uses'=>'HomeController@listings']);
Route::get('properties/{listing}', ['as'=>'site.properties.show','uses'=>'HomeController@viewListing']);

Route::get('agents', ['as'=>'site.agents','uses'=>'HomeController@agents']);
Route::get('agents/{employee}', ['as'=>'site.agents.show','uses'=>'HomeController@viewAgent']);

Route::get('twitter', function()
{
    return View::make('twitter.get-tweets1-1');
});