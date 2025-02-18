<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    // fungsi Resource adalah untuk mengembalikkan detail data dalam bentuk json
    public function toArray(Request $request): array
    {
        // menentukan value column database apa saja yang akan dikembalikkan
        return [
            'message' => 'success',
            'user_id' => $this->user_id,
            'username' => $this->username,
            'email' => $this->email,
        ];
    }
}
