<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resources\RentabilidadeResource as RentabilidadeResource;
use App\Models\RentabilidadeModel as RentabilidadeModel;
use Illuminate\Support\Facades\DB;


class RentabilidadeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $saldo = DB::table('carteira')->sum('saldo');

        $diario = $saldo * 0.01;

        $semanal = $saldo * 0.07;

        $mensal = $saldo * 0.3;

        $dolar = file_get_contents("https://economia.awesomeapi.com.br/last/USD-BRL");

        $bitcoin = file_get_contents("https://economia.awesomeapi.com.br/last/BTC-BRL");

        $etherum = file_get_contents("https://economia.awesomeapi.com.br/last/ETH-BRL");


        $dados = [
            'diario'    =>  number_format($diario, 2, '.', ','),
            'semanal'   =>  number_format($semanal, 2,'.', ','),
            'mensal'    =>  number_format($mensal, 2,'.', ','),
            'dolar'     =>  $dolar,
            'bitcoin'   =>  $bitcoin,
            'etherum'   =>  $etherum
        ];

        return response($dados, 200);



    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
