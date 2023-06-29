<?php

namespace Modules\Carteen\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Carteen extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    protected static function newFactory()
    {
        return \Modules\Carteen\Database\factories\CarteenFactory::new();
    }
    public function scopeSearch($query, $val)
    {
    return $query
        ->where('item_bought', 'like', '%'.$val.'%')
        ->orWhere('students.last_name', 'like', '%'.$val.'%')
        ->orWhere('price','like','%'.$val.'%')
        ->orWhere('number','like','%'.$val.'%')
        ->orWhere('term','like','%'.$val.'%')
        ->orWhere('users.name','like','%'.$val.'%');
    }
    /**
     * This function creates the Carteen
     */
    public static function addCarteenDailySpendings($student_id,$term,$item_bought,$number,$price){
        Carteen::create([
            'student_id'    =>$student_id,
            'term'          =>$term,
            'item_bought'   =>$item_bought,
            'number'        =>$number,
            'price'         => $price,
            'user_id' =>auth()->user()->id,
        ]);
    }
    /**
     * this function gets Carteen Daily Spendings
     */
    public static function getCarteenSpendings($search, $sortBy, $sortDirection, $perPage)
    {
        return Carteen::join('students','students.id','carteens.student_id')
        ->join('users','users.id','carteens.user_id')->search($search)
        ->orderBy($sortBy, $sortDirection)
        ->paginate($perPage,['carteens.*','students.last_name','students.first_name','students.other_names','users.name']);
    }
    /**
     * This function gets form for editing Carteen information
     */
    public static function editCarteenSpendings($carteen_id)
    {
        return Carteen::whereId($carteen_id)->get();
    }

    /**
     * This function updates the edited Carteen Data
     */
    public static function updateCarteen($carteen_id,$term,$number,$price)
    {
        Carteen::whereId($carteen_id)->update([
            'term'          =>$term,
            'number'        =>$number,
            'price'         => $price,
            'user_id'         =>auth()->user()->id,
        ]);
    }
}
