<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class DataUser  extends Authenticatable // Ganti nama kelas menjadi DataUser 
{
    protected $table = 'accounts_users';
    protected $fillable = [
        'f_name',
        'l_name',
        'email',
        'password',
        'phone',
    ];

    public $timestamps = false;

    // Jika Anda ingin menggunakan hashing untuk password
    public function getAuthPassword()
    {
        return $this->password;
    }
}
