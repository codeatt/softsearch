<?php

namespace App\Http\Controllers;

use App\Models\inputSearch;
use Illuminate\Http\Request;
use Guzzle\Http\Client;

class inputSearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('searchjs');
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\inputSearch  $inputSearch
     * @return \Illuminate\Http\Response
     */
    public function show(inputSearch $inputSearch)
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
     * @param  \App\Models\inputSearch  $inputSearch
     * @return \Illuminate\Http\Response
     */
    public function edit(inputSearch $inputSearch)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\inputSearch  $inputSearch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, inputSearch $inputSearch)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\inputSearch  $inputSearch
     * @return \Illuminate\Http\Response
     */
    public function destroy(inputSearch $inputSearch)
    {
        //
    }
}
