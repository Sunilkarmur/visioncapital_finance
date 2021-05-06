<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoanAccount extends Model
{
    use HasFactory;
    public function emi(){
        return $this->hasOne(EmiInstallment::class,'account_id','account_id')->orderBy('id','desc');
    }
}
