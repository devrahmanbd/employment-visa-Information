<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visa extends Model
{
     protected $fillable = [
        'visa_number', 'visa_type_ar', 'visa_type_en', 'visa_purpose_ar', 'visa_purpose_en',
        'issue_date', 'expiry_date', 'place_of_issue', 'full_name_ar', 'full_name_en',
        'moi_reference', 'nationality', 'gender', 'occupation_ar', 'occupation_en',
        'dob', 'passport_no', 'passport_type', 'company_name_ar',
        'company_moi_reference', 'mobile_number', 'message'
    ];
}