<?php

use App\Announcement;

if (!defined('ROOTDIR')) {
    define('ROOTDIR', dirname(__DIR__));
}

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

Route::get('/', function () {
    $user = null;
    if (\Auth::check()) {
        $user = \Auth::user();
    }
    $announcements = Announcement::orderBy('id', 'desc')
        ->limit(3)
        ->get();

    return view('welcome', compact('announcements', 'user'));
})->name('index');

Route::get('/status', 'PublicController@serviceStatus')->name('service-status');

Auth::routes([
    // Ensure users email is verified.
    'verify' => true,
]);

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/tickets', 'TicketController')
    ->except([
        'edit', 'update', 'destroy',
    ]);

Route::resource('/announcements', 'AnnouncementsController')
    ->only([
        'index', 'show',
    ])->names([
        'index' => 'announcements',
        'show'  => 'announcements.show',
    ]);

Route::resource('/knowledgebase', 'KnowledgebaseController')
    ->only([
        'index', 'show'
    ])->names([
        'index' => 'knowledgebase',
        'show'  => 'knowledgebase.show',
    ]);
