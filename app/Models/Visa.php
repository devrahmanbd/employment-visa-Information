<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Visa extends Model
{
    
    protected $fillable = [
       'visa_number',
        'visa_type_ar',
        'visa_type_en',
        'issue_date',
        'expiry_date',
        'full_name_ar',
        'full_name_en',
        'moi_reference',
        'nationality_en',
        'nationality_ar',
        'gender',
        'gender_ar',
        'occupation_ar',
        'occupation_en',
        'dob',
        'passport_no',
        'passport_issue_date',
        'passport_expiry_date',
        'company_name_ar',
        'barcode_text_up',
        'barcode_text_down',
        'passport_type_ar',
        'visa_status',
        'barcode'
    ];   
    
}