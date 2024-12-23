<?php

namespace App\Models;

use App\Models\question as ModelsQuestion;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Symfony\Component\Console\Question\Question;

class module extends Model
{
    use HasFactory;

    protected $table = "modules";

    public function getMaterial()
    {
        return $this->hasMany(material::class);
    }

    public function getQuestion()
    {
        return $this->hasMany(ModelsQuestion::class);
    }
}
