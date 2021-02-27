<?php

use App\Http\Controllers\searchMlController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Http;
use App\Http\Controllers\inputSearchController;
use App\Http\Controllers\stackController;



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

Route::resource('/searchjs', inputSearchController::class)->only([
    'index', 'show'
]);

Route::resource('/searchml', searchMlController::class)->only([
    'index', 'show'
]);

Route::any('/teste', function() {

//    return view('searchml');

    $name = 'livro';
//    echo $name;

    $client = new GuzzleHttp\Client([
//         Base URI is used with relative requests
        'base_uri' => 'https://api.mercadolibre.com'
    ]);
    $res = $client->request('GET', '/sites/MLB/search?q='.$name
//        , ['form_params' => ['client_id' => 'test_id','secret' => 'test_secret',]]
    );
//    dd($name);
//    echo $res->getStatusCode();
    // 200
//    echo $res->getHeader('content-type');
    // 'application/json; charset=utf8'
    echo $res->getBody();

//    $body = $res->getBody();
//    $arr_body = json_decode($body);
//    echo "<pre>"; print_r($arr_body); echo "</pre>";

//    return $res->getBody()->getContents();

//    return $res->getBody()->getContents();

    // {"type":"User"...'
});

Route::any('/search', [stackController::class, 'show', 'categoryFetch']);







//$collection = collect([1, 2, 3, 4]);
//
//$filtered = $collection->filter(function ($value, $key) {
//    return $value > 2;
//});
//
//$filtered->all();

// [3, 4]



