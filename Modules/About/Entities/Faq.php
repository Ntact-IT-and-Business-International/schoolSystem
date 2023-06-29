<?php

namespace Modules\About\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Faq extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    protected static function newFactory()
    {
        return \Modules\About\Database\factories\FaqFactory::new();
    }
    public function scopeSearch($query, $val)
    {
    return $query
        ->where('heading', 'like', '%'.$val.'%')
        ->orWhere('question', 'like', '%'.$val.'%')
        ->orWhere('users.name', 'like', '%'.$val.'%');
    }
    /**
     * This function creates the faq
     */
    public static function addFaq($heading,$question){
        Faq::create([
            'heading'  =>$heading,
            'question' =>$question,
            'user_id' =>auth()->user()->id,
        ]);
    }
    /**
     * this function gets all faq  
     */
    public static function getFaq($search, $sortBy, $sortDirection, $perPage)
    {
        return Faq::join('users', 'users.id', 'faqs.user_id')
        ->search($search)
        ->orderBy($sortBy, $sortDirection)
        ->paginate($perPage, ['faqs.*','users.name']);
    }
    /**
     * This function gets form for editing Faq information
     */
    public static function editFaq($faq_id)
    {
        return Faq::whereId($faq_id)->get();
    }

    /**
     * This function updates the edited faq
     */
    public static function updateFaq($faq_id,$heading,$question,)
    {
        Faq::whereId($faq_id)->update([
            'heading'    => $heading,
            'question' =>$question,
        ]);
    }
}
