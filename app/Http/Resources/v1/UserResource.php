<?php

namespace App\Http\Resources\v1;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this['id'],
            'identification_number' => $this['identification_number'],
            'mobile_number' => $this['mobile_number'],
            'meta' => $this['meta'],
            'birth_date' => $this['birth_date'],
            'created_at' => $this["created_at"],
            'updated_at' => $this['updated_at'],
            'transactions' => TransactionResource::collection($this['transactions']),
        ];
    }
}
