<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SiteContato;
use App\MotivoContato;

class ContatoController extends Controller
{

    public function contato(Request $request){

        $motivo_contatos = MotivoContato::all();

//        echo '<pre>';
//        print_r($request->all());
//        echo '</pre>';
//        echo $request->input('nome');
//        echo '<br>';
//        echo $request->input('email');

        //$contato = new SiteContato();

//        $contato->nome = $request->input('nome');
//        $contato->telefone = $request->input('telefone');
//        $contato->email = $request->input('email');
//        $contato->motivo_contato = $request->input('motivo_contato');
//        $contato->mensagem = $request->input('mensagem');
//
//        //print_r($contato->getAttributes());
//        $contato->save();

//        //uma outra forma de persistir
//        $contato->fill($request->all());
//        $contato->save();

        //mais uma forma
        //$contato->create($request->all());

        return view('site.contato', ['titulo' => 'Contato (parâmetro)', 'motivo_contatos' => $motivo_contatos]);
    }

    public function salvar (Request $request)
    {
        //Validação dos dados do formulário
        $request->validate([
            'nome' => 'required|min:3|max:40|unique:site_contatos',
            'telefone' => 'required',
            'email' => 'email',
            'motivo_contatos_id' => 'required',
            'mensagem' => 'required'
        ],
        [
            'nome.required' => 'O nome é obrigatório',
            'nome.min' => 'O nome precisa de no mínimo 3 caracteres',
            'nome.max' => 'O nome não pode ter mais que 40 caracteres',
            'nome.unique' => 'Nome existente, escolha outro',
            'required' => 'O campo :attribute é obrigatório',
            'email' => 'E-mail inválido'
        ]);

        SiteContato::create($request->all());
        return redirect()->route('site.index');
    }

}
