<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property string $birth_date
 * @property Carbon $created_at
 */
class AuthorResource extends JsonResource
{
    /**
     * @param $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'surname' => $this->surname,
            'birth_date' => $this->birth_date,
            'created_at' => str($this->created_at),
        ];
    }
}
