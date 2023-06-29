<?php

namespace Modules\About\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class OurTeam extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    protected static function newFactory()
    {
        return \Modules\About\Database\factories\OurTeamFactory::new();
    }
    public function scopeSearch($query, $val)
    {
    return $query
        ->Where('title', 'like', '%'.$val.'%')
        ->orWhere('contact','like','%'.$val.'%')
        ->orWhere('users.name', 'like', '%'.$val.'%');
    }
    /**
     * This function creates the team
     */
    public static function addTeam($staff_id,$title,$contact,$photo){
        OurTeam::create([
            'staff_id'   =>$staff_id,
            'title'      => $title,
            'contact'    => $contact,
            'photo'      => $photo,
            'user_id' =>auth()->user()->id,
        ]);
    }
    /**
     * this function gets team
     */
    public static function getTeam($search, $sortBy, $sortDirection, $perPage)
    {
        return OurTeam::join('users', 'users.id', 'our_teams.staff_id')
        ->search($search)
        ->orderBy($sortBy, $sortDirection)
        ->paginate($perPage, ['our_teams.*','users.name']);
    }
    /**
     * This function gets form for editing team information
     */
    public static function editTeam($team_id)
    {
        return OurTeam::whereId($team_id)->get();
    }

    /**
     * This function updates the edited team details
     */
    public static function updateTeam($team_id,$staff_id,$title,$contact,$photo)
    {
        OurTeam::whereId($team_id)->update([
            'staff_id'      => $staff_id,
            'title'      => $title,
            'contact'    => $contact,
            'photo'      => $photo,
            'user_id'    =>auth()->user()->id,
        ]);
    }
}
