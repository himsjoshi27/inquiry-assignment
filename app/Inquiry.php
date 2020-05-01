<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Inquiry extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'full_name',
        'company_name',
        'email',
        'phone',
        'state_id',
        'city_id',
        'date',
    ];

    public function getCity()
    {
        return $this->belongsTo('App\City', 'city_id', 'id');
    }

    public function getState()
    {
        return $this->belongsTo('App\State', 'state_id', 'id');
    }

}
