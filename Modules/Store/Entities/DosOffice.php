<?php

namespace Modules\Store\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DosOffice extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    protected static function newFactory()
    {
        return \Modules\Store\Database\factories\DosOfficeFactory::new();
    }
    public function scopeSearch($query, $val)
    {
    return $query
        ->Where('term', 'like', '%'.$val.'%')
        ->orWhere('date', 'like', '%'.$val.'%')
        ->orWhere('units', 'like', '%'.$val.'%')
        ->orWhere('quantity', 'like', '%'.$val.'%')
        ->orWhere('staffs.staff_first_name', 'like', '%'.$val.'%')
        ->orWhere('scholastics.item_name', 'like', '%'.$val.'%')
        ->orWhere('users.name', 'like', '%'.$val.'%');
    }
    /**
     * This function creates the dos office items
     */
    public static function addItemsGivenOut($staff_id,$term,$date,$units,$quantity,$items_id){
        DosOffice::create([
            'staff_id'  =>$staff_id,
            'term'      =>$term,
            'date'      =>$date,
            'units'     =>$units,
            'quantity'  =>$quantity,
            'items_id'  =>$items_id,
            'user_id' =>auth()->user()->id,
        ]);
    }
    /**
     * this function gets all dos items  
     */
    public static function getDosOfficeItems($search, $sortBy, $sortDirection, $perPage)
    {
        return DosOffice::join('users', 'users.id', 'dos_offices.user_id')
        ->join('scholastics', 'scholastics.id', 'dos_offices.items_id')
        ->join('staffs', 'staffs.id', 'dos_offices.staff_id')
        ->search($search)
        ->orderBy($sortBy, $sortDirection)
        ->paginate($perPage, ['dos_offices.*','users.name','scholastics.item_name','scholastics.stock_quantity','staffs.staff_first_name','staffs.staff_last_name','staffs.staff_other_names']);
    }
    /**
     * This function gets form for editing Dos information
     */
    public static function editStudent($dos_id)
    {
        return DosOffice::whereId($dos_id)->get();
    }

    /**
     * This function updates the edited Dos details
     */
    public static function updateStudentInfo($dos_id,$staff_id,$term,$date,$units,$quantity,$items_id){
        DosOffice::whereId($dos_id)->update([
            'staff_id'  =>$staff_id,
            'term'      =>$term,
            'date'      =>$date,
            'units'     =>$units,
            'quantity'  =>$quantity,
            'items_id'  =>$items_id,
            'user_id'       =>auth()->user()->id,
        ]);
    }
}
