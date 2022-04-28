<?php

namespace App\Http\Requests\Author;

use App\Http\Requests\APIRequest;
use App\Http\Requests\Traits\HasLeastOneParameter;

class AuthorUpdateRequest extends APIRequest
{
    use HasLeastOneParameter;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'name' => 'sometimes|required|string|max:100',
            'surname' => 'sometimes|required|string|max:100',
            'birth_date' => 'sometimes|required|date_format:Y-m-d',
        ];
    }
}
