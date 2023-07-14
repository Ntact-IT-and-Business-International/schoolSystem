<?php

namespace Modules\Store\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attendance extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    protected static function newFactory()
    {
        return \Modules\Store\Database\factories\AttendanceFactory::new();
    }
    public function scopeSearch($query, $val)
    {
    return $query
        ->Where('boys', 'like', '%'.$val.'%')
        ->orWhere('girls', 'like', '%'.$val.'%')
        ->orWhere('date', 'like', '%'.$val.'%')
        ->orWhere('term', 'like', '%'.$val.'%')
        ->orWhere('classes.level', 'like', '%'.$val.'%')
        ->orWhere('users.name', 'like', '%'.$val.'%');
    }
    /**
     * This function creates the attendance items
     */
    public static function addAttendance($class_id,$term,$date,$boys,$girls){
        Attendance::create([
            'class_id'  =>$class_id,
            'term'      =>$term,
            'date'      =>$date,
            'boys'     =>$boys,
            'girls'  =>$girls,
            'user_id' =>auth()->user()->id,
        ]);
    }
    /**
     * this function gets all attendance  
     */
    public static function getAttendance($search, $sortBy, $sortDirection, $perPage)
    {
        return Attendance::join('users', 'users.id', 'attendances.user_id')
        ->join('classes', 'classes.id', 'attendances.class_id')
        ->search($search)
        ->orderBy($sortBy, $sortDirection)
        ->paginate($perPage, ['attendances.*','users.name','classes.level']);
    }
    /**
     * This function gets form for editing Attendance information
     */
    public static function editAttendance($attendance_id)
    {
        return Attendance::whereId($attendance_id)->get();
    }

    /**
     * This function updates the edited Dos details
     */
    public static function updateAttendanceInfo($attendance_id,$term,$date,$boys,$girls){
        Attendance::whereId($attendance_id)->update([
            'term'   =>$term,
            'date'   =>$date,
            'boys'   =>$boys,
            'girls'  =>$girls,
            'user_id'       =>auth()->user()->id,
        ]);
    }
}
