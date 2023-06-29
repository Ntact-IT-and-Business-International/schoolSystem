<?php

namespace Modules\Nurse\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NurseRequest extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    protected static function newFactory()
    {
        return \Modules\Nurse\Database\factories\NurseRequestFactory::new();
    }
    public function scopeSearch($query, $val)
    {
    return $query
        ->where('quantity', 'like', '%'.$val.'%')
        ->orWhere('sickbay_items.medicine_name', 'like', '%'.$val.'%')
        ->orWhere('amount', 'like', '%'.$val.'%')
        ->orWhere('type','like','%'.$val.'%');
    }
    /**
     * This function creates the Nurse Request
     */
    public static function addNurseRequests($medicine_id,$quantity,$amount,$office_incharge_id,$type){
        NurseRequest::create([
            
            'medicine_id' => $medicine_id,
            'quantity'    => $quantity,
            'amount'      => $amount,
            'office_incharge_id' =>$office_incharge_id,
            'type'         => $type,
            'user_id' =>auth()->user()->id,
        ]);
    }
    /**
     * this function gets Nurse Request
     */
    public static function getNurseRequest($search, $sortBy, $sortDirection, $perPage)
    {
        return NurseRequest::join('sickbay_items','sickbay_items.id','nurse_requests.medicine_id')
        ->join('user_types','user_types.id','nurse_requests.office_incharge_id')
        ->search($search)
        ->orderBy($sortBy, $sortDirection)
        ->paginate($perPage,['nurse_requests.*','sickbay_items.medicine_name','user_types.category']);
    }
    /**
     * This function gets form for editing Nurse Request information
     */
    public static function editNurseRequest($request_id)
    {
        return NurseRequest::whereId($request_id)->get();
    }

    /**
     * This function updates the edited Nurse Request details
     */
    public static function updateNurseRequest($request_id,$quantity,$amount,$type)
    {
        NurseRequest::whereId($request_id)->update([
            'quantity'    => $quantity,
            'amount'      => $amount,
            'type'         => $type,
            'user_id'    =>auth()->user()->id,
        ]);
    }
}
