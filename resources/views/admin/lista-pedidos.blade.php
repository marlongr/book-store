@extends('layouts.admin')

@section('conteudo')
<table class="table table-striped">
    <thead>
        <tr>
            <th>Data</th>
            <th class="text-right">Cliente</th>
            <th class="text-right">Valor</th>
            <th class="text-right">Método de Pagamento</th>
            <th class="text-right">Status no Pagseguro</th>
            <th class="text-right">Status Local</th>
            <th class="text-right">Enviado / Finalizado</th>
            <th class="text-right">Id no Pagseguro</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pedidos as $pedido)
        <tr>
            <td>
                <a href="{{route('admin.lista-pedidos', $pedido->id)}}">
                    {{$pedido->data_venda->format('d/m/Y H:i')}}
                </a>
            </td>
            <td>
                {{$pedido->user->name}}
            </td>
            <td>
                {{number_format($pedido->valor_venda, 2, ',', '.')}}
            </td>
            <td class="text-right">
                {{$pedido->metodo_pagamento}}
            </td>
            <td class="text-right">
                {{$pedido->status_pagamento}}
            </td>
            <td class="text-right small">
                {!! $pedido->pago && $pedido->enviado == FALSE 
                    ? '<span class="text-primary">PRONTO PARA ENVIAR</span>' 
                    : '<b class="text-warning">Aguardando atualização de status de pagamento</b>'
                !!}
            </td>
            <td class="text-right small">
                {!! $pedido->enviado 
                    ? '<span class="text-success">ENVIADO / FINALIZADO</span>' 
                    : '<b class="text-warning">Aguardando atualização de status de pagamento</b>'
                !!}
            </td>
            <td class="text-right text-muted small">
                {{$pedido->pagseguro_transaction_id}}
            </td>
        </tr>
       @endforeach
    </tbody>
</table>
@stop