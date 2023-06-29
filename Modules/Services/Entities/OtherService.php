<?php

namespace Modules\Services\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OtherService extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    protected static function newFactory()
    {
        return \Modules\Services\Database\factories\OtherServiceFactory::new();
    }
    public function scopeSearch($query, $val)
    {
    return $query 
        ->where('other_service', 'like', '%'.$val.'%')
        ->orWhere('description', 'like', '%'.$val.'%')
        ->orWhere('users.name', 'like', '%'.$val.'%');
    }
    /**
     * This function creates the event
     */
    public static function addOtherService($other_service,$description){
        OtherService::create([
            'other_service'   =>$other_service,
            'description'   =>$description,
            'user_id' =>auth()->user()->id,
        ]);
    }
    /**
     * this function gets other services
     */
    public static function getOtherService($search, $sortBy, $sortDirection, $perPage)
    {
        return OtherService::join('users', 'users.id', 'other_services.user_id')
        ->search($search)
        ->orderBy($sortBy, $sortDirection)
        ->paginate($perPage, ['other_services.*','users.name']);
    }
    /**
     * This function gets form for editing Service information
     */
    public static function editOtherService($other_service_id)
    {
        return Service::whereId($other_service_id)->get();
    }

    /**
     * This function upcontents the edited Service details
     */
    public static function updateOtherService($other_service_id,$other_service,$description)
    {
        OtherService::whereId($other_service_id)->update([
            'other_service'      => $other_service,
            'description'      =>$description,
            'user_id'    =>auth()->user()->id,
        ]);
    }
}
