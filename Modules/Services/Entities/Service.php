<?php

namespace Modules\Services\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Service extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    protected static function newFactory()
    {
        return \Modules\Services\Database\factories\ServiceFactory::new();
    }
    public function scopeSearch($query, $val)
    {
    return $query 
        ->where('service', 'like', '%'.$val.'%')
        ->orWhere('content', 'like', '%'.$val.'%')
        ->orWhere('users.name', 'like', '%'.$val.'%');
    }
    /**
     * This function creates the event
     */
    public static function addService($service,$content,$image){
        Service::create([
            'service'   =>$service,
            'content'   =>$content,
            'image'     => $image,
            'user_id' =>auth()->user()->id,
        ]);
    }
    /**
     * this function gets services
     */
    public static function getService($search, $sortBy, $sortDirection, $perPage)
    {
        return Service::join('users', 'users.id', 'services.user_id')
        ->search($search)
        ->orderBy($sortBy, $sortDirection)
        ->paginate($perPage, ['services.*','users.name']);
    }
    /**
     * This function gets form for editing Event information
     */
    public static function editService($event_id)
    {
        return Service::whereId($event_id)->get();
    }

    /**
     * This function upcontents the edited Event details
     */
    public static function updateService($event_id,$service,$content,$image)
    {
        Service::whereId($event_id)->update([
            'service'      => $service,
            'content'      =>$content,
            'image'         => $image,
            'user_id'    =>auth()->user()->id,
        ]);
    }
}
