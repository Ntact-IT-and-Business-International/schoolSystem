<?php

namespace Modules\Nurse\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SickbayItem extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    protected static function newFactory()
    {
        return \Modules\Nurse\Database\factories\SickbayItemFactory::new();
    }
    public function scopeSearch($query, $val)
    {
    return $query
        ->where('medicine_name', 'like', '%'.$val.'%')
        ->orWhere('users.name','like','%'.$val.'%');
    }
    /**
     * This function creates the Medicine Item
     */
    public static function addMedicine($medicine_name){
        SickbayItem::create([
            'medicine_name'  =>$medicine_name,
            'user_id' =>auth()->user()->id,
        ]);
    }
}
