<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class question extends Model
{
    use HasFactory;
    protected $table = "questions";

    public function getOption()
    {
        return $this->hasOne(options::class);
    }
}
