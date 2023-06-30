<?php

namespace Modules\Permissions\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Permission extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    protected static function newFactory()
    {
        return \Modules\Permissions\Database\factories\PermissionFactory::new();
    }
    public function scopeSearch($query, $val)
    {
    return $query
        ->Where('permission', 'like', '%'.$val.'%');
    }
    /**
     * This function creates the Permissions
     * 
    */
    public static function addPermission($usertype_id,$permission_id){
        Permission::create([
            'usertype_id'  =>$usertype_id,
            'permission_id'    =>$permission_id,
            'status'    =>'active',
            'created_by' =>auth()->user()->id,
        ]);
    }
    /**
     * This function get permissions for students  
     */
    public static function getPermissions($search, $sortBy, $sortDirection, $perPage)
    {
        return Permission::search($search)
        ->orderBy($sortBy, $sortDirection)
        ->paginate($perPage, ['permissions.*']);
    }
    /**
     * this function get permissions for staff  
     */
    public static function allStaffPermissions($search, $sortBy, $sortDirection, $perPage)
    {
        return Permission::join('users', 'users.id', 'permission_requests.user_id')
        ->join('staffs', 'staffs.id', 'permission_requests.permission_id')
        ->join('classes', 'classes.id', 'permission_requests.created_by') 
        ->where('permission_requests.user_type', auth()->user()->user_type)
        ->search($search)
        ->orderBy($sortBy, $sortDirection)
        ->paginate($perPage, ['permission_requests.*','staffs.staff_first_name','staffs.staff_last_name','staffs.staff_other_names','users.name']);
    }
}
