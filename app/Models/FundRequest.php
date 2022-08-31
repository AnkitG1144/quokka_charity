<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FundRequest extends Model
{
    use HasFactory;
    protected $guarded = [];
    public $timestamps = true;

    public function raiseFund($data){
        return self::create([
            'name' => $data->name,
            'desc' => $data->desc,
            'priority' => $data->priority,
            'amount' => $data->amount,
            'manager' => $data->name_fund_manager,
            'manager_email' => $data->email_fund_manager,
            'manager_contact' => $data->contactDetails
        ]);
    }
}
