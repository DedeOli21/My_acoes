<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Resources\Carteira as CarteiraResource;
use App\Models\carteiraModel as Carteira;
use Illuminate\Support\Facades\DB;

class CarteiraController extends Controller
{
    protected $table = 'carteira';

    public function index()
    {
        $carteira = DB::select('select * from carteira ');
        $saldo = DB::table('carteira')->sum('saldo');
        $atualizacao = DB::table('carteira')->select('updated_at')->get();


        $dados = array(
            'carteira' => $carteira,
            'saldo'    => $saldo,
            'atualizacao' => $atualizacao

        );

//        dd($dados);

        return $dados;
    }

    public function investir(Request $request){
        $saldo  = DB::table('carteira')->sum('saldo');
        $deposito = $request->input('valor');
        $option = $request->input('opcao');

        if($option == 1){
            $dados  = Carteira::find(1);
            $dados->saldo = $saldo + $deposito;
            $dados->updated_at = time();

            if($dados->save()) {
                return response("Deposito realizado com sucesso no valor de " . $deposito, 200);
            };


        }

        else if ($option == 2){

            $dados  = Carteira::find(1);
            $dados->saldo = $saldo + $deposito;
            $dados->updated_at = time();

            if($dados->save()) {
                return response('Lucro reinvestido com sucesso no valor de ' . $deposito, 200);
            };
        }

        else if ($option == 3){
            $dados  = Carteira::find(1);
            $dados->saldo = $saldo - $deposito;
            $dados->updated_at = time();


            if($dados->save()) {
                return response("Saque realizado com sucesso no valor de " . $deposito, 200);
            };
        }


        return response("Sucesso", 200);
    }


    public function store(Request $request)
    {
        $acoes = new Carteira();
        $acoes->nome = $request->input('nome');
        $acoes->descricao = $request->input('descricao');
        $acoes->valor = $request->input('valor');


        if( $acoes->save() ){
            return new CarteiraResource( $acoes );
        }
    }


    public function show($id)
    {
        $acoes = Carteira::findOrFail( $id );
        return new CarteiraResource( $acoes );
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        $acoes = Carteira::findOrFail( $request->id );
        $acoes->nome = $request->input('nome');
        $acoes->descricao = $request->input('descricao');
        $acoes->valor = $request->input('valor');


        if( $acoes->save() ){
            return new CarteiraResource( $acoes );
        }
    }


    public function destroy($id)
    {
        $acoes = Carteira::findOrFail( $id );
        if( $acoes->delete() ){
            return new CarteiraResource( $acoes );
        }
    }
}
