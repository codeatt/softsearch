<?php

namespace App\Http\Controllers;

use App\Models\searchMl;
use Illuminate\Http\Request;

class searchMlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('searchml');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $nome = $request->get("q");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\searchMl  $searchMl
     * @return \Illuminate\Http\Response
     */
    public function show(searchMl $searchMl)
    {
        //        $client = new Client();
//        $request = $client->createRequest('GET', 'http://seudominio.com/sua-rota');
//        $retorno = $client->send($request);
//        $corpo=$retorno->getBody();
//        dd($corpo);

        $client = new GuzzleHttp\Client();
        $res = $client->get('https://api.mercadolibre.com/sites/MLB/search?q=livro#json');
        echo $res->getStatusCode(); // 200
        echo $res->getBody();


        dd(res);

//        $client = new \Guzzle\Service\Client('http://api.github.com/users/');
//        $response = $client->get("users/$username")->send();
//        dd($response);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\searchMl  $searchMl
     * @return \Illuminate\Http\Response
     */
    public function edit(searchMl $searchMl)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\searchMl  $searchMl
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, searchMl $searchMl)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\searchMl  $searchMl
     * @return \Illuminate\Http\Response
     */
    public function destroy(searchMl $searchMl)
    {
        //
    }
}
