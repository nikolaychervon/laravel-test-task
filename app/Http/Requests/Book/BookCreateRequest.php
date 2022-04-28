<?php

namespace App\Http\Requests\Book;

use App\Http\Requests\APIRequest;
use Illuminate\Validation\Rule;

class BookCreateRequest extends APIRequest
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
            'title' => 'required|string|max:100',
            'description' => 'required|string|max:255',
            'release_date' => 'required|date_format:Y-m-d',
            'author_id' => ['required', Rule::exists('authors', 'id')->withoutTrashed()],
        ];
    }
}
