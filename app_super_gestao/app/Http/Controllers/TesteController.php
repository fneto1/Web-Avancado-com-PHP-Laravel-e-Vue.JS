<?php

    namespace App\Http\Controllers;

    use Illuminate\Http\Request;

class TesteController extends Controller {

    public function teste(int $p1, int $p2){
        //echo "A soma entre $p1 e $p2 é: ". ($p1 + $p2);

        //encaminhando parâmetros do controlador para a view

        //utilizando array associativo
        //return view('site.teste', ['p1' => $p1, 'p2' => $p2]);

        //utilizando o metodo compact
        //return view('site.teste', compact('p1', 'p2'));

        //utilizando o metodo with
        return view('site.teste')->with('p1', $p1)->with('p2', $p2);

    }

}
