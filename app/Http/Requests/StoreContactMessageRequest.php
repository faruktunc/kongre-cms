<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Validator;
use RyanChandler\LaravelCloudflareTurnstile\Rules\Turnstile;

class StoreContactMessageRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /** @return array<string, ValidationRule|array<mixed>|string> */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string', 'min:2', 'max:120'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'subject' => ['required', 'string', 'min:3', 'max:180'],
            'message' => ['required', 'string', 'min:10', 'max:5000'],
            'website' => ['prohibited'],
            'form_started_at' => ['required', 'integer', 'min:1'],
            'cf-turnstile-response' => ['required', new Turnstile],
        ];
    }

    /** @return array<string, string> */
    public function messages(): array
    {
        return [
            'cf-turnstile-response.required' => 'Lütfen güvenlik doğrulamasını tamamlayın.',
        ];
    }

    public function after(): array
    {
        return [
            function (Validator $validator): void {
                $startedAt = (int) $this->input('form_started_at', 0);
                $elapsedSeconds = time() - $startedAt;

                if ($elapsedSeconds < 3) {
                    $validator->errors()->add('form', 'Form çok hızlı gönderildi.');
                }
            },
        ];
    }
}
