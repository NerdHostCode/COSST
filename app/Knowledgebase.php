<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Knowledgebase extends Model
{
    protected $table = 'knowledgebase';

    public function categoryData()
    {
        return $this->hasOne('\App\KnowledgebaseCategory', 'id', 'category');
    }
}
