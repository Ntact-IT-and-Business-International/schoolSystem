<?php

namespace Modules\Fees\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FeesStructure extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    protected static function newFactory()
    {
        return \Modules\Fees\Database\factories\FeesStructureFactory::new();
    }
    public function scopeSearch($query, $val)
    {
    return $query
        ->where('levels', 'like', '%'.$val.'%')
        ->orWhere('category', 'like', '%'.$val.'%')
        ->orWhere('term','like','%'.$val.'%')
        ->orWhere('fee_structure','like','%'.$val.'%')
        ->orWhere('users.name', 'like', '%'.$val.'%');
    }
    /**
     * This function creates the free structures
     */
    public static function addFeeStructure($levels,$category,$term,$fee_structure){
        FeesStructure::create([
            'levels'        =>$levels,
            'category'      => $category,
            'term'          => $term,
            'fee_structure' => $fee_structure,
            'user_id' =>auth()->user()->id,
        ]);
    }
    /**
     * this function gets fees structure
     */
    public static function getFeeStructure($search, $sortBy, $sortDirection, $perPage)
    {
        return FeesStructure::join('users', 'users.id', 'fees_structures.user_id')
        ->search($search)
        ->orderBy($sortBy, $sortDirection)
        ->paginate($perPage, ['fees_structures.*','users.name']);
    }
    /**
     * This function gets form for editing fee structures information
     */
    public static function editFeeStructure($fee_structure_id)
    {
        return FeesStructure::whereId($fee_structure_id)->get();
    }

    /**
     * This function updates the edited fees structure details
     */
    public static function updateFeeStructureInfo($fee_structure_id,$staff_id,$category,$term,$fee_structure)
    {
        FeesStructure::whereId($fee_structure_id)->update([
            'levels'         => $levels,
            'category'      => $category,
            'term'          => $term,
            'fee_structure' => $fee_structure,
            'user_id'       =>auth()->user()->id,
        ]);
    }
}
