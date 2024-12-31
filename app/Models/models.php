<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class models extends Model
{
    use HasFactory;

    protected $table = "models";

    public function getPermission()
    {
        return $this->hasOne(permission::class);
    }
}
