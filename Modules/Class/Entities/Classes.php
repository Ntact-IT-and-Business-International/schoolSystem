<?php

namespace Modules\Class\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Classes extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    protected static function newFactory()
    {
        return \Modules\Class\Database\factories\ClassesFactory::new();
    }
    public function scopeSearch($query, $val)
    {
    return $query
        ->where('level', 'like', '%'.$val.'%')
        ->orWhere('users.name', 'like', '%'.$val.'%');
    }
    /**
     * This function creates the classes
     */
    public static function addClasses($level){
        Classes::create([
            'level' =>$level,
            'user_id' =>auth()->user()->id,
        ]);
    }
    /**
     * this function gets all classes  
     */
    public static function getClasses($search, $sortBy, $sortDirection, $perPage)
    {
        return Classes::join('users', 'users.id', 'classes.user_id')
        ->search($search)
        ->orderBy($sortBy, $sortDirection)
        ->paginate($perPage, ['classes.*','users.name']);
    }
    /**
     * This function gets form for editing Class information
     */
    public static function editClass($class_id)
    {
        return Classes::whereId($class_id)->get();
    }

    /**
     * This function updates the edited class
     */
    public static function updateClasses($class_id,$level)
    {
        Classes::whereId($class_id)->update([
            'level'    => $level,
        ]);
    }
}
