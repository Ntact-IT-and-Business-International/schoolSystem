<?php

namespace Modules\Timetable\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TimeTable extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    protected static function newFactory()
    {
        return \Modules\Timetable\Database\factories\TimeTableFactory::new();
    }
    public function scopeSearch($query, $val)
    {
    return $query
        ->where('staffs.staff_first_name', 'like', '%'.$val.'%')
        ->orWhere('classes.level', 'like', '%'.$val.'%')
        ->orWhere('subjects.subject','like','%'.$val.'%')
        ->orWhere('day','like','%'.$val.'%')
        ->orWhere('starting_time','like','%'.$val.'%')
        ->orWhere('end_time','like','%'.$val.'%')
        ->orWhere('timetable_status','like','%'.$val.'%')
        ->orWhere('users.name', 'like', '%'.$val.'%');
    }
    /**
     * This function creates the timetable
     */
    public static function addTimeTable($staff_id,$class_id,$subject_id,$day,$starting_time,$end_time,$timetable_status){
        TimeTable::create([
            'staff_id'      =>$staff_id,
            'class_id'      => $class_id,
            'subject_id'    => $subject_id,
            'day'           =>$day,
            'starting_time' => $starting_time,
            'end_time'      => $end_time,
            'timetable_status'      => $timetable_status,
            'user_id' =>auth()->user()->id,
        ]);
    }
    /**
     * this function gets timetable
     */
    public static function getTimeTable($search, $sortBy, $sortDirection, $perPage)
    {
        return TimeTable::join('users', 'users.id', 'time_tables.user_id')
        ->join('classes', 'classes.id', 'time_tables.class_id')
        ->join('staffs', 'staffs.id', 'time_tables.staff_id')
        ->join('subjects', 'subjects.id', 'time_tables.subject_id')
        ->search($search)
        ->orderBy($sortBy, $sortDirection)
        ->paginate($perPage, ['time_tables.*','users.name','classes.level','subjects.subject','staffs.staff_last_name','staffs.staff_first_name','staffs.staff_other_names']);
    }
    /**
     * This function gets form for editing timetable information
     */
    public static function editTimeTable($timetable_id)
    {
        return TimeTable::whereId($timetable_id)->get();
    }

    /**
     * This function updates the edited timetable deails
     */
    public static function updateTimeTableInfo($timetable_id,$staff_id,$class_id,$subject_id,$day,$starting_time,$end_time,$timetable_status)
    {
        TimeTable::whereId($timetable_id)->update([
            'staff_id'      =>$staff_id,
            'class_id'      => $class_id,
            'subject_id'    => $subject_id,
            'day'           =>$day,
            'starting_time' => $starting_time,
            'end_time'      => $end_time,
            'timetable_status' => $timetable_status,
            'user_id'     =>auth()->user()->id,
        ]);
    }
}
