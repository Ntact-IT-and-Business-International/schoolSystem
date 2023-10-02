<?php

namespace Modules\ReportCard\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PleResult extends Model
{
    use HasFactory;

    protected $guarded = ['id'];
    
    protected static function newFactory()
    {
        return \Modules\ReportCard\Database\factories\PleResultFactory::new();
    }
    public function scopeSearch($query, $val)
    {
    return $query
        ->where('div1', 'like', '%'.$val.'%')
        ->orWhere('div2', 'like', '%'.$val.'%')
        ->orWhere('div3','like','%'.$val.'%')
        ->orWhere('div4','like','%'.$val.'%')
        ->orWhere('U','like','%'.$val.'%')
        ->orWhere('X','like','%'.$val.'%')
        ->orWhere('total','like','%'.$val.'%')
        ->orWhere('year','like','%'.$val.'%')
        ->orWhere('result','like','%'.$val.'%')
        ->orWhere('users.name', 'like', '%'.$val.'%');
    }
    /**
     * This function creates the ple results
     */
    public static function addPleResults($div1,$div2,$div3,$div4,$U,$X,$total,$year,$result){
        PleResult::create([
            'div1'      =>$div1,
            'div2'      => $div2,
            'div3'      => $div3,
            'div4'      => $div4,
            'U'         => $U,
            'X'         => $X,
            'total'     => $total,
            'year'      => $year,
            'result'    => $result,
            'user_id' =>auth()->user()->id,
        ]);
    }
    /**
     * this function gets ple results
     */
    public static function getPleResults($search, $sortBy, $sortDirection, $perPage)
    {
        return PleResult::join('users', 'users.id', 'ple_results.user_id')
        ->search($search)
        ->orderBy($sortBy, $sortDirection)
        ->paginate($perPage, ['ple_results.*','users.name']);
    }
    /**
     * This function gets form for editing ple results information
     */
    public static function editPleResults($ple_result_id)
    {
        return PleResult::whereId($ple_result_id)->get();
    }

    /**
     * This function updates the edited ple results details
     */
    public static function updatePleResultsInfo($ple_result_id,$div1,$div2,$div3,$div4,$U,$X,$total,$year)
    {
        PleResult::whereId($ple_result_id)->update([
            'div1'      =>$div1,
            'div2'      => $div2,
            'div3'      => $div3,
            'div4'      => $div4,
            'U'         => $U,
            'X'         => $X,
            'total'     => $total,
            'year'      => $year,
            'user_id'       =>auth()->user()->id,
        ]);
    }
}
