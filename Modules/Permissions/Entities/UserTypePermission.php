<?php

namespace Modules\Permissions\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class UserTypePermission extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    protected static function newFactory()
    {
        return \Modules\Permissions\Database\factories\UserTypePermissionFactory::new();
    }
    public function scopeSearch($query, $val)
    {
    return $query
        ->Where('status', 'like', '%'.$val.'%')
        ->orWhere('permissions.permission', 'like', '%'.$val.'%')
        ->orWhere('user_types.category', 'like', '%'.$val.'%')
        ->orWhere('users.name', 'like', '%'.$val.'%');
    }
    /**
     * This function creates the Permissions for the User 
     * 
    */
    public static function addPermission($usertype_id,$permission_id){
        UserTypePermission::create([
            'usertype_id'  =>$usertype_id,
            'permission_id'=>$permission_id,
            'created_by' =>auth()->user()->id,
        ]);
    }
    /**
     * This function get permissions for particular Usertype  
     */
    public static function getUsertypePermissions($search, $sortBy, $sortDirection, $perPage)
    {
        return UserTypePermission::join('users', 'users.id', 'user_type_permissions.created_by')
        ->join('permissions', 'permissions.id', 'user_type_permissions.created_by')
        ->join('user_types', 'user_types.id', 'user_type_permissions.usertype_id')
        //->where('user_types.id','user_type_permissions.usertype_id')
        ->search($search)
        ->orderBy($sortBy, $sortDirection)
        ->paginate($perPage, ['user_type_permissions.*','users.name','user_types.category','permissions.permission']);
    }
}
