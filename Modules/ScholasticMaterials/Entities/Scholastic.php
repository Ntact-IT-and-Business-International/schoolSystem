<?php

namespace Modules\ScholasticMaterials\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Scholastic extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    protected static function newFactory()
    {
        return \Modules\ScholasticMaterials\Database\factories\ScholasticFactory::new();
    }
    public function scopeSearch($query, $val)
    {
    return $query
        ->where('item_name', 'like', '%'.$val.'%')
        ->orWhere('stock_quantity', 'like', '%'.$val.'%')
        ->orWhere('users.name', 'like', '%'.$val.'%');
    }
    /**
     * This function creates the Scholastic
     */
    public static function addScholastic($item_name,$stock_quantity){
        Scholastic::create([
            'item_name'        =>$item_name,
            'stock_quantity'   =>$stock_quantity,
            'user_id' =>auth()->user()->id,
        ]);
    }
    /**
     * this function gets all Scholastic  
     */
    public static function getScholastic($search, $sortBy, $sortDirection, $perPage)
    {
        return Scholastic::join('users', 'users.id', 'scholastics.user_id')
        ->search($search)
        ->orderBy($sortBy, $sortDirection)
        ->paginate($perPage, ['scholastics.*','users.name']);
    }
    /**
     * This function gets form for editing Scholastic information
     */
    public static function editScholastic($scholastic_id)
    {
        return Scholastic::whereId($scholastic_id)->get();
    }

    /**
     * This function updates the edited Scholastic
     */
    public static function updateScholasticInfo($scholastic_id,$item_name,$stock_quantity)
    {
        Scholastic::whereId($scholastic_id)->update([
            'item_name'       => $item_name,
            'stock_quantity'  => $stock_quantity,
            'user_id'         =>auth()->user()->id,
        ]);
    }
}
