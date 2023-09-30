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
use Modules\Fees\Entities\Fee;
use Carbon\Carbon;
use Modules\Expenditure\Entities\Expenditure;
use Modules\Students\Entities\Student;  
use DB;

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
    /**
     * This function gets total amount collected today, this year
     */
    private function getFeesToday(){
        return Fee::whereDate('created_at', Carbon::today())->sum('amount_paid');
        
    }
    /**
     * This function gets total amount collected this month, this year
     */
    private function getFeesThisMonth(){
        return Fee::whereMonth('created_at', date('m'))->sum('amount_paid');
    }
    /**
     * This function gets total amount collected this week, this year
     */
    private function getFeesThisWeek(){
        return Fee::whereBetween('created_at',[Carbon::now()->startOfWeek(),Carbon::now()->endOfWeek()])->sum('amount_paid');
    }
    /**
     * This function gets total amount collected this term, this year
     */
    public function getFeesTerm1(){
        return Fee::whereYear('created_at', date('Y'))->whereTerm(1)->sum('amount_paid');
    }
    /**
     * This function gets total amount collected this term 2, this year
     */
    public function getFeesTerm2(){
        return Fee::whereYear('created_at', date('Y'))->whereTerm(2)->sum('amount_paid');
    }
    /**
     * This function gets total amount collected this term 3, this year
     */
    public function getFeesTerm3(){
        return Fee::whereYear('created_at', date('Y'))->whereTerm(3)->sum('amount_paid');
    }
    /**
     * This function gets total of all terma expenditure  this year
     */
    public function getFeesThisYear(){
        return $this->getFeesTerm1()+$this->getFeesTerm2() + $this->getFeesTerm3();
    }
    /**
     * This function gets balances, this year
     */
    public function getBalances(){
        return Fee::whereYear('created_at', date('Y'))->sum('balance');
    }
    /**
     * This function gets total expenditure, this year
     */
    public function getExpenditureThisYear(){
        return Expenditure::whereYear('created_at', date('Y'))->sum('amount');
    }
    /**
     * This function gets the actual balance after expenditure
     */
    public function getActualBalance(){
        return $this->getFeesThisYear() - $this->getExpenditureThisYear();
    }
    /**
     * This function gets total number of users, this year
     */
    public function countUsers(){
        return DB::table('users')->count();
    }
    /**
     * This function gets total number of students registered, this year
     */
    public function countStudents(){
        return DB::table('students')->whereYear('created_at', date('Y'))->count();

    }
    /**
     * This function gets total number of teachers registered, this year
     */
    public function countTeachingStaff(){
        return DB::table('staffs')->whereYear('created_at', date('Y'))->whereNotNull('class_id')->count();
    }
    /**
     * This function gets total number of non teaching staff registered, this year
     */
    public function countNonTeachingStaff(){
        return DB::table('staffs')->whereYear('created_at', date('Y'))->where('class_id',null)->count();
    }
    /**
     * This function gets total number of complain, this year
     */
    public function countComplains(){
        return DB::table('complains')->whereYear('created_at', date('Y'))->where('reply',null)->count();
    }
    /**
     * This function gets total number of complain, this year
     */
    public function countPendingRequests(){
        return DB::table('scholastic_requests')->whereYear('created_at', date('Y'))->whereStatus('pending')->count();
    }
    /**
     * This function gets total number of boys, this year
     */
    public function countNumberOfBoys(){
        return DB::table('students')->whereYear('created_at', date('Y'))->whereGender('M')->count();
    }
    /**
     * This function counts the total number of girls,This year
     */
    public function countNumberOfGirls(){
        return DB::table('students')->whereYear('created_at', date('Y'))->whereGender('F')->count();
    }
    /**
     * This funcion counts the total number of children with special needs,This year
     */
    public function countNumberOfSpecialNeeds(){
        return DB::table('students')->whereYear('created_at', date('Y'))->whereNotNull('special_need')->count();
    }
    /**
     * This function get the users tobe edited
     */
    public static function editUser($user_id){
        return User::whereId($user_id)->get();
    }
    /**
     * This function updates user information
     */
    public static function updateUser($user_id,$name,$email,$user_type){
        User::whereId($user_id)->update([
            'name'         => $name,
            'email'        => $email,
            'user_type'    => $user_type,
        ]);
    }
}
