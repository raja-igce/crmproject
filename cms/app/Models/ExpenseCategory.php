<?php
namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;

class ExpenseCategory extends Authenticatable
{
    protected $table = 'ms_expense_category';
}
