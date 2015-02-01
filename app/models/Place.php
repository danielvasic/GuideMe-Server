<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Place extends Eloquent {

    use SoftDeletingTrait;

    protected $table = 'places';

    protected $fillable = array('name', 'description', 'address', 'phone', 'email', 'url', 'lat', 'lng', 'place_type_id');
    protected $hidden = array('deleted_at');

    protected $dates = ['deleted_at'];


    public function placeType()
    {
        return $this->belongsTo('PlaceType')->select(array('id', 'name'));
    }

}
