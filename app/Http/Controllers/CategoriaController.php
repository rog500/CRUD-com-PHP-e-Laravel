<?php

namespace App\Http\Controllers;

use App\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller

    {
        /**
       * Display a listing of the resource.
       *
       * @return \Illuminate\Http\Response
       */
      public function index()
      {
          $categorias=Categoria::all();
          return view('categoria.index',compact('categorias'));
      }
  
      /**
       * Show the form for creating a new resource.
       *
       * @return \Illuminate\Http\Response
       */
      public function create()
      {
          return view('categoria.create');
      }
  
      /**
       * Store a newly created resource in storage.
       *
       * @param  \Illuminate\Http\Request  $request
       * @return \Illuminate\Http\Response
       */
      public function store(Request $request)
      {
          //Função para validação dos dados
  
          $validadeData=$request->validate([
              'descricao' => 'required|max:255'
          ]);
          $categoria=Categoria::create($validadeData);
  
          return redirect('/categoria')->with('success','Categoria criado com sucesso.');
      }
  
      /**
       * Display the specified resource.
       *
       * @param  \App\Categoria  $categoria
       * @return \Illuminate\Http\Response
       */
      public function show(Categoria $categoria)
      {
          //
      }
  
      /**
       * Show the form for editing the specified resource.
       *
       * @param  \App\Categoria  $categoria
       * @return \Illuminate\Http\Response
       */
      public function edit($id)
      {
          $categoria=Categoria::findOrFail($id);
          return view('categoria.edit',compact('categoria'));
      }
  
      /**
       * Update the specified resource in storage.
       *
       * @param  \Illuminate\Http\Request  $request
       * @param  \App\Categoria  $categoria
       * @return \Illuminate\Http\Response
       */
      public function update(Request $request,$id)
      {
          $validadeData=$request->validate([
              'descricao' => 'required|max:255'
          ]);
          Categoria::whereId($id)->update($validadeData);
  
          return redirect('/categoria')->with('success','Categoria alterada com sucesso.');
      }
  
      /**
       * Remove the specified resource from storage.
       *
       * @param  \App\Categoria  $categoria
       * @return \Illuminate\Http\Response
       */
      public function destroy($id)
      {
         $categoria=Categoria::findOrFail($id);
         $categoria->delete();
         return redirect('/categoria')->with('success','Categoria removida com sucesso.');
      }
  }
  
   

