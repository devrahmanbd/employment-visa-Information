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
            'visa_number' => 'required|string|unique:visas', // Visa number should be unique in the visas table
            'visa_type_ar' => 'required|string',
            'visa_type_en' => 'required|string',
            'visa_purpose_ar' => 'required|string',
            'visa_purpose_en' => 'required|string',
            'issue_date' => 'required|date',
            'expiry_date' => 'required|date|after_or_equal:issue_date', // Expiry date should be after or equal to issue date
            'place_of_issue' => 'required|string',
            'place_issue'=> 'required|string',
            'full_name_ar' => 'required|string',
            'full_name_en' => 'required|string',
            'moi_reference' => 'nullable|string', // MOI reference is optional
            'nationality' => 'required|string',
            'gender' => 'required|string|in:Male,Female', // Only allow Male or Female
            'occupation_ar' => 'nullable|string',
            'occupation_en' => 'nullable|string',
            'dob' => 'required|date|before:today', // Date of birth must be before today's date
            'passport_no' => 'required|string',
            'passport_type' => 'required|string|in:Diplomatic,Official,Normal', // Passport type must be one of these
            'company_name_ar' => 'required|string',
            'company_moi_reference' => 'nullable|string',
            'mobile_number' => 'required|string|regex:/^([0-9\s\-\+\(\)]*)$/', // Allow only valid phone number format
            'message' => 'nullable|string',
        ];
    }

     public function messages()
    {
        return [
            'visa_number.required' => 'The visa number is required.',
            'visa_number.unique' => 'The visa number has already been taken.',
            'expiry_date.after_or_equal' => 'The expiry date must be after or equal to the issue date.',
            'mobile_number.regex' => 'The mobile number is not in a valid format.',
            'dob.before' => 'The date of birth must be before today.',
        ];
    }
}