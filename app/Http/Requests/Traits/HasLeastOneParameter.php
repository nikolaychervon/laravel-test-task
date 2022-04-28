<?php

namespace App\Http\Requests\Traits;

use App\Http\Response\APIResponse;
use Illuminate\Http\Exceptions\HttpResponseException;

trait HasLeastOneParameter
{
    /**
     * @return void
     */
    protected function passedValidation(): void
    {
        if (empty($this->validated())) {
            $response = APIResponse::error('Pass at least 1 parameter.', 400);
            throw new HttpResponseException($response);
        }
    }
}
