<?php

namespace Modules\Services\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Event extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    protected static function newFactory()
    {
        return \Modules\Services\Database\factories\EventFactory::new();
    }
    public function scopeSearch($query, $val)
    {
    return $query 
        ->where('title', 'like', '%'.$val.'%')
        ->orWhere('date', 'like', '%'.$val.'%')
        ->orWhere('users.name', 'like', '%'.$val.'%');
    }
    /**
     * This function creates the event
     */
    public static function addEvent($title,$date,$event_image){
        Event::create([
            'title'      =>$title,
            'date'       =>$date,
            'event_image'=> $event_image,
            'user_id' =>auth()->user()->id,
        ]);
    }
    /**
     * this function gets event
     */
    public static function getEvent($search, $sortBy, $sortDirection, $perPage)
    {
        return Event::join('users', 'users.id', 'events.user_id')
        ->search($search)
        ->orderBy($sortBy, $sortDirection)
        ->paginate($perPage, ['Events.*','users.name']);
    }
    /**
     * This function gets form for editing Event information
     */
    public static function editEvent($event_id)
    {
        return Event::whereId($event_id)->get();
    }

    /**
     * This function updates the edited Event details
     */
    public static function updateEvent($event_id,$title,$date,$event_image)
    {
        Event::whereId($event_id)->update([
            'title'      => $title,
            'date'       =>$date,
            'event_image'      => $event_image,
            'user_id'    =>auth()->user()->id,
        ]);
    }
}
