<?php

namespace Modules\Library\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Libray extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    protected static function newFactory()
    {
        return \Modules\Library\Database\factories\LibrayFactory::new();
    }
    public function scopeSearch($query, $val)
    {
    return $query
        ->where('title', 'like', '%'.$val.'%')
        ->orWhere('subjects.subject', 'like', '%'.$val.'%')
        ->orWhere('classes.level','like','%'.$val.'%')
        ->orWhere('number_of_books','like','%'.$val.'%')
        ->orWhere('date_of_entry','like','%'.$val.'%');
    }
    /**
     * This function creates the Library
     */
    public static function addLibraryBooks($class_id,$subject_id,$title,$number_of_books,$date_of_entry){
        Libray::create([
            'class_id'        =>$class_id,
            'subject_id'      => $subject_id,
            'title'           => $title,
            'number_of_books' => $number_of_books,
            'date_of_entry'   => $date_of_entry,
            'status'          => 'available',
            'user_id' =>auth()->user()->id,
        ]);
    }
    /**
     * this function gets Library
     */
    public static function getLibrary($search, $sortBy, $sortDirection, $perPage)
    {
        return Libray::join('subjects','subjects.id','librays.subject_id')
        ->join('classes','classes.id','librays.class_id')
        ->search($search)
        ->orderBy($sortBy, $sortDirection)
        ->paginate($perPage,['librays.*','subjects.subject','classes.level']);
    }
    /**
     * This function gets form for editing Library information
     */
    public static function editLibrary($library_id)
    {
        return Libray::whereId($library_id)->get();
    }

    /**
     * This function updates the edited Library details
     */
    public static function updateLibraryInfo($library_id,$subject_id,$class_id,$title,$number_of_books,$date_of_entry,$status)
    {
        Libray::whereId($library_id)->update([
            'subject_id'       =>$subject_id,
            'class_id'        =>$class_id,
            'title'           => $title,
            'number_of_books' => $number_of_books,
            'date_of_entry'   => $date_of_entry,
            'status'          =>$status,
            'user_id'    =>auth()->user()->id,
        ]);
    }
}
