<?php

namespace Modules\Contact\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Message extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    protected static function newFactory()
    {
        return \Modules\Contact\Database\factories\MessageFactory::new();
    }
    public function scopeSearch($query, $val)
    {
    return $query
        ->where('names', 'like', '%'.$val.'%')
        ->orWhere('contact', 'like', '%'.$val.'%')
        ->orWhere('message','like','%'.$val.'%');
    }
    /**
     * This function creates the team
     */
    public static function addMessage($names,$contact,$subject,$message){
        Message::create([
            'names'      =>$names,
            'contact'     => $contact,
            'subject'    => $subject,
            'message'      => $message,
            'user_id' =>auth()->user()->id,
        ]);
    }
    /**
     * this function gets team
     */
    public static function getMessage($search, $sortBy, $sortDirection, $perPage)
    {
        return Message::search($search)
        ->orderBy($sortBy, $sortDirection)
        ->paginate($perPage);
    }
    /**
     * This function gets form for editing team information
     */
    public static function editMessage($message_id)
    {
        return Message::whereId($message_id)->get();
    }

    /**
     * This function updates the edited team details
     */
    public static function updateMessage($message_id,$names,$contact,$subject,$message)
    {
        Message::whereId($message_id)->update([
            'names'      => $names,
            'contact'      => $contact,
            'subject'    => $subject,
            'message'      => $message,
            'user_id'    =>auth()->user()->id,
        ]);
    }
}
