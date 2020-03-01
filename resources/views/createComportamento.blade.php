

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>
        <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="/">Aventura</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="/">Jogar<span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/relatorio">Relatorio</a>
                </li>
                </ul>
            </div>
            <ul class="navbar-nav ml-auto">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                             document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </nav>
        <div class="jumbotron">
            @if ($dados->tipo==1)
                <h1>Ação</h1>                    
            @else
            @if ($dados->tipo==2)
                <h1>Reação</h1>
            @else
                <h1>Comportamento</h1>
            @endif
            @endif
            <hr>
            <h4>{{$dados->title}}</h2>
            <p>{{$dados->desc}}</p>
        </div>
        <div class="container">
            <form method="post">
                @csrf
                <div class="row">
                    <div class="col">
                    <input id="title" name="title" type="text" class="form-control" placeholder="Titulo">
                    </div>
                </div>
                @if ($dados->tipo==1)
                    <div class="row mt-2">
                        <div class="col-3">
                        <input id="dificuldade" name="dificuldade" type="number" class="form-control" placeholder="Dificuldade">
                        </div>
                    </div>                    
                @endif
                @if ($dados->tipo==2)
                    <div class="row mt-2">
                        <div class="col-3">   
                            <select id="status" name="status" class="form-control">
                                <option value="1">Sucesso</option>
                                <option value="0">Fracasso</option>
                            </select> 
                        </div>
                        <div class="col-3">
                            <input id="" name="" type="number" class="form-control disabled" value="{{$dados->statusAcao()->first()->dificuldade}}">
                        </div>
                    </div>                    
                @endif
                <div class="row mt-2 d-none">
                    <div class="col">
                        @if ($dados->tipo==1)   
                        <select id="tipo" name="tipo" class="form-control">
                            <option value="2">Ação</option>
                        </select>                            
                        @else
                        @if ($dados->tipo==2)
                            <select id="tipo" name="tipo" class="form-control">
                                <option value="3">Reação</option>
                            </select>     
                        @else
                            <select id="tipo" name="tipo" class="form-control">
                                <option value="1">Comportamento</option>
                            </select> 
                        @endif
                        @endif
                    </div>
                    <div class="col">
                        <select id="category_id" name="category_id" class="form-control">
                            <option value="{{$dados->id}}">{{$dados->title}}</option>  
                        </select>
                    </div>
                </div>
                <div class="input-group mt-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Descrição</span>
                    </div>
                    <textarea name="desc" maxlength="500" class="form-control" aria-label="Descrição"   placeholder="Escreva algo sobre sua aventura."></textarea>
            
                </div>
                <div class="text-right mt-2">
                    <button type="submit" class="btn btn-success">Criar</button>
                <a href="/filhos/{{$dados->id}}"><button type="button" class="btn btn-outline-danger">Cancelar</button></a>
                </div>
            </form> 
        </div>
    </body>
</html>
