<?php

namespace Shoppvel\Http\Controllers;

use Illuminate\Http\Request;
use Shoppvel\Http\Requests;
use Shoppvel\Models\Carrinho;
use Shoppvel\Models\Produto;
use Shoppvel\Models\Venda;
use Shoppvel\Models\VendaItem ;
use Shoppvel\Models\User ;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\DB;

class AdminController extends Controller {

    public function getDashboard() {
        $models['qtdePedidos']['total'] = Venda::count();
        $models['qtdePedidos']['pendentes-pagamento'] = Venda::naoPagas()->count();
        $models['qtdePedidos']['pagos'] = Venda::pagas()->count();
        $models['qtdePedidos']['finalizados'] = Venda::finalizadas()->count();
        return view('admin.dashboard', $models);
    }
    
    public function getPerfil() {
        return view('admin.perfil');
    }
    
    function getBuscar(Request $request) {
        $this->validate($request, [
            'termo-pesquisa' => 'required|filled'
                ]
        );

        $termo = $request->get('termo-pesquisa');

        $users = User::where('name', 'LIKE', '%' . $termo . '%')
                ->paginate(10);
                
        //$produtos->setPath('buscar/'.$termo);
        $models['users'] = $users;
        $models['termo'] = $termo;
        return view('admin.busca-clientes', $models);
    }
    public function getListar() {
        //if($users->role == 'cliente'){
            $models['users'] = User::all();
            $users = DB::table('users')
            ->orderByRaw('lower(name)')
            ->get();
            $models['users'] = $users;
            return view('admin.lista-clientes',$models);
       // }
        
    }

    public function getPedidosCliente(Request $req, $id) {
       // $models['vendas'] = Venda::find($user_id);
        $models['pedido'] = User::find($id);
        return view('admin.lista-pedidos', $models);
    }
    
    public function getPedidos(Request $req, $id = null) {
        if ($id == null) {
            if ($req->has('status') == false) {
                $models['tipoVisao'] = 'Todos';
                $models['pedidos'] = Venda::orderBy('data_venda','desc')->get();
                
            } else {
                if ($req->status == 'nao-pagos') {
                    $models['tipoVisao'] = 'Não Pagos';
                    $models['pedidos'] = Venda::naoPagas()->get();
                } else if ($req->status == 'pagos') {
                    $models['tipoVisao'] = 'Pagos';
                    $models['pedidos'] = Venda::pagas()->get();
                } else if ($req->status == 'finalizados') {
                    $models['tipoVisao'] = 'Finalizados/Enviados';
                    $models['pedidos'] = Venda::finalizadas()->get();
                }
            }

           /* $pedidos = DB::table('vendas')
                ->orderBy('data_venda','asc')
                ->get();
                $models['pedidos'] = $pedidos;*/
            return view('admin.pedidos-listar', $models);
        }

        $models['pedido'] = Venda::find($id);
        return view('admin.pedido-detalhes', $models);
    }
    
    public function putPedidoPago(Request $request, $id) {
        $pedido = Venda::find($id);
        
        if ($pedido == null) {
            return back()->withErrors('Pedido não encontrado!');
        }
        
        $pedido->pago = TRUE;
        $pedido->save();
        
        return redirect()->route('admin.pedidos', '?status=pagos')->with('mensagens-sucesso', 'Pedido atualizado');
    }
    
    public function putPedidoFinalizado(Request $request, $id) {
        $pedido = Venda::find($id);
        
        if ($pedido == null) {
            return back()->withErrors('Pedido não encontrado!');
        }
        
        $pedido->enviado = TRUE;
        $pedido->save();
        
        return redirect()->route('admin.pedidos', '?status=finalizados')->with('mensagens-sucesso', 'Pedido finalizado');
    }
}
