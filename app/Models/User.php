<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Modules\Timetable\Entities\TimeTable;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'user_type',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];
    //Tis function searches by any of this fields
    public function scopeSearch($query, $val)
    {
        return $query
        ->where('name', 'like', '%'.$val.'%')
        ->orWhere('user_types.category', 'like', '%'.$val.'%')
        ->orWhere('email', 'like', '%'.$val.'%');
    }
    /*
    * this function gets the users
    */
    public static function getUsers($search, $sortBy, $sortDirection, $perPage)
    {
        return User::join('user_types','user_types.id','users.user_type')->orderBy($sortBy, $sortDirection)
        ->search($search)
        ->Paginate($perPage, ['users.*','user_types.category']);
    }
    /**
     * This function adds profile Users Photo
     */
    public static function addUserPhoto($profile_photo_path){
        User::whereId(auth()->user()->id)->update([
            'profile_photo_path' =>$profile_photo_path,
        ]);
    }
    /**
     * This funcion gets image for the loggged in User
     */
    public function getLoggedInUserLogo(){
        $user_logo = User::where('id', '=', $this->id)->value('profile_photo_path');;
        if(empty($user_logo)){
            $user_logo = 'logo2.png';
        }
        return $user_logo;
    }
    /**
     * This fucion gets ll details for logged in user Timetable starting time
     */
    public function getStartingTime(){
        return TimeTable::join('users', 'users.id', 'time_tables.user_id')
        ->join('classes', 'classes.id', 'time_tables.class_id')
        ->join('subjects', 'subjects.id', 'time_tables.subject_id')
        ->where('time_tables.user_id',auth()->user()->id)
        ->value('time_tables.starting_time');
    }
    /**
     * This fucion gets all details for logged in user Timetable ending time
     */
    public function getEndingTime(){
        return TimeTable::join('users', 'users.id', 'time_tables.user_id')
        ->join('classes', 'classes.id', 'time_tables.class_id')
        ->join('subjects', 'subjects.id', 'time_tables.subject_id')
        ->where('time_tables.user_id',auth()->user()->id)
        ->value('time_tables.end_time');
    }
    /**
     * This fucion gets ll details for logged in user Timetable starting time
     */
    public function getSubject(){
        return TimeTable::join('users', 'users.id', 'time_tables.user_id')
        ->join('classes', 'classes.id', 'time_tables.class_id')
        ->join('subjects', 'subjects.id', 'time_tables.subject_id')
        ->where('time_tables.user_id',auth()->user()->id)
        ->value('subjects.subject');
    }
    /**
     * This fucion gets all classes for logged in user Timetable starting time
     */
    public function getClass(){
        return TimeTable::join('users', 'users.id', 'time_tables.user_id')
        ->join('classes', 'classes.id', 'time_tables.class_id')
        ->join('subjects', 'subjects.id', 'time_tables.subject_id')
        ->where('time_tables.user_id',auth()->user()->id)
        ->value('classes.level');
    }
}
