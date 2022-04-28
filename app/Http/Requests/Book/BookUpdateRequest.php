<?php

namespace App\Http\Requests\Book;

use App\Http\Requests\APIRequest;
use App\Http\Requests\Traits\HasLeastOneParameter;

class BookUpdateRequest extends APIRequest
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
            'title' => 'sometimes|required|string|max:100',
            'description' => 'sometimes|required|string|max:255',
            'release_date' => 'sometimes|required|date_format:Y-m-d',
            'author_id' => 'sometimes|required|exists:authors,id',
        ];
    }
}
