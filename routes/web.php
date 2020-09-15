<?php

use Illuminate\Support\Facades\Route;
use App\book;


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



Route::get('/upload','book_controller@index');


// add book in database
Route::post('/add_book','book_controller@store')->name('add_book');

Route::get('/','book_controller@home');


Route::get('/', 'book_controller@print_function');


// delete book from database
Route::get('{delete_id}/delete', 'book_controller@final_delete');


// edit book from database
Route::get('edit/{edit_id}', 'book_controller@edit_delete');


//final_edit in dataabase
Route::post('/{edit_id_passed}/edit_file_for_good','book_controller@final_edit_means_final');

// Search
Route::post('/search',function(){

	
	// echo $_POST['search_parameter'];
	$searchTerm = $_POST['search_parameter'];

	if( $searchTerm != "")
	{
		$search = book::query()
   				->where('title', 'LIKE', "%{$searchTerm}%") 
   				->orWhere('author', 'LIKE', "%{$searchTerm}%") 
   				->get();
   		
   		 if(count($search) > 0)
   		 	return view('search')->withDetails($search)->withQuery($searchTerm);
	}else
	{
		return redirect("/");
	}
});