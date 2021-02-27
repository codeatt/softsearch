<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>
<style></style>
<body>
<div class="container-fluid my-8">
    <h1>Search</h1>
    <div class="row">
        <form class="col-8 row" action="{{'login'}}"  method="post">
            <div class="dropdown col-4">
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
                <div class="form-group col-6">
                    <input type="text"
                           name="q" class="form-control"
                           placeholder="Pesquisar"
                           value="{{$value_search}}"
                    >
                </div>
                <div class="col-6">
                    <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                    <button type="submit" class="btn btn-primary" >Pesquisar</button>
                    <br>
                </div>
            </div>
        </form>
    </div>

{{--    Retorna produtos--}}
    @if(isset($arr_body))
        @foreach($arr_body->results as $lista)
            <div class="d-flex align-items-start">
                <div class="col-3"><img src={{$lista->thumbnail}}></div>
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

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>


