<?php

namespace App\Http\Resources;
use Illuminate\Http\Resources\Json\JsonResource;

class Carteira extends JsonResource
{
    protected $table = 'carteira';

    public function toArray($request)
    {
        return [
            'id'            => $this->id,
            'nome'          => $this->nome,
            'descricao'     => $this->descricao,
            'valor'         => $this->valor,
        ];
//        return parent::toArray($request);
    }
}
