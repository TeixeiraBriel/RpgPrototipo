<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categories;
use App\statusAcao;
use App\statusComportamento;
use App\statusReacao;

class CategoriesController extends Controller
{
    public function getCategories()
    {
        $categories = Categories::where('id',1)
            ->with('categories')
            ->get();   
        return view('categories', compact('categories'));
    }
    public function filhos(int $id)
    {
        $categories = Categories::where('id',$id)
            ->with('categories')
            ->get();   

            
        $dados = Categories::find($id);
        //$dados = Categories::find(4);
        //dd($dados->statusReacao()->find(1));
        return view('categories', compact('categories','dados'));
    }
    public function relatorio()
    {
        $categories = Categories::whereNull('category_id')
            ->with('childCategories')
            ->orderby('title', 'asc')
            ->get();
        return view('relatorio', compact('categories'));
    }
    public function Create()
    { 
        $categories = Categories::get();
        //dd($categories);
        return view('create', compact('categories'));
    }
    public function novoComportamento(int $id)
    {
        $categories = Categories::get();
        $dados = Categories::find($id);
        
        //dd($dados->statusAcao()->first()->id);
        //dd($dados->statusAcao()->get());
        //dd($dados->statusAcao()->find(2)->dificuldade);

        return view('createComportamento', compact('categories','dados'));
    }
    public function gravar(Request $request)
    {
        $dados = Categories::create($request->all()); 

        $categories = Categories::whereNull('category_id')->get();
        //dd($categories);
        return view('welcome', compact('categories'));
    }
    public function gravarComportamento(Request $request, int $id)
    {
        $dados = Categories::create($request->all()); 
        if ($request->tipo==2) {
            $tipo = $dados->statusAcao()->create(['dificuldade' => $request->dificuldade]);
        }
        if ($request->tipo==3) {
            $reacao = $dados->statusReacao()->create(['status' => $request->status]);
        }
        // $categories = Categories::where('id',$id)
        //     ->with('categories')
        //     ->get();   
        //return redirect('categories', compact('categories'));
        return redirect()->action('CategoriesController@filhos', $id);
    }
    public function excluirindex(int $id)
    {
        $categories = Categories::get();
        $dados = Categories::find($id);
        //dd($dados);

        return view('excluir', compact('categories','dados'));
    }
    public function excluir(int $id){
        $dados = Categories::destroy($id);
        
        $categories = Categories::whereNull('category_id')->get();
        return view('welcome', compact('categories'));
    }
}
