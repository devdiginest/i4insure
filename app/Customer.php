<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    //
    protected $table = 'customers';

    protected $fillable = ["name", "customer_id", "phone", "address", "vehicle_number", "type_of_vehicle", "vehicle_class",
                            "make_and_model", "present_policy_no", "expiry_date", "existing_insurer", "remarks", "status"
                        ];
}
