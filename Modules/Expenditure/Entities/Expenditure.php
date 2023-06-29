<?php

namespace Modules\Expenditure\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Expenditure extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    protected static function newFactory()
    {
        return \Modules\Expenditure\Database\factories\ExpenditureFactory::new();
    }
    public function scopeSearch($query, $val)
    {
    return $query
        ->where('item', 'like', '%'.$val.'%')
        ->orWhere('quantity', 'like', '%'.$val.'%')
        ->orWhere('unit_price', 'like', '%'.$val.'%') 
        ->orWhere('amount', 'like', '%'.$val.'%')
        ->orWhere('signed_by', 'like', '%'.$val.'%')
        ->orWhere('users.name', 'like', '%'.$val.'%');
    }
    /**
     * This function creates the expenditure
     */
    public static function addExpenditure($item,$user_type_id,$quantity,$unit_price,$amount,$signed_by){
        Expenditure::create([
            'item'         =>$item,
            'user_type_id' =>$user_type_id,
            'quantity'     =>$quantity,
            'unit_price'  =>$unit_price,
            'amount'      =>$amount,
            'signed_by'   =>$signed_by,
            'user_id' =>auth()->user()->id,
        ]);
    }
    /**
     * this function gets all expenditure  
     */
    public static function getExpenditure($search, $sortBy, $sortDirection, $perPage)
    {
        return Expenditure::join('users', 'users.id', 'expenditures.user_id')
        ->join('user_types','user_types.id','expenditures.user_type_id')
        ->search($search)
        ->orderBy($sortBy, $sortDirection)
        ->paginate($perPage, ['expenditures.*','users.name','user_types.category']);
    }
    /**
     * This function gets form for editing expenditure information
     */
    public static function editExpenditure($expenditure_id)
    {
        return Expenditure::whereId($expenditure_id)->get();
    }

    /**
     * This function updates the edited expenditure
     */
    public static function updatExpenditureInfo($expenditure_id,$item,$quantity,$unit_price,$amount,$signed_by)
    {
        Expenditure::whereId($expenditure_id)->update([
            'item'        => $item,
            'quantity'    => $quantity,
            'unit_price'  => $unit_price,
            'amount'      => $amount,
            'signed_by'   =>$signed_by,
            'user_id'     =>auth()->user()->id,
        ]);
    }
}
