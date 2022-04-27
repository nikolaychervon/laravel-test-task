<?php

namespace App\Http\Requests\Author;

use App\Http\Requests\APIRequest;

class AuthorCreateRequest extends APIRequest
{
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
            'name' => 'required|string|max:100',
            'surname' => 'required|string|max:100',
            'birth_date' => 'required|date_format:Y-m-d',
        ];
    }
}
