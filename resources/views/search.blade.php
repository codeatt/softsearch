<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Document</title>
    <script data-ad-client="ca-pub-9732521555247603" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
</head>
<style></style>
<body>
<div class="container-fluid my-8 px-4 py-3">
    <h1>SoftSearch</h1>
    <div class="row">
        <form class="col-6 row" action="{{'/search'}}"  method="post">
            <div class="dropdown col-6">
                <button class="btn btn-primary" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <label>Categorias</label>
                    <select class="dropdown-menus" aria-labelledby="dropdownMenuButton" name="category" selected="phone">
                        <option class="dropdown-item" name="phone" value="MLB1051" >Celular</option>
                        <option class="dropdown-item" name="geladeira" value="MLB5726" >Geladeira</option>
                        <option class="dropdown-item" name="tv" value="MLB1000" >TV</option>
                    </select>
                </button>
            </div>

            <div class="row col-6">
                <div class="form-group col-9">
                    <input type="text"
                           name="q" class="form-control"
                           placeholder="Pesquisar"
                           value="{{ $value_search }}"
                    >
                </div>
                <div class="col-3">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <button type="submit" class="btn btn-primary" >Pesquisar</button>
                    <br>
                </div>
            </div>
        </form>
        <div class="col-3">
            {{ isset($count_search) ? 'Pesquisado '.$count_search.' vez(es)' : "Insira dados no formulário de pesquisa" }}
        </div>
    </div>


{{--    Retorna produtos--}}
    @if(isset($arr_body))
        @foreach($arr_body->results as $lista)
            <div class="d-flex align-items-start">
                <div class="col-2"><img class="col-12" src={{$lista->thumbnail}}></div>
                <div class="col-6">
                    <p class="col-12">{{$lista->title}}</p>
                    <p class="col-12">{{$lista->currency_id}}{{$lista->price}}</p>
                </div>
                <div class="col-3"><a href="{{$lista->permalink}}" class="btn btn-primary" role="button">Ir a Web</a></div>
            </div>
        @endforeach
    @else
        <div><br> Nenhuma pesquisa realizada no mercado livre !</div>
    @endif
</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>


