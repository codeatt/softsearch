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
<div class="container">
    <form class="navbar-form navbar-left" role="search" action="{!! url('/teste') !!}" method="post">
        <div class="form-group">
            <input type="text"
                   name="q" id="searchField" class="form-control"
                   placeholder="Pesquisar"
                   value="{{old('q')}}"
            >
        </div>
        <button type="submit" class="btn btn-primary" id="search">Pesquisar</button>
    </form>

{{--    <div class="col-md-12">--}}
{{--        @foreach($res as $item)--}}
{{--            {{$item->id}}--}}
{{--        @endforeach--}}
{{--    </div>--}}

    <div id="list"></div>

</div>
</body>
</html>
