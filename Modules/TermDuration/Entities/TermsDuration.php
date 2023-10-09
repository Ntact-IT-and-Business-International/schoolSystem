<?php

namespace Modules\TermDuration\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TermsDuration extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    protected static function newFactory()
    {
        return \Modules\TermDuration\Database\factories\TermsDurationFactory::new();
    }
    public function scopeSearch($query, $val)
    {
    return $query
        ->where('term', 'like', '%'.$val.'%')
        ->orWhere('start_date', 'like', '%'.$val.'%')
        ->orWhere('end_date', 'like', '%'.$val.'%')
        ->orWhere('users.name', 'like', '%'.$val.'%');
    }
    /**
     * This function creates the term duration
     */
    public static function addTermDuration($term,$start_date,$end_date){
        TermsDuration::create([
            'term'       =>$term,
            'start_date' =>$start_date,
            'end_date'   =>$end_date,
            'user_id' =>auth()->user()->id,
        ]);
    }
    /**
     * this function gets all term duration  
     */
    public static function getTermDuration($search, $sortBy, $sortDirection, $perPage)
    {
        return TermsDuration::join('users', 'users.id', 'terms_durations.user_id')
        ->search($search)
        ->orderBy($sortBy, $sortDirection)
        ->paginate($perPage, ['terms_durations.*','users.name']);
    }
    /**
     * This function gets form for editing Term information
     */
    public static function editTermDuration($term_duration_id)
    {
        return TermsDuration::whereId($term_duration_id)->get();
    }

    /**
     * This function updates the edited Term Duration
     */
    public static function updateTermDuration($term_duration_id,$term,$start_date,$end_date)
    {
        TermsDuration::whereId($term_duration_id)->update([
            'term'  =>$term,
            'start_date' =>$start_date,
            'end_date'   =>$end_date,
            'user_id' =>auth()->user()->id,
        ]);
    }
}
