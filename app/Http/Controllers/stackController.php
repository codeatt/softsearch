<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Arr;

class stackController extends Controller
{
    public function show(Request $request)
    {
        // O Request vai retornar os dados sempre em string //old request working below
        $value_search = $request->input('q',null);
        $search_category = $request->input('category',null);

        if ($value_search & $search_category ) {
            $resp_cat_list = Http::get('https://api.mercadolibre.com/categories/'.$search_category.'');

            $response = Http::get('https://api.mercadolibre.com/sites/MLB/search?q='.$value_search.'&category='.$search_category);
//            https://api.mercadolibre.com/sites/MLB/search?q=ipod&category=MLB1051
            $arr_body = json_decode($response->getBody());

            $arr_body_categories = json_decode($resp_cat_list->getBody());

            //Lista Todas as Categorias
                $result_array=[];
            foreach($arr_body_categories->children_categories as $key){
//                echo $key->id;
                $result_array = Arr::prepend($result_array, $key->id);
            }
                $result_array = Arr::prepend($result_array, $arr_body_categories->id);

//            https://api.mercadolibre.com/categories/MLB1051

            $teste = array_filter($arr_body->results,function ($var){return($var->category_id == 'MLB1051');});

//            if(isset($arr_body)){
//                foreach($arr_body->results as $lista){
//                    return $lista;
//                }
//            }else{
//                return "<div><br> Nenhuma pesquisa realizada no mercado livre !</div>";
//            }
//
//            $contains = Arr::pluck($array, 'developer.name');

//            $array = ['product' => ['name' => 'Desk', 'price' => 100]];
//            $contains = Arr::hasAny($array, 'product.name');

//            if ($arr_body2->hasAny($search_category)) {
//                $category_filter = $search_category;
//                return view('/login')->with(compact('category_filter'));
//                } else {
//                $category_filter = ["Busca de filtro de categoria falhou"];
//            }

            return view('/search')
                ->with(compact(
                    'value_search',
                    'arr_body',
                    'search_category',
                    'response',
                    'arr_body_categories',
                    'key',
                    'result_array',
                    'teste'
                    ));
        }
        else {
            return view('/search')
                ->with(compact('value_search','search_category'));
        }
    }
}

//        Arquivados
//        $res_category = Http::get('https://api.mercadolibre.com/sites/MLB/search?category='.$search_category);

//        https://programmingpot.com/laravel/dependent-droop-down-in-laravel/
//        https://developers.mercadolivre.com.br/pt_br/categorizacao-de-produtos#Campos-da-resposta
//        https://api.mercadolibre.com/categories/MLB1051
//        BUSCAR ITENS POR CATEGORIA
//        https://developers.mercadolivre.com.br/pt_br/itens-e-buscas#Buscar-itens-por-categoria
//        https://laravel.com/docs/8.x/blade
//        https://laravel.com/docs/8.x/helpers#method-array-hasany

//        https://laravel.com/docs/8.x/requests#determining-if-input-is-present

//        De fato usei em 25/02/21
//    https://developers.mercadolivre.com.br/pt_br/itens-e-buscas#Buscar-itens-por-categoria
//    https://api.mercadolibre.com/sites/MLB/search?q=laptop&categoryVALUES=MLB1051
//    https://laravel.com/docs/8.x/requests#determining-if-input-is-present


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


//The Arr::where method filters an array using the given closure:
//
//use Illuminate\Support\Arr;
//
//$array = [100, '200', 300, '400', 500];
//
//$filtered = Arr::where($array, function ($value, $key) {
//    return is_string($value);
//});
