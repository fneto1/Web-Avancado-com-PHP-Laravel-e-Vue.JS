@extends('app.layouts.basico')

@section('titulo', 'Produto')

@section('conteudo')

    <div class="conteudo-pagina">
        <div class="titulo-pagina-2">
            <p>Produtos - Lista</p>
        </div>

        <div class="menu">
            <ul>
                <li><a href="{{route('produto.create')}}">Novo</a></li>
                <li><a href="">Consulta</a> </li>
            </ul>
        </div>

        <div class="informacao-pagina">
            <div style="width: 90%; margin-right: auto; margin-left: auto">
                <table border="1px" width="100%" >
                    <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Peso</th>
                        <th>Unidade ID</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                    </thead>

                    <tbody>
                    @foreach($produtos as $produto)
                        <tr>
                            <td>{{$produto->nome}}</td>
                            <td>{{$produto->descricao}}</td>
                            <td>{{$produto->peso}}</td>
                            <td>{{$produto->unidade_id}}</td>
                            <td><a href="{{route('produto.show', ['produto' => $produto->id])}}" >Visualizar</a></td>
                            <td>
                                <form id="form_{{$produto->id}}" action="{{route('produto.destroy', ['produto' => $produto->id])}}" method="post">
                                    @method('DELETE')
                                    @csrf
                                    <a href="#" onclick="document.getElementById('form_{{$produto->id}}').submit()">Excluir</a>
                                </form>

                            </td>
                            <td><a href="{{route('produto.edit', ['produto' => $produto->id])}}" >Editar</a></td>

                        </tr>
                    @endforeach
                    </tbody>
                </table>
                {{$produtos->appends($request)->links()}}
                <br>
                Exibindo {{$produtos->count()}} fornecedores de {{$produtos->total()}} (de {{$produtos->firstItem()}} a {{$produtos->lastItem()}})
            </div>
        </div>

    </div>

@endsection
