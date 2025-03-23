<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVisaRequest extends FormRequest
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
            'visa_number' => 'required|string',
            'visa_type_ar' => 'required|string',
            'visa_type_en' => 'required|string',
            'issue_date' => 'required|date',
            'expiry_date' => 'required|date|after_or_equal:issue_date',
            'full_name_ar' => 'required|string',
            'full_name_en' => 'required|string',
            'moi_reference' => 'nullable|string',
            'nationality_en' => 'required|string',
            'nationality_ar' => 'required|string',
            'gender' => 'required|string|in:Male,Female',
            'occupation_ar' => 'nullable|string',
            'occupation_en' => 'nullable|string',
            'dob' => 'required|date|before:today',
            'passport_no' => 'required|string',
            'passport_issue_date' => 'required|date',
            'passport_expiry_date' => 'required|date|after_or_equal:passport_issue_date',
            'company_name_ar' => 'required|string',
            'gender_ar',
            'barcode_text_up',
            'barcode_text_down',
            'passport_type_ar'
        ];
    }

    public function messages()
    {
        return [
            'visa_number.required' => 'The visa number is required.',
            'visa_number.unique' => 'The visa number has already been taken.',
            'expiry_date.after_or_equal' => 'The expiry date must be after or equal to the issue date.',
            'passport_expiry_date.after_or_equal' => 'The passport expiry date must be after or equal to the passport issue date.',
            'dob.before' => 'The date of birth must be before today.',
        ];
    }
}