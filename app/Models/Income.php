<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Income extends Model
{
    use HasFactory;
    protected $guarded;


    public function expense(){

        return $this->hasOne(Expense::class);

    }//end of expense relation

    public function learnBox(){

        return $this->hasOne(LearnBox::class);

    }//end of learnBox relation

    public function necessaryBox(){

        return $this->hasOne(NecessaryBox::class);

    }//end of necessary box relation


    public function selfBox(){

        return $this->hasOne(SelfBox::class);

    }//end of self box relation


    public function incentive(){

        return $this->hasOne(Incentive::class);

    }//end of self box relation


}//end of model
