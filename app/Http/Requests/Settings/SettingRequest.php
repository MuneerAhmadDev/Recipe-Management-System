<?php

namespace App\Http\Requests\Settings;

use Illuminate\Foundation\Http\FormRequest;

class SettingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'company_logo' => ['image', 'max:4096'],
            'company_name' => ['required', 'string', 'min:8'],
            'company_email' => ['required', 'string', 'email'],
            'company_address' => ['required', 'string'],
            'company_description' => ['required', 'string'],
            'company_phone' => ['required', 'numeric', 'digits:11'],
            'company_copyright' => ['required', 'string'],
        ];
    }

    public function attributes(): array
    {
        return [
            'company_logo' => 'Logo',
            'company_name' => 'Company Name',
            'company_email' => 'Company Email',
            'company_address' => 'Company Address',
            'company_description' => 'Company Description',
            'company_phone' => 'Company Phone Number',
            'company_copyright' => 'Copyright',
        ];
    }
}
