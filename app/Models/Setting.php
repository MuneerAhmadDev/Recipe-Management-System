<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'company_name',
        'company_email',
        'company_address',
        'company_description',
        'company_phone',
        'company_copyright',
        'company_logo',
    ];
}
