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

    echo "Texto de teste 3";

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

@dd($fornecedores)
