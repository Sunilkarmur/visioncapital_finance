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
    public function businessOne(){
        return $this->hasOne(BusinessDetail::class,'finance_id','id');
    }

    public function financeBanking(){
        return $this->hasMany(FinanceBankLoanAccount::class,'finance_id','id');
    }

    public function savingBanking(){
        return $this->hasMany(SavingBankAccount::class,'finance_id','id');
    }

    public function currentBanking(){
        return $this->hasMany(CurrentBankAccount::class,'finance_id','id');
    }

    public function officeUse(){
        return $this->hasOne(OfficeUse::class,'finance_id','id');
    }

    public function loanAccountDetails(){
        return $this->hasOne(LoanAccount::class,'finance_id','id');
    }
}
