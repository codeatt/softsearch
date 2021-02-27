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

            return view('/search')
                ->with(compact(
                    'value_search',
                    'arr_body',
                    'search_category',
                    'response',
                    'arr_body_categories',
                    'key',
                    'result_array',
                    ));
        }
        else {
            return view('/search')
                ->with(compact('value_search','search_category'));
        }
    }
}

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
