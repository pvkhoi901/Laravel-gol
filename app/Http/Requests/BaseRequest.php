<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Http\JsonResponse;

class BaseRequest extends FormRequest
{
    protected function failedValidation(Validator $validator)
    {
        // check request is application/json
        if ($this->expectsJson()) throw new HttpResponseException(response()->json([
            'code'  => JsonResponse::HTTP_UNPROCESSABLE_ENTITY,
            'message' => $validator->errors(),
        ], JsonResponse::HTTP_UNPROCESSABLE_ENTITY));

        parent::failedValidation($this->validator);
    }
}