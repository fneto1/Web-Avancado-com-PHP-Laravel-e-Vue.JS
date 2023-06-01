<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FornecedorController extends Controller {


     public function index(){
        $fornecedores = [
            0 => [
                'nome' => 'fornecedor 1',
                'status'=> 'N',
                'cnpj' => '00.000.000/0000-00',
                'ddd'=>'75',
                'telefone' => '3621-6637'],
            1 => [
                'nome' => 'fornecedor 2',
                'status'=> 'S',
                'cnpj' => null,
                'ddd' => '79',
                'telefone' => '3334-5898'],
            2 => [
                'nome' => 'fornecedor 3',
                'status'=> 'N',
                'cnpj' => '00.111.333/0002-00',
                'ddd'=>'11',
                'telefone' => '2021-6689'],
        ];

        //$fornecedores = [];
        return view('app.fornecedor.index', compact('fornecedores'));
    }
}
