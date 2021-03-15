<?php

use Illuminate\Support\Facades\Route;

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
    return view('ads.index');
})->name('root');
Route::get('/about', function () {
    return view('others.about');
})->name('about');
Route::get('/customers', function () {
    return view('customers.customers');
})->name('customers');

Route::get('ad/{id}', function ($id) {
    if ($id == 1)
        $arr = ['title' => 'this is title', 'content' => 'this is content one'];
    else
        $arr = ['title' => 'this is title two', 'content' => 'this is content two'];

    return view('ads.ad', ['post' => $arr]);
})->name('ad');


Route::get('admin', function () {
    return view('admin.index');
})->name('admin');

Route::group(['prefix' => 'admin'], function () {
    Route::get('', function () {
        return view('admin.index');
    })->name('admin.index');

    Route::get('adslist', function () {

        $arr = [['title' => 'الاعلان الاول', 'content' => 'محتوى الاعلان الاول'], ['title' => 'الاعلان الثاني', 'content' => 'محتوى الاعلان الثاني']];

        return view('admin.adslist', ['ads' => $arr]);
    })->name('admin.toedit');

    Route::get('create', function () {
        return view('admin.create');
    })->name('admin.create');

    Route::get('edit/{id}', function () {
        return view('admin.edit');
    })->name('admin.edit');

    Route::post('edit', function (\Illuminate\Http\Request $req, \Illuminate\Validation\Factory $validator) {
        $validation = $validator->make($req->all(), [
            'title' => 'required|min:5',
            'content' => 'required|min:10'
        ]);
        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation);
        }
        return redirect()
            ->route('admin.index')
            ->with('info', 'Post edited,  Title: ' . $req->input('title'));
    })->name('admin.update');

    Route::post('create', function (\Illuminate\Http\Request $req, \Illuminate\Validation\Factory $validator) {
        $validation = $validator->make($req->all(), [
            'title' => 'required|min:5',
            'content' => 'required|min:10'
        ]);
        if ($validation->fails()) {
            return redirect()->back()->withErrors($validation);
        }
        return redirect()
            ->route('admin.index')
            ->with('info', 'Post created, new Title: ' . $req->input('title'));
    })->name('admin.create');
});
