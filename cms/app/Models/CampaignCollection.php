<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class CampaignCollection extends Authenticatable
{
    protected $table = 'campaign_collection';
    public function getPerson()
    {
        return $this->hasOne('App\User', 'id', 'respose_user');
    }
    
    public function getExpenseCategory()
    {
        return $this->hasOne('App\Models\ExpenseCategory', 'id', 'expense_category');
    }
}
