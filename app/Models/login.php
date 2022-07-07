<?php

namespace App\Models;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @method static where(string $string, mixed $email)
 * @method static make(array $all, string[] $array)
 */
class login extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = [
        'Name',
        'Email',
    ];

}



///**
// * @method static where(string $string, mixed $email)
// */
//class login extends Model
//{
//    use HasFactory;
//}
