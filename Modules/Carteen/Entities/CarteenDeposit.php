<?php

namespace Modules\Carteen\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CarteenDeposit extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    protected static function newFactory()
    {
        return \Modules\Carteen\Database\factories\CarteenDepositFactory::new();
    }
    public function scopeSearch($query, $val)
    {
    return $query
        ->where('amount_deposited', 'like', '%'.$val.'%') 
        ->orWhere('students.last_name', 'like', '%'.$val.'%')
        ->orWhere('term','like','%'.$val.'%')
        ->orWhere('date_of_deposit','like','%'.$val.'%')
        ->orWhere('users.name','like','%'.$val.'%');
    }
    /**
     * This function creates the Carteen Deposit
     */
    public static function addCarteenDeposit($student_id,$term,$amount_deposited,$date_of_deposit){
        CarteenDeposit::create([
            'student_id'       =>$student_id,
            'term'             =>$term,
            'amount_deposited' =>$amount_deposited,
            'date_of_deposit'  =>$date_of_deposit,
            'user_id' =>auth()->user()->id,
        ]);
    }
    /**
     * this function gets Carteen Deposits
     */
    public static function getCarteenDeposit($search, $sortBy, $sortDirection, $perPage)
    {
        return CarteenDeposit::join('students','students.id','carteen_deposits.student_id')
        ->join('users','users.id','carteen_deposits.user_id')
        ->search($search)
        ->orderBy($sortBy, $sortDirection)
        ->paginate($perPage,['carteen_deposits.*','students.last_name','students.first_name','students.other_names','users.name']);
    }
    /**
     * This function gets form for editing Carteen information
     */
    public static function editCarteenDeposit($carteen_id)
    {
        return CarteenDeposit::whereId($carteen_id)->get();
    }

    /**
     * This function updates the edited Carteen Deposit Data
     */
    public static function updateCarteenDeposit($carteen_id,$amount_deposited,$date_of_deposit)
    {
        CarteenDeposit::whereId($carteen_id)->update([
            'date_of_deposit'  =>$date_of_deposit,
            'amount_deposited' => $amount_deposited,
            'user_id'         =>auth()->user()->id,
        ]);
    }
}
