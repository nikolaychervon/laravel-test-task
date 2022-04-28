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
            $response = APIResponse::error(__('api.errors.min_one_parameter'), 400);
            throw new HttpResponseException($response);
        }
    }
}
