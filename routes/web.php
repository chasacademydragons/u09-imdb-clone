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

// Watchlist CRUD and related routes
Route::resource('watchlists', 'WatchlistController');
// Add a film to a watchlist
Route::post('addfilm', 'WatchlistController@addFilm');
// Remove a film from watchlist
Route::delete('removefilm/{movie_id}', 'WatchlistController@removeFilm');

// Main and layout page
Route::get('/', function () {
    return view('welcome');
});

Route::get('/', 'SearchController@getPopularMovies');

Route::post('searchresults', 'SearchController@searchMovie')->name('searchMovie');
Route::any('adminer', '\Miroc\LaravelAdminer\AdminerController@index');
Route::get('selectedfilm/{id}', 'SearchController@searchMovieById');

// Reviews
Route::get('reviews', 'ReviewController@showReview');
Route::post('postReviews', 'ReviewController@postReview');
Route::get('reviews/{id}/edit', 'ReviewController@editReview');
Route::delete('reviews/{id}', 'ReviewController@deleteReview');
Route::put('reviews/{id}', 'ReviewController@updateReview');
Route::post('morereviews', 'ReviewController@postReview');

Route::get('selectedActor/{id}', 'SearchController@searchActor');



// Authentication Routes (added by default by laravel)
Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

// Admin Routes
Route::group(['middleware' => ['auth', 'admin']], function () {
    Route::get('/admin', 'AdminController@index');
    Route::delete('admin/deleteReview/{id}', 'AdminController@deleteReview');
    Route::delete('admin/deleteUser/{id}', 'AdminController@deleteUser');
    Route::get('/admin/reviews', 'AdminController@showReviews');
    Route::get('/admin/users', 'AdminController@showUsers');

    Route::post('/admin/add/user', 'AdminController@addUser');

    Route::get('admin/add/review', function () {
        return view('admin/addReview');
    });

    Route::get('/admin/watchlists', 'AdminController@showWatchlists');

    Route::get('admin/add/watchlist', function () {
        return view('admin/addWatchlist');
    });
    
    Route::delete('admin/deleteWatchlist/{id}', 'AdminController@deleteWatchlist');

    Route::patch('admin/watchlist/update/{id}', 'AdminController@updateWatchlist');

    Route::get('admin/add/user', function () {
        return view('admin/addUser');
    });

    Route::patch('admin/review/update/{id}', 'AdminController@updateReview');
    Route::patch('admin/users/update/{id}', 'AdminController@updateUsers');
});

// Profile
Route::get('profile', 'ProfileController@showProfile');
Route::get('profile/reviews', 'ReviewController@getMyReviews');

// Advanced Search
Route::get('advancedsearch', function () {
    return view('advancedsearch');
});
Route::post('advancedsearch/results', 'SearchController@advancedsearch');
