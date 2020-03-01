<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aventura1</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</head>
<body>
    @php
      $resultado = 0  
    @endphp        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
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
    <header>
        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                @foreach ($categories as $category)            
                    <h1 class="display-4">{{ $category->title }}</h1>
                    <p class="lead">{{ $category->desc }}</p>
                    @if ($category->tipo==1)   
                    <a class="btn btn-primary" href="/Comportamento/{{ $category->id }}" role="button">Criar Ação</a>
                    <p class="lead font-weight-bold">Faça sua Escolha:</p>
                        
                    @else
                    @if ($category->tipo==2)           
                        @php
                        $dado1 = rand(1,6);    
                        $dado2 = rand(1,6); 
                        $resultado = $dado1 + $dado2;   
                        

                        
                        if ($resultado>=$category->statusAcao()->first()->dificuldade) {
                            $retorno = 1;
                            $retornoView = "Sucesso! Boaa precisava de ".$category->statusAcao()->first()->dificuldade.".";
                        } else {
                            $retorno = 0;
                            $retornoView = "Fracasso! Voce precisava de ".$category->statusAcao()->first()->dificuldade.".";
                        }
                        

                        @endphp
                        <p class="lead">Dados: {{$resultado}} - {{$retornoView}}</p>
                        <a class="btn btn-primary" href="/Comportamento/{{ $category->id }}" role="button">Criar Reação</a>
                        
                    @else
                        <a class="btn btn-primary" href="/Comportamento/{{ $category->id }}" role="button">Criar Comportamento</a>   

                    @endif
                    @endif
                @endforeach
            </div>
        </div>
    </header>    
    <main>
        <div class="container">
            <div class="card-columns">   
                @foreach ($categories as $category)
                        @if(count($category->childCategories))                 
                            @foreach ($category->childCategories as $subCategories)
                                        @if ($category->tipo==2)
                                            @if ($resultado>=$category->dificuldade)      
                                                @include('card', ['subCategories' => $subCategories, 'dificuldadePai' => $category->dificuldade, 'comum' => false, 'resultado' => $retorno])                                   
                                            @else                                             
                                                @include('card', ['subCategories' => $subCategories, 'dificuldadePai' => $category->dificuldade, 'comum' => false, 'resultado' => $retorno]) 
                                            @endif                                            
                                        @else                        
                                            @include('card', ['subCategories' => $subCategories, 'comum' => true])
                                        @endif
                            @endforeach
                        @endif
                @endforeach                
            </div>
        </div>
    </main>
    <footer>

    </footer>
</body>
</html>