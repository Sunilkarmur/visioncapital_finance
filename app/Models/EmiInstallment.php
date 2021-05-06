<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmiInstallment extends Model
{
    use HasFactory;

    public function loanAccount(){
        return $this->belongsTo(LoanAccount::class,'account_id','account_id');
    }
}
