<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

abstract class APIRequest extends FormRequest
{
    /**
     * @param Validator $validator
     * @return void
     */
    protected function failedValidation(Validator $validator): void
    {
        $errors = $this->convertErrors($validator->errors()->toArray());

        $response = [
            'success' => false,
            'message' => 'Validation error.',
            'data' => $errors
        ];

        throw new HttpResponseException(response()->json($response, 422));
    }

    /**
     * Форматирование списка ошибок
     *
     * @param array $validationErrors
     * @return array
     */
    private function convertErrors(array $validationErrors): array
    {
        $errors = [];
        foreach ($validationErrors as $field => $messages) {
            $errors[] = [
                'field' => $field,
                'message' => $messages[0],
            ];
        }

        return $errors;
    }
}
