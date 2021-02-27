<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Document</title>
</head>

<style>
    #list{
        display: flex;
        flex-direction: column;
        align-items: center;
    }
    #list span{
        display: block;
        font-size: x-large;
        max-width: 100%;
    }

    #list li{
        list-style: none;
    }

</style>
<body>
<div class="container">

    <form class="navbar-form navbar-left" id="formSearch" role="search"  style="margin-left: 25%;margin-bottom: 3%;">

        <div class="form-group">

            <input type="text"
                   onchange="mySearch(this.value)"
                   name="q" id="searchField" class="form-control"
                   placeholder="Pesquisar" style="width: 600px;"
            >

        </div>
        <ul id="demo" class="collapse">
            <!-- <label class="checkbox-inline">--}}
                <input type="checkbox" id="semimagem" value="semimagem" name="semimagem"> Sem imagem--}}
            </label>--}}
            <select class="form-control" id="status">--}}
                <option value="1">Ativo</option>--}}
               <option value="0">Desabilitado</option>--}}
            </select>--}} -->
        </ul>
        <button type="submit" id="search">Pesquisar</button>
    </form>

    <div id="list"></div>

</div>
</body>
</html>

<script>

    var searchField
    var logSearch = []

    var list = document.querySelector("#list")

    function mySearch(value) {
        searchField = value
        logSearch = []
    }

    document.querySelector("#formSearch").addEventListener("click", function(event){
        event.preventDefault()

        fetch(`https://api.mercadolibre.com/sites/MLB/search?q=${searchField}#json`)
            .then(function(response) {
                return response.json()
            })
            .then(function(myJson) {
                logSearch = myJson.results
                // console.log(logSearch)
            });

        var list = document.querySelector("#list")
        // console.log(list)
        var novaLi = document.createElement("li");
        logSearch.map(function(item) {
            // console.log(item)
            var novoSpan = document.createElement("span");
            var novoLink = document.createElement("a");
            var conteudoLink = document.createTextNode(item.permalink);
            novoLink.setAttribute('href', item.permalink)
            var conteudoSpan = document.createTextNode(item.title);

            novoSpan.appendChild(conteudoSpan)
            novoLink.appendChild(conteudoLink)

            novaLi.appendChild(novoSpan)
            novaLi.appendChild(novoLink)
        })

        list.appendChild(novaLi)

    });



</script>
