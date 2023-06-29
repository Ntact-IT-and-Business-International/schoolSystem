<?php

namespace Modules\ReportCard\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HolidayPackage extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    protected static function newFactory()
    {
        return \Modules\ReportCard\Database\factories\HolidayPackageFactory::new();
    }
    public function scopeSearch($query, $val)
    {
    return $query
        ->where('classes.level', 'like', '%'.$val.'%')
        ->orWhere('subjects.subject','like','%'.$val.'%')
        ->orWhere('term','like','%'.$val.'%')
        ->orWhere('package','like','%'.$val.'%')
        ->orWhere('holiday_packages.created_at','like','%'.$val.'%')
        ->orWhere('users.name', 'like', '%'.$val.'%');
    }
    /**
     * This function creates the Holiday Package
     */
    public static function addHolidayPackage($class_id,$subject_id,$term,$package){
        HolidayPackage::create([
            'class_id'         => $class_id,
            'subject_id'       => $subject_id,
            'term'             => $term,
            'package'          => $package, 
            'user_id'          =>auth()->user()->id,
        ]);
    }
    /**
     * this function gets Holiday Package
     */
    public static function getHolidayPackage($search, $sortBy, $sortDirection, $perPage)
    {
        return HolidayPackage::join('users', 'users.id', 'holiday_packages.user_id')
        ->join('classes', 'classes.id', 'holiday_packages.class_id')
        ->join('subjects', 'subjects.id', 'holiday_packages.subject_id')
        ->search($search)
        ->orderBy($sortBy, $sortDirection)
        ->paginate($perPage, ['holiday_packages.*','users.name','classes.level','subjects.subject']);
    }
    /**
     * This function gets form for editing Holiday Package information
     */
    public static function editHolidayPackage($holiday_package_id)
    {
        return HolidayPackage::whereId($holiday_package_id)->get();
    }

    /**
     * This function updates the edited Holiday Package deails
     */
    public static function updateHolidayPackageInfo($holiday_package_id,$class_id,$subject_id,$term,$package)
    {
        HolidayPackage::whereId($holiday_package_id)->update([
            'class_id'         => $class_id,
            'subject_id'       => $subject_id,
            'term'             => $term,
            'package'          => $package, 
            'user_id'          =>auth()->user()->id,
        ]);
    }
}
