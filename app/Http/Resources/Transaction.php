<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\Transaction_dtl as TransactionDetailResource;
use App\transaction_dtl;

class Transaction extends JsonResource
{
    /**
     * Transform the resource into an array..
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'                    => $this->id,
            'paid'                  => $this->paid,
            'created_at'            => $this->created_at->format('d/m/Y H:i:s'),
            'transaction_details'   => TransactionDetailResource::collection(Transaction_dtl::where('transaction_id', $this->id)->get())
        ];
    }
}
