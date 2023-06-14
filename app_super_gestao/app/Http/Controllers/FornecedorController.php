<?php

namespace App\Http\Controllers;

use App\Fornecedor;
use Illuminate\Http\Request;

class FornecedorController extends Controller {


    public function index()
    {
        return view('app.fornecedor.index');
    }
    public function listar(Request $request){

        $fornecedores = Fornecedor::where('nome', 'like', '%'.$request->input('nome').'%')
            ->where('site', 'like', '%'.$request->input('site').'%')
            ->where('uf', 'like', '%'.$request->input('uf').'%')
            ->where('email', 'like', '%'.$request->input('email').'%')
            ->paginate(2);


        return view('app.fornecedor.listar', ['fornecedores' => $fornecedores, 'request'=>$request->all()]);
    }

    public function adicionar(Request $request){

        $msg = '';

        if($request->input('_token') != '' && $request->input('id') == ''){
            //validação
            $regras = [
              'nome' => 'required|min:3|max:40',
              'site' => 'required',
              'uf' => 'required|min:2|max:2',
              'email' => 'email'
            ];

            $feedback = [
                'required' => 'O campo :attribute deve ser preenchido',
                'nome.min' => 'O campo nome deve ter no minimo 3 caracteres',
                'nome.max' => 'O campo nome deve ter no máximo 40 caracteres',
                'uf.min' => 'O campo nome deve ter no minimo 2 caracteres',
                'uf.max' => 'O campo nome deve ter no máximo 2 caracteres',
                'email' => 'E-mail inválido'
            ];

            $request->validate($regras, $feedback);

            $fornecedor = new Fornecedor();
            $fornecedor->create($request->all());

            $msg = 'Cadastro realizado com sucesso';

        }

        //edição
        if($request->input('_token') != '' && $request->input('id') != ''){
            $fornecedor = Fornecedor::find($request->input('id'));
            $update =  $fornecedor->update($request->all());

            if($update){
                $msg = 'Atualização realizada com sucesso!';
            } else {
                $msg = 'Erro ao tentar atualizar';
            }

            return redirect()->route('app.fornecedor.editar', ['id'=>$request->input('id'), 'mensagem' => $msg]);
        }
        return view('app.fornecedor.adicionar', ['mensagem' => $msg]);
    }

    public function editar($id, $msg = '')
    {
        $fornecedor = Fornecedor::find($id);

        return view('app.fornecedor.adicionar', ['fornecedor' => $fornecedor, 'mensagem' => $msg]);
    }

    public function excluir($id)
    {
        Fornecedor::find($id)->delete();

        return redirect()->route('app.fornecedor');
    }

}
