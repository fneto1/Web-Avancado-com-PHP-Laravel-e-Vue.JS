<h3>Fornecedor</h3>

{{-- Comentários no blade --}}

{{-- {{}} == '<?= ?>' --}

{{-- {{"texto de teste"}}
<?= "Texto de teste 2" ?> --}}

{{-- Bloco PHP puro --}}
@php

    //comentários de uma linha

    /* comentários
    em
    linha */

//    echo "Texto de teste 3";

@endphp

{{--@if(count($fornecedores) > 0 && count($fornecedores) < 10)--}}
{{--    <h3>Existem alguns fornecedores</h3>--}}
{{--@elseif(count($fornecedores) > 10)--}}
{{--    <h3>Existem vários fornecedores</h3>--}}
{{--@else--}}
{{--    <h3>Não temos fornecedores</h3>--}}
{{--@endif--}}

{{--
o if executa caso o retorno da condição seja true
@unless executa se o retorno for false
--}}

{{--Fornecedor: {{$fornecedores[0]['nome']}}--}}
{{--<br>--}}
{{--Status: {{$fornecedores[0]['status']}}--}}
{{--<br>--}}
{{--@unless($fornecedores[0]['status'] == 'S')--}}
{{--    Fornecedor inativo--}}
{{--@endunless--}}

{{--if(isset($variavel)) retorna true se a variavel estiver definida --}}

@isset($fornecedores)
{{--    Fornecedor: {{$fornecedores[1]['nome']}}--}}
{{--    <br>--}}
{{--    Status: {{$fornecedores[1]['status']}}--}}
{{--    <br>--}}
{{--    @isset($fornecedores[1]['cnpj'])--}}
{{--    CNPJ: {{$fornecedores[1]['cnpj']}}--}}
{{--    <br>--}}
{{--    @empty($fornecedores[1]['cnpj'])--}}
{{--        Vazio--}}
{{--    @endempty--}}
{{--    @endisset--}}

{{--  Operador condicional de valor default (??)  --}}
{{--    CNPJ: {{$fornecedores[1]['cnpj'] ?? 'Não possui CNPJ'}}--}}
{{--    <br>--}}
{{--
  $variavel testada não estiver definida (isset)
  ou
  $variavel testada ser null

  --}}

{{--    Telefone: ({{$fornecedores[1]['ddd'] ?? ''}}) {{$fornecedores[1]['telefone'] ?? ''}}--}}
{{--    <br>--}}
{{--    @switch($fornecedores[1]['ddd'])--}}
{{--        @case('75')--}}
{{--            Cruz das Almas - BA--}}
{{--            @break--}}
{{--        @case('79')--}}
{{--            Aracaju - SE--}}
{{--            @break--}}
{{--        @case('11')--}}
{{--            São Paulo - SP--}}
{{--            @break--}}
{{--        @default--}}
{{--            Estado não identificado--}}
{{--    @endswitch--}}

{{--    <br><br>--}}

{{--    @for($i=0; isset($fornecedores[$i]); $i++ )--}}
{{--        Fornecedor: {{$fornecedores[$i]['nome']}}--}}
{{--        <br>--}}
{{--        Status: {{$fornecedores[$i]['status']}}--}}
{{--        <br>--}}
{{--        CNPJ: {{$fornecedores[$i]['cnpj'] ?? 'Não possui CNPJ'}}--}}
{{--        <br>--}}
{{--        Telefone: ({{$fornecedores[$i]['ddd'] ?? ''}}) {{$fornecedores[$i]['telefone'] ?? ''}}--}}
{{--        <br><br>--}}
{{--    @endfor--}}

{{--    @php $i = 0 @endphp--}}
{{--    @while(isset($fornecedores[$i]))--}}

{{--                Fornecedor: {{$fornecedores[$i]['nome']}}--}}
{{--                <br>--}}
{{--                Status: {{$fornecedores[$i]['status']}}--}}
{{--                <br>--}}
{{--                CNPJ: {{$fornecedores[$i]['cnpj'] ?? 'Não possui CNPJ'}}--}}
{{--                <br>--}}
{{--                Telefone: ({{$fornecedores[$i]['ddd'] ?? ''}}) {{$fornecedores[$i]['telefone'] ?? ''}}--}}
{{--                <hr>--}}
{{--                <br>--}}
{{--                @php $i++ @endphp--}}

{{--    @endwhile--}}

{{--    @foreach($fornecedores as $indice => $fornecedor)--}}
{{--        Fornecedor: {{$fornecedor['nome']}}--}}
{{--        <br>--}}
{{--        Status: {{$fornecedor['status']}}--}}
{{--        <br>--}}
{{--        CNPJ: {{$fornecedor['cnpj'] ?? 'Não possui CNPJ'}}--}}
{{--        <br>--}}
{{--        Telefone: ({{$fornecedor['ddd'] ?? ''}}) {{$fornecedor['telefone'] ?? ''}}--}}
{{--        <hr>--}}
{{--        <br>--}}
{{--    @endforeach--}}

    @forelse($fornecedores as $indice => $fornecedor)
                Iteração atual: {{ $loop->iteration  }}
                <br>
                Fornecedor: {{$fornecedor['nome']}}
                <br>
                Status: {{$fornecedor['status']}}
                <br>
                CNPJ: {{$fornecedor['cnpj'] ?? 'Não possui CNPJ'}}
                <br>
                Telefone: ({{$fornecedor['ddd'] ?? ''}}) {{$fornecedor['telefone'] ?? ''}}
                <br>
                @if($loop->first)
                    Primeira iteração
                @endif

                @if($loop->last)
                    Última iteração

                    <br>
                    Total de registros: {{$loop->count}}
                @endif
                <hr>
                <br>

    @empty
        Não existem fornecedores cadastrados!
    @endforelse



@endisset






