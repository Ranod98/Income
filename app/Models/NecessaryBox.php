<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NecessaryBox extends Model
{
    use HasFactory;

    protected $guarded;


    public function income(){

        return $this->belongsTo(Income::class);
    }//end of income relation
}
