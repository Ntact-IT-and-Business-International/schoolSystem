<?php

namespace Modules\Store\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Store extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    protected static function newFactory()
    {
        return \Modules\Store\Database\factories\StoreFactory::new();
    }
    public function scopeSearch($query, $val)
    {
    return $query
        ->Where('term', 'like', '%'.$val.'%')
        ->orWhere('scholastics.item_name', 'like', '%'.$val.'%')
        ->orWhere('number', 'like', '%'.$val.'%')
        ->orWhere('date', 'like', '%'.$val.'%')
        ->orWhere('unit', 'like', '%'.$val.'%')
        ->orWhere('responsible_person', 'like', '%'.$val.'%')
        ->orWhere('users.name', 'like', '%'.$val.'%');
    }
    /**
     * This function creates the store items given out
     */
    public static function addStore($itemm_id,$term,$number,$date,$unit,$responsible_person){
        Store::create([
            'itemm_id'    =>$itemm_id,
            'term'        =>$term,
            'number'      =>$number,
            'date'        =>$date,
            'unit'        =>$unit,
            'responsible_person' =>$responsible_person,
            'user_id' =>auth()->user()->id,
        ]);
    }
    /**
     * this function gets all stores  
     */
    public static function getStore($search, $sortBy, $sortDirection, $perPage)
    {
        return Store::join('users', 'users.id', 'stores.user_id')
        ->join('scholastics', 'scholastics.id', 'stores.itemm_id')
        ->search($search)
        ->orderBy($sortBy, $sortDirection)
        ->paginate($perPage, ['stores.*','users.name','scholastics.item_name','scholastics.stock_quantity']);
    }
    /**
     * This function gets form for editing stores information
     */
    public static function editStores($store_id)
    {
        return Store::whereId($store_id)->get();
    }

    /**
     * This function updates the edited store
     */
    public static function updateStoreInfo($store_id,$itemm_id,$term,$number,$date,$unit,$responsible_person)
    {
        Store::whereId($store_id)->update([
            'itemm_id'    => $itemm_id,
            'term'        => $term,
            'number'      => $number,
            'date'        => $date,
            'unit'        => $unit,
            'responsible_person'  => $responsible_person,
            'user_id'       =>auth()->user()->id,
        ]);
    }
}
