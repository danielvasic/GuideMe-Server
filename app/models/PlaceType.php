<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class PlaceType extends Eloquent {

    use SoftDeletingTrait;

    protected $table = 'place_types';

    protected $fillable = array('name');
    protected $hidden = array('deleted_at');

    protected $dates = ['deleted_at'];


    public function places()
    {
        return $this->hasMany('Place');
    }

}
