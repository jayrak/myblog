<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WorkHistory extends Model
{
    protected $guarded = array('id');

    public static $rules = array(
        'work_id' => 'required',
        'edited_at' => 'required',
    );
}
