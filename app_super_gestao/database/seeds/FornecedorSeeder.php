<?php

use Illuminate\Database\Seeder;
use App\Fornecedor;

class FornecedorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //instanciando o objeto
        $fornecedor = new Fornecedor();
        $fornecedor->nome = 'Fornecedor 1';
        $fornecedor->site = 'www.fornecedor1.com';
        $fornecedor->uf = 'BA';
        $fornecedor->email = 'contato@fornecedor1.com';
        $fornecedor->save();

        //o método create (atenção para o atributo fillable da classe)
        Fornecedor::create([
            'nome' => 'Fornecedor 2',
            'site' => 'www.fornecedor2.com',
            'uf' => 'SP',
            'email' => 'contato@fornecedor2.com'
        ]);

        //insert
        DB::table('fornecedores')->insert([
            'nome' => 'Fornecedor 3',
            'site' => 'www.fornecedor3.com',
            'uf' => 'SE',
            'email' => 'contato@fornecedor3.com'
        ]);



    }
}
