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


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


/**********************************--------ADMIN PANEL--------*************************************/

Route::get('/admin', function () {
        return view('admin.login');
})->name('admin');

/*********************************Admin Controller********************************/
Route::get('admin/login', 'AdminController@loginform')->name('adminlogin');
Route::post('admin/login', 'AdminController@login')->name('adminlogin');
Route::get('admin', 'AdminController@index')->name('admin');
Route::get('admin/logout', 'AdminController@logout')->name('adminlogout');



/*********************************Category Controller********************************/
Route::get('admin/category', 'CategoryController@create')->name('addcategory_form');
Route::post('admin/category', 'CategoryController@store')->name('addcategory');
Route::get('admin/category/view', 'CategoryController@index')->name('viewcategory');
Route::get('admin/category/ed/{id}', 'CategoryController@edit')->name('editcategory');
Route::post('admin/category/up/{id}', 'CategoryController@update')->name('upcategory');
Route::post('admin/category/del/{id}', 'CategoryController@destroy')->name('delcategory');


/*********************************Subcategory Controller********************************/
Route::get('admin/subcategory', 'SubcategoryController@create')->name('addsubcategory_form');
Route::post('admin/subcategory', 'SubcategoryController@store')->name('addsubcategory');
Route::get('admin/subcategory/view', 'SubcategoryController@index')->name('viewsubcategory');
Route::get('admin/subcategory/ed/{id}', 'SubcategoryController@edit')->name('editsubcategory');
Route::post('admin/subcategory/up/{id}', 'SubcategoryController@update')->name('upsubcategory');
Route::post('admin/subcategory/del/{id}', 'SubcategoryController@destroy')->name('delsubcategory');



/*********************************Blog Controller********************************/
Route::get('admin/blog', 'BlogController@create')->name('addblog_form');
Route::post('admin/blog', 'BlogController@store')->name('addblog');
Route::get('admin/blog/view', 'BlogController@index')->name('viewblog');
Route::get('admin/blog/ed/{id}', 'BlogController@edit')->name('editblog');
Route::post('admin/blog/up/{id}', 'BlogController@update')->name('upblog');
Route::post('admin/blog/del/{id}', 'BlogController@destroy')->name('delblog');
Route::post('getsubcat','BlogController@getSubcat')->name('getsubcat');
Route::post('admin/blog/block/{id}', 'BlogController@block')->name('blockblog');
Route::get('likeb/{id}','BlogController@likeb')->name('likeb');
Route::get('dislikeb/{id}','BlogController@dislikeb')->name('dislikeb');



/*********************************Video Controller********************************/
Route::get('admin/video', 'VideoController@create')->name('addvideo_form');
Route::post('admin/video', 'VideoController@store')->name('addvideo');
Route::get('admin/video/view', 'VideoController@index')->name('viewvideo');
Route::get('admin/video/ed/{id}', 'VideoController@edit')->name('editvideo');
Route::post('admin/video/up/{id}', 'VideoController@update')->name('upvideo');
Route::post('admin/video/del/{id}', 'VideoController@destroy')->name('delvideo');
Route::post('getsubcatvideo','VideoController@getSubcat')->name('getsubcatvideo');
Route::post('admin/video/block/{id}', 'VideoController@block')->name('blockvideo');
Route::get('likev/{id}','VideoController@likev')->name('likev');
Route::get('dislikev/{id}','VideoController@dislikev')->name('dislikev');


/*********************************EbookCategory Controller********************************/
Route::get('admin/ebookcategory', 'EbookCategoryController@create')->name('addebookcategory_form');
Route::post('admin/ebookcategory', 'EbookCategoryController@store')->name('addebookcategory');
Route::get('admin/ebookcategory/view', 'EbookCategoryController@index')->name('viewebookcategory');
Route::get('admin/ebookcategory/ed/{id}', 'EbookCategoryController@edit')->name('editebookcategory');
Route::post('admin/ebookcategory/up/{id}', 'EbookCategoryController@update')->name('upebookcategory');
Route::post('admin/ebookcategory/del/{id}', 'EbookCategoryController@destroy')->name('delebookcategory');


/*********************************Ebook Controller********************************/
Route::get('admin/ebook', 'EbookController@create')->name('addebook_form');
Route::post('admin/ebook', 'EbookController@store')->name('addebook');
Route::get('admin/ebook/view', 'EbookController@index')->name('viewebook');
Route::get('admin/ebook/ed/{id}', 'EbookController@edit')->name('editebook');
Route::post('admin/ebook/up/{id}', 'EbookController@update')->name('upebook');
Route::post('admin/ebook/del/{id}', 'EbookController@destroy')->name('delebook');
Route::post('admin/ebook/block/{id}', 'EbookController@block')->name('blockebook');
Route::get('like/{id}','EbookController@like')->name('like');
Route::get('dislike/{id}','EbookController@dislike')->name('dislike');


/*******************************QuestionPaperCategory Controller******************************/
Route::get('admin/quecategory', 'QuestionPaperCategoryController@create')->name('addquecategory_form');
Route::post('admin/quecategory', 'QuestionPaperCategoryController@store')->name('addquecategory');
Route::get('admin/quecategory/view', 'QuestionPaperCategoryController@index')->name('viewquecategory');
Route::get('admin/quecategory/ed/{id}', 'QuestionPaperCategoryController@edit')->name('editquecategory');
Route::post('admin/quecategory/up/{id}', 'QuestionPaperCategoryController@update')->name('upquecategory');
Route::post('admin/quecategory/del/{id}', 'QuestionPaperCategoryController@destroy')->name('delquecategory');


/*******************************QuestionPaper Controller******************************/
Route::get('admin/question_paper', 'QuestionPaperController@create')->name('addque_form');
Route::post('admin/question_paper', 'QuestionPaperController@store')->name('addque');
Route::get('admin/question_paper/view', 'QuestionPaperController@index')->name('viewque');
Route::get('admin/question_paper/ed/{id}', 'QuestionPaperController@edit')->name('editque');
Route::post('admin/question_paper/up/{id}', 'QuestionPaperController@update')->name('upque');
Route::post('admin/question_paper/del/{id}', 'QuestionPaperController@destroy')->name('delque');


/*********************************View Controller********************************/
Route::get('admin/comment/view', 'ViewController@index')->name('viewcomments');


/********************************--------End ADMIN PANEL--------*****************************/



/********************************--------USER  PANEL--------*********************************/



/*********************************View Controller********************************/
Route::get('/', 'ViewController@create')->name('homepage');
Route::get('/single/{id}', 'ViewController@single')->name('single');
Route::get('/singlevideo/{id}', 'ViewController@singlevideo')->name('singlevideo');
Route::get('/singlebook/{id}', 'ViewController@singlebook')->name('singlebook');
Route::get('/searchpage', 'ViewController@searchpage')->name('searchpage');
Route::post('/search', 'ViewController@search')->name('search');
//Route::get('/search', 'ViewController@tagsearch')->name('tagsearch');
Route::get('/content/{id}', 'ViewController@content')->name('contentpage');
Route::get('/ebooks/{id}', 'ViewController@ebookpage')->name('ebookpage');
Route::post('/comment/{id}/{type}', 'ViewController@comment')->name('comment');
Route::get('/question_papers', 'ViewController@question_papers')->name('question_papers');

