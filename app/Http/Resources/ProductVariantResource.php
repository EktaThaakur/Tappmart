<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductVariantResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'product' => $this->product,
            'name' => $this->name,
            'premium' => $this->premium,
            'commission' =>     $this->commission,
            'suminsured' => $this->suminsured,
            'grosspremium' => $this->grosspremium,
            'moneyinsafe' => $this->moneyinsafe,
            'neonsign' => $this->neonsign,
            'totalcontent' => $this->totalcontent,
            'image' => $this->image



        ];
    }
}
