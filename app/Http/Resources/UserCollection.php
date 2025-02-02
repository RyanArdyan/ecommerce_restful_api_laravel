<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    // fungsi collection adalah untuk mengembalikkan daftar data dalam bentuk json
    public function toArray(Request $request): array
    {
        return [
            'meta' => [
                'total' => $this->collection->count()
            ],
            'data' => $this->collection,
        ];
    }
}
