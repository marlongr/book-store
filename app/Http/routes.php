<?php

/*
  |--------------------------------------------------------------------------
  | Routes File
  |--------------------------------------------------------------------------
  |
  | Here is where you will register all of the routes in an application.
  | It's a breeze. Simply tell Laravel the URIs it should respond to
  | and give it the controller to call when that URI is requested.
  |
 */


/*
  |--------------------------------------------------------------------------
  | Application Routes
  |--------------------------------------------------------------------------
  |
  | This route group applies the "web" middleware group to every route
  | it contains. The "web" middleware group is defined in your HTTP
  | kernel and includes session state, CSRF protection, and more.
  |
 */


Route::post('/pagseguro/notification', [
    'uses' => '\laravel\pagseguro\Platform\Laravel5\NotificationController@notification',
    'as' => 'pagseguro.notification',
]);


Route::group(['middleware' => ['web']], function () {
    Route::auth();

    Route::get('/', 'FrenteLojaController@getIndex');

    Route::get('sobre', [
        'as' => 'sobre',
        'uses' => 'FrenteLojaController@getSobre'
    ]);
    Route::get('pagseguro/checkout', [
        'as' => 'pagseguro.checkout',
        'uses' => 'PedidoController@postCheckout'
    ]);
    Route::get('categoria/{id?}', [
        'as' => 'categoria.listar',
        'uses' => 'CategoriaController@getCategoria'
    ]);

    /*
     * ATENÇÃO para esta rota, ela deve estar antes de produto/{id}
     * para funcionar
     */
    Route::any('produto/buscar', [
        'as' => 'produto.buscar',
        'uses' => 'ProdutoController@getBuscar'
    ]);
    Route::get('produto/{id}', [
        'as' => 'produto.detalhes',
        'uses' => 'ProdutoController@getProdutoDetalhes'
    ]);
    Route::get('imagem/arquivo/{nome}', [
        'as' => 'imagem.file',
        'uses' => 'ImagemController@getImagemFile'
    ]);

    Route::any('carrinho/adicionar/{id}', [
        'as' => 'carrinho.adicionar',
        'uses' => 'CarrinhoController@anyAdicionar'
    ]);

    Route::get('carrinho', [
        'as' => 'carrinho.listar',
        'uses' => 'CarrinhoController@getListar'
    ]);

    Route::get('carrinho/esvaziar', [
        'as' => 'carrinho.esvaziar',
        'uses' => 'CarrinhoController@getEsvaziar'
    ]);    
    Route::any('carrinho/excluir/{id?}', [
        'as' => 'carrinho.excluir',
        'uses' => 'CarrinhoController@getExcluir'
    ]);

    Route::group(['middleware' => ['auth']], function () {
        Route::get('carrinho/finalizar-compra', [
            'as' => 'carrinho.finalizar-compra',
            'uses' => 'CarrinhoController@getFinalizarCompra'
        ]);

        Route::get('cliente/dashboard', [
            'as' => 'cliente.dashboard',
            'uses' => 'ClienteController@getDashboard'
        ]);

        Route::get('cliente/pedidos', [
            'as' => 'cliente.pedido',
            'uses' => 'ClienteController@getPedidos'
        ]);
        Route::get('book-store/public/cliente/pedidos/{id?}', [
            'as' => 'cliente.pedidos',
            'uses' => 'ClienteController@getPedidos'
        ]);

        Route::any('admin/buscar', [
        'as' => 'admin.busca-clientes',
        'uses' => 'AdminController@getBuscar'
        ]);

      /*  Route::get('cliente/pedidos/{id?}', [
            'as' => 'cliente.pedidos',
            'uses' => 'ClienteController@getPedidos'
        ]);*/
        Route::get('cliente/perfil', [
            'as' => 'cliente.perfil',
            'uses' => 'ClienteController@getPerfil'
        ]);
        Route::get('cliente/editar/{id}', [
            'as' => 'cliente.editar',
            'uses' => 'ClienteController@getEditar'
        ]);
        Route::get('cliente/update/{id}', [
            'as' => 'cliente.update',
            'uses' => 'ClienteController@getUpdate'
        ]);
        Route::any('cliente/avaliar/{id}', [
            'as' => 'cliente.avaliar',
            'uses' => 'ClienteController@postAvaliar'
        ]);

        Route::get('admin', [
            'as' => 'admin',
            'uses' => 'AdminController@getDashboard'
        ]);
        Route::get('admin/dashboard', [
            'as' => 'admin.dashboard',
            'uses' => 'AdminController@getDashboard'
        ]);
        Route::get('admin/pedidos/{id?}', [
            'as' => 'admin.pedidos',
            'uses' => 'AdminController@getPedidos'
        ]);
        Route::put('admin/pedido/pago/{id}', [
        'as' => 'admin.pedido.pago',
        'uses' => 'AdminController@putPedidoPago'
        ]);
        Route::put('admin/pedido/finalizado/{id}', [
            'as' => 'admin.pedido.finalizado',
            'uses' => 'AdminController@putPedidoFinalizado'
        ]);
        Route::get('admin/listar', [
          'as' => 'admin.listar',
          'uses' => 'AdminController@getListar'
        ]);
        Route::get('admin/lista-pedidos/{id}', [
          'as' => 'admin.lista-pedidos',
          'uses' => 'AdminController@getPedidosCliente'
        ]);
        Route::get('admin/perfil', [
            'as' => 'admin.perfil',
            'uses' => 'AdminController@getPerfil'
        ]);
        
    });
});


//Route::get('/home', 'HomeController@index');
