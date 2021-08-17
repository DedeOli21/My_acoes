<?php


namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Resources\Carteira as CarteiraResource;
use App\Models\carteiraModel as Carteira;

class CarteiraController extends Controller
{

    public function index()
    {
        $acoes = Carteira::paginate(15);
        return CarteiraResource::collection($acoes);
    }

    public function create()
    {
        //
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
