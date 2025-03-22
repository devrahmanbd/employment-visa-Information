<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ManualVisa extends Model
{
    protected $fillable = [
        'passport_no',
        'dob',
        'nationality_en',
        'pdf_file',
    ];
}