@if ($comum == false)
    @if ($retorno == 1)
        @if ($subCategories->statusReacao()->get('status') == '[{"status":1}]')
            <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                <div  class="card-header text-center">
                    @if ($category->tipo==1)   
                        <a class="btn btn-dark" href="/filhos/{{$subCategories->id}}" role="button">Escolher</a>
                    @else
                        <a class="btn btn-dark" href="/filhos/{{$subCategories->id}}" role="button">Continuar</a>
                    @endif
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{$subCategories->title}}</h5>  
                </div>
            </div>     
        @endif
    @else
        @if ($subCategories->statusReacao()->get('status') == '[{"status":0}]')
            <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                <div  class="card-header text-center">
                    @if ($category->tipo==1)   
                        <a class="btn btn-dark" href="/filhos/{{$subCategories->id}}" role="button">Escolher</a>
                    @else
                        <a class="btn btn-dark" href="/filhos/{{$subCategories->id}}" role="button">Continuar</a>
                    @endif
                </div>
                <div class="card-body">
                    <h5 class="card-title">{{$subCategories->title}}</h5>  
                </div>
            </div>  
        @endif
    @endif
@else
    <div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
        <div  class="card-header text-center">
            @if ($category->tipo==1)   
                <a class="btn btn-dark" href="/filhos/{{$subCategories->id}}" role="button">Escolher</a>
            @else
                <a class="btn btn-dark" href="/filhos/{{$subCategories->id}}" role="button">Continuar</a>
            @endif
        </div>
        <div class="card-body">
            <h5 class="card-title">{{$subCategories->title}}</h5>  
        </div>
    </div>     
@endif

