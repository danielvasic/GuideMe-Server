<?php

use Illuminate\Database\Eloquent\SoftDeletingTrait;

class Group extends Eloquent {

    use SoftDeletingTrait;

    protected $table = 'groups';

    protected $fillable = array('name');
    protected $hidden = array('deleted_at');

    protected $dates = ['deleted_at'];


    public function users()
    {
        return $this->hasMany('User');
    }

}
