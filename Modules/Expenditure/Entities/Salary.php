<?php

namespace Modules\Expenditure\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Salary extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    protected static function newFactory()
    {
        return \Modules\Salary\Database\factories\SalaryFactory::new();
    }
    public function scopeSearch($query, $val)
    {
    return $query
        ->where('staff_first_name', 'like', '%'.$val.'%')
        ->orWhere('quantity', 'like', '%'.$val.'%')
        ->orWhere('amount', 'like', '%'.$val.'%')
        ->orWhere('paid_on_date', 'like', '%'.$val.'%') 
        ->orWhere('users.name', 'like', '%'.$val.'%');
    }
    /**
     * This function creates the Salary
     */
    public static function addSalary($staff_id,$quantity,$actual_salary,$amount,$paid_on_date){
        Salary::create([
            'staff_id'      =>$staff_id,
            'quantity'      =>$quantity,
            'actual_salary' =>$actual_salary,
            'amount'        =>$amount,
            'paid_on_date'  =>$paid_on_date,
            'user_id' =>auth()->user()->id,
        ]);
    }
    /**
     * this function gets all Salary  
     */
    public static function getSalary($search, $sortBy, $sortDirection, $perPage)
    {
        return Salary::join('users', 'users.id', 'salaries.user_id')
        ->join('staffs', 'staffs.id', 'salaries.staff_id')
        ->search($search)
        ->orderBy($sortBy, $sortDirection)
        ->paginate($perPage, ['salaries.*','users.name','staffs.staff_last_name','staffs.staff_first_name','staffs.staff_other_names']);
    }
    /**
     * This function gets form for editing Salary information
     */
    public static function editSalary($salary_id)
    {
        return Salary::whereId($salary_id)->get();
    }

    /**
     * This function updates the edited Salary
     */
    public static function updateSalaryInfo($salary_id,$staff_id,$amount,$quantity,$paid_on_date)
    {
        Salary::whereId($salary_id)->update([
            'staff_id'       => $staff_id,
            'quantity'       =>$quantity,
            'amount'         => $amount,
            'paid_on_date'   =>$paid_on_date,
            'user_id'        =>auth()->user()->id,
        ]);
    }
}
