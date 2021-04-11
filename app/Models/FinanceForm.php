<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\BusinessDetail;

class FinanceForm extends Model
{
    use HasFactory,SoftDeletes;

    public function business(){
        return $this->hasMany(BusinessDetail::class,'finance_id','id');
    }
}
