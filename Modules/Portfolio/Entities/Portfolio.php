<?php

namespace Modules\Portfolio\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Portfolio extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    protected static function newFactory()
    {
        return \Modules\Portfolio\Database\factories\PortfolioFactory::new();
    }
    public function scopeSearch($query, $val)
    {
    return $query
        ->where('title', 'like', '%'.$val.'%')
        ->orWhere('category', 'like', '%'.$val.'%')
        ->orWhere('date_of_activity', 'like', '%'.$val.'%')
        ->orWhere('users.name', 'like', '%'.$val.'%');
    }
    /**
     * This function creates the portfolio
     */
    public static function addPortfolio($category,$title,$date_of_activity,$image){
        Portfolio::create([
            'category'         =>$category,
            'title'            =>$title,
            'date_of_activity' =>$date_of_activity,
            'image'            => $image,
            'user_id' =>auth()->user()->id,
        ]);
    }
    /**
     * this function gets portfolio
     */
    public static function getPortfolio($search, $sortBy, $sortDirection, $perPage)
    {
        return Portfolio::join('users', 'users.id', 'portfolios.user_id')
        ->search($search)
        ->orderBy($sortBy, $sortDirection)
        ->paginate($perPage, ['portfolios.*','users.name']);
    }
    /**
     * This function gets form for editing Portfolio information
     */
    public static function editPortfolio($portfolio_id)
    {
        return Portfolio::whereId($Portfolio_id)->get();
    }

    /**
     * This function updates the edited Portfolio details
     */
    public static function updatePortfolio($portfolio_id,$title,$image)
    {
        Portfolio::whereId($portfolio_id)->update([
            'title'      => $title,
            'category'   =>$category,
            'date_of_activity' =>$date_of_activity,
            'image'      => $image,
            'user_id'    =>auth()->user()->id,
        ]);
    }
}
