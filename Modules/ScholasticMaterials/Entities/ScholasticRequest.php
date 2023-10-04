<?php

namespace Modules\ScholasticMaterials\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Carbon\Carbon;

class ScholasticRequest extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    protected static function newFactory()
    {
        return \Modules\ScholasticMaterials\Database\factories\ScholasticRequestFactory::new();
    }
    public function scopeSearch($query, $val)
    {
    return $query
        ->where('scholastics.item_name', 'like', '%'.$val.'%')
        ->orWhere('number_of_items', 'like', '%'.$val.'%')
        ->orWhere('status','like','%'.$val.'%')
        ->orWhere('users.name', 'like', '%'.$val.'%');
    }
    /**
     * This function creates the request
     */
    public static function addScholasticRequest($item_id,$office,$number_of_items){
        ScholasticRequest::create([
            'item_id'         =>$item_id,
            'office'         =>$office,
            'number_of_items' =>$number_of_items,
            'requested_by' =>auth()->user()->id,
        ]);
    }
    /**
     * this function gets all Scholastic  request
     */
    public static function getScholasticRequest($search, $sortBy, $sortDirection, $perPage)
    {
        return ScholasticRequest::join('users', 'users.id', 'scholastic_requests.requested_by')
        ->join('scholastics', 'scholastics.id', 'scholastic_requests.item_id')
        ->where('scholastic_requests.requested_by',auth()->user()->id)
        ->search($search)
        ->orderBy($sortBy, $sortDirection)
        ->paginate($perPage, ['scholastic_requests.*','users.name','scholastics.item_name']);
    }
    /**
     * this function gets all Scholastic  request for the specific Office
     */
    public static function specificOfficeRequest($search, $sortBy, $sortDirection, $perPage)
    {
        return ScholasticRequest::join('users', 'users.id', 'scholastic_requests.requested_by')
        ->join('scholastics', 'scholastics.id', 'scholastic_requests.item_id')
        ->where('scholastic_requests.office',auth()->user()->user_type)
        ->search($search)
        ->orderBy($sortBy, $sortDirection)
        ->paginate($perPage, ['scholastic_requests.*','users.name','scholastics.item_name']);
    }
    /**
     * This function gets form for editing Scholastic request information
     */
    public static function editScholasticRequest($request_id)
    {
        return ScholasticRequest::whereId($request_id)->get();
    }

    /**
     * This function updates the edited Scholastic Request
     */
    public static function updateScholasticRequestInfo($request_id,$item_id,$number_of_items)
    {
        ScholasticRequest::whereId($request_id)->update([
            'item_id'          => $item_id,
            'number_of_items'  => $number_of_items,
            'requested_by'     =>auth()->user()->id,
        ]);
    }
    /**
     * This function updates the edited Scholastic Request
     */
    public static function rejectItemRequested($request_id,$comment)
    {
        ScholasticRequest::whereId($request_id)->update([
            'comment'     => $comment,
            'replied_on'  => Carbon::now(),
            'status'      =>'rejected',
        ]);
    }
}
