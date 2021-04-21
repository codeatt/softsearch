<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\RecordSearch;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class searchController extends Controller
{
    public function index(Request $request)
    {
        // O Request vai retornar os dados sempre em string //old request working below
        $value_search = $request->input('q',null);
        $search_category = $request->input('category',null);

        if (isset($value_search) & isset($search_category)) {
            $resp_cat_list = Http::get('https://api.mercadolibre.com/categories/'.$search_category.'');

            $response = Http::get('https://api.mercadolibre.com/sites/MLB/search?q='.$value_search.'&category='.$search_category);
//            https://api.mercadolibre.com/sites/MLB/search?q=ipod&category=MLB1051
            $arr_body = json_decode($response->getBody());

            $arr_body_categories = json_decode($resp_cat_list->getBody());

            //Lista Todas as Categorias
            $result_array=[];
            foreach($arr_body_categories->children_categories as $key){
                $result_array = Arr::prepend($result_array, $key->id);
            }
            $result_array = Arr::prepend($result_array, $arr_body_categories->id);

            //Query Builder Working
            $record_search = DB::table('record_searches')->insert([
                'value_search' => $value_search,
                'category' => $search_category,
                'created_at' =>  Carbon::now(), # new \Datetime() or date('Y-m-d H:i:s'),
                'updated_at' => Carbon::now(), # new \Datetime() or date('Y-m-d H:i:s'),
            ]);

            //Eloquent 1 - Working
//            $record_search = RecordSearch::create([
//                'value_search' => $request->input('q'),
//                'category' => $request->input('category'),
//                'created_at' =>  Carbon::now(), # new \Datetime() or date('Y-m-d H:i:s'),
//                'updated_at' => Carbon::now(), # new \Datetime() or date('Y-m-d H:i:s'),
//            ]);
            //Eloquent em teste 2 (inferior ao modelo 1)
            // we assign the name field from the incoming HTTP request
            // to the name attribute of the App\Models\Flight model instance
//            $record_search = new RecordSearch;
//            $record_search->name = $request->name;
//            $record_search->save();

            //$postRequest = ['title'=>$request->title];
            // Object -> Prop -> Save ()
            // $post = New Post;
            // $post->title = $request->title;
            // $post->subtitle = $request->subtitle;
            // $post->description = $request->description;
            // $post->save();

            // Model 3 (o vetor abaixo funciona como where, caso não haja registro, ele cria um)
            // $post = Post::firstOrNew([
            //'title' => $request->title
            // inserir todos os campos existentes no fillable
            //])
            // $post->save(); // este comando não é necessário caso utilize firstOrCreate (ele grava caso não encontre sem o save())

            $count_search = DB::table('record_searches')->where('value_search',$value_search)->count();

            return view('/search')
                ->with(compact(
                    'value_search',
                    'arr_body',
                    'search_category',
                    'response',
                    'arr_body_categories',
                    'result_array',
                    'record_search',
                    'count_search'
                ));
        }
        else {
            return view('/search')
                ->with(compact('value_search','search_category'));
        }
    }
}
