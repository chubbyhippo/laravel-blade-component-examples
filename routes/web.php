<?php

use App\Comment;
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
    return view('welcome');
});

Route::get('/comments/{comment}/edit', function (Comment $comment) {
    return view('comments.edit', ['comment' => $comment]);
});

Route::patch('/comments/{comment}', function (Comment $comment) {
    $comment->update(request()->validate(['body' => 'required|string']));

    return redirect('/comments/{$comment->id/edit}');
});
