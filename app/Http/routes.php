<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


Route::group(['middleware' => ['web']], function() {

    Route::get('/', function () {
        return view('welcome');
    })->name('welcome');

});

Route::post('/signup', [
    'uses' => 'UserController@postSignUp',
    'as' => 'signup'
]);


Route::post('/signin', [
    'uses' => 'UserController@postSignIn',
    'as' => 'signin'
]);

Route::get('/logout', ['uses' => 'UserController@getLogOut', 'as' => 'logout']);

Route::get('/dashboard', [
    'uses' => 'PostController@getDashboard',
    'as' => 'dashboard',
    'middleware' => 'auth'
]);

Route::post('/createpost', ['uses' => 'PostController@createPost', 'as' => 'createpost']);
Route::get('/post-delete/{post_id}', ['uses' => 'PostController@destroy', 'as' => 'post.delete', 'middleware' => 'auth']);


Route::get('/create/{class}', function($class){
     \App\Test\Factory::build($class);
});


Route::get('/createDb', function(){
    Schema::table('example', function($table){
        $table->dropColumn('some_column');
    });

    echo "В базу данных внесены изменения";
});

Route::get('/games', ['uses' => 'GameController@index', 'as' => 'game.index', 'middleware' => 'auth']);
Route::post('/game/create', ['uses' => 'GameController@createGame', 'as' => 'game.create']);
Route::get('/game/edit/{id}', ['uses'=>'GameController@editGame', 'as' => 'game.edit']);
Route::post('/game/update/{id}', ['uses' => 'GameController@updateGame', 'as' => 'game.update']);

//Route::get('/albums/', function(){
//    $collection = \App\Models\Album::all();
//    $new = $collection->filter(function($album){
//        return $album->artist == "Matt Nathanson";
//    });
//    return $new;
//});

Route::get('albums/', function(){
//    $result = DB::select('SELECT * FROM person WHERE person_id > :id ORDER BY person_id DESC', ['id' => 0]);
    $results = DB::select('SELECT * FROM person INNER JOIN favorite_food ON person.person_id = favorite_food.person_id');

    foreach($results as $result)
    {
        echo $result->food . '<br>';
    }
});

Route::get('/advert', ['uses' => 'AdvertisementController@index', 'as' => 'advert.index']);
Route::post('/advert/create', ['uses' => 'AdvertisementController@createAdv', 'as' => 'advert.create']);
Route::get('/advert/{id}', ['uses' => 'AdvertisementController@showAdv', 'as' => 'advert.show']);


Route::post('advert/addmessage', ['uses' => 'AdvertisementController@addMessage', 'as' => 'advert.addmessage']);
Route::get('/messages/', ['uses' => 'MessageController@index', 'as' => 'message.index']);
Route::get('/messages/show/{id}', ['uses' => 'MessageController@showMessage', 'as' => 'message.show', 'middleware' => 'auth']);
Route::post('/message/answer', ['uses' => 'MessageController@answerMessage', 'as' => 'message.answer']);
