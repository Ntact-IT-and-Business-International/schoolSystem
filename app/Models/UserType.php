<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserType extends Model 
{
    protected $fillable = ['category'];
    
    use HasFactory;
    //Tis function searches by any of this fields
    public function scopeSearch($query, $val)
    {
        return $query
        ->where('category', 'like', '%'.$val.'%');
    }
    /*
    * this function gets the users
    */
    public static function getUserType($search, $sortBy, $sortDirection, $perPage)
    {
        return UserType::orderBy($sortBy, $sortDirection)
        ->search($search)
        ->Paginate($perPage);
    }
    /**
     * This function creates the Category
     */
    public static function createCategory($category){
        UserType::create([
            'category'  =>$category,
        ]);
    }
    /**
     * This function gets form for editing Category information
     */
    public static function editCategory($category_id)
    {
        return UserType::whereId($category_id)->get();
    }

    /**
     * This function updates the edited category
     */
    public static function updateCategory($category_id,$category)
    {
        UserType::whereId($category_id)->update([
            'category'    => $category,
        ]);
    }
}
