<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, $id)
 * @method static find(int|string $id)
 */
class Company extends Model
{
    use HasFactory;
    protected $table = 'companies';
    protected $fillable = [
        'Company_Name',
        'Company_Address',
        'Company_Number',
    ];

}
