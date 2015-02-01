<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Audio extends Eloquent {

    use SoftDeletingTrait;

    protected $table = 'audio';

    protected $fillable = array('filename', 'title', 'description', 'place_id');
    protected $hidden = array('deleted_at');

    protected $dates = ['deleted_at'];


    public function setPlaceIdAttribute($value)
    {
        $this->attributes['place_id'] = $value ?: null;
    }

    public function place()
    {
        return $this->belongsTo('Place')->select(array('id', 'name'));
    }

}
