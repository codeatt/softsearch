<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\searchController;
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
    return redirect('/search');
});

Route::any('/search', [searchController::class, 'index', 'categoryFetch']);

//Guia Básico API
//Realiza una b&uacute;squeda por texto de busqueda
//    GET
//    /sites/MLA/search?q=
//        Fa&ccedil;a uma busca por categoria
//    GET
//    /sites/MLA/search?category=
//        Realiza una b&uacute;squeda por ID de vendedor
//    GET
//    /sites/MLA/search?seller_id=
//        Fa&ccedil;a uma pesquisa pelo apelido do Vendedor
//    GET
//    /sites/MLA/search?nickname=
//        Realiza una b&uacute;squeda por filtros especiales
//    GET
//    /sites/MLA/search?special_filter=
//        Realiza una b&uacute;squeda con un orden espec&iacute;fico
//    GET
//    /sites/MLA/search?q=ipod&sort=sortId=
//        Realiza una b&uacute;squeda agregando filtros aplicados
//    GET
//    /sites/MLA/search?q=ipod&FilterID=FilterValue

//Categorias para busca->select
//        https://api.mercadolibre.com/sites/MLB/search?q=laptop&FilterID=MLB5411
//        {
//            "id": "MLB1051",
//    "name": "Celulares e Telefones"
//  },
//        {
//            "id": "MLB5726",
//    "name": "Eletrodomésticos"
//  },
//        {
//            "id": "MLB1000",
//    "name": "Eletrônicos, Áudio e Vídeo"
//  },
