<?php

namespace App\Http\Controllers;

use App\Despesa;
use App\Categoria;
use Illuminate\Http\Request;

class DespesaController extends Controller

        {
            /**
                * Display a listing of the resource.
                *
                * @return \Illuminate\Http\Response
                */
               public function index()
               {
                   $despesas=Despesa::all();
                   return view('despesa.index',compact('despesas'));
               }
           
               /**
                * Show the form for creating a new resource.
                *
                * @return \Illuminate\Http\Response
                */
               public function categoria($id)
               {
                   $despesas = Despesa::where('categoria_id',$id)->get();
                   $categorias = Categoria::all();
                   return view('despesa.categoria', compact('despesas','categorias'));
               }
           
               public function create()
               {
                   $categorias=Categoria::all();
                   return view('despesa.create',compact('categorias'));
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
                       'descricao' => 'required|max:255',
                       'data' => 'required',
                       'valor' => 'required',
                       'categoria_id' => 'required'
                   ]);
                   $despesa=Despesa::create($validadeData);
           
                   return redirect('/despesa')->with('success','Despesa criada com sucesso.');
               }
           
               /**
                * Display the specified resource.
                *
                * @param  \App\Despesa  $despesa
                * @return \Illuminate\Http\Response
                */
               public function show(Despesa $despesa)
               {
                   //
               }
           
               /**
                * Show the form for editing the specified resource.
                *
                * @param  \App\Despesa  $despesa
                * @return \Illuminate\Http\Response
                */
               public function edit($id)
               {
                   $despesa=Despesa::findOrFail($id);
                   $categorias = Categoria::all();
                   return view('despesa.edit',compact('despesa','categorias'));
               }
           
               /**
                * Update the specified resource in storage.
                *
                * @param  \Illuminate\Http\Request  $request
                * @param  \App\Despesa  $despesa
                * @return \Illuminate\Http\Response
                */
               public function update(Request $request,$id)
               {
                   $validadeData=$request->validate([
                       'descricao' => 'required|max:255',
                       'data' => 'required',
                       'valor' => 'required',
                       'categoria_id' => 'required'
                   ]);
                   Despesa::whereId($id)->update($validadeData);
           
                   return redirect('/despesa')->with('success','Despesa alterada com sucesso.');
               }
           
               /**
                * Remove the specified resource from storage.
                *
                * @param  \App\Despesa  $despesa
                * @return \Illuminate\Http\Response
                */
               public function destroy($id)
               {
                  $despesa=Despesa::findOrFail($id);
                  $despesa->delete();
                  return redirect('/despesa')->with('success','Despesa removida com sucesso.');
               }
           }

