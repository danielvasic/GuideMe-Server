<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;
use Illuminate\Database\Eloquent\SoftDeletingTrait;

class User extends Eloquent implements UserInterface, RemindableInterface {

	use UserTrait, RemindableTrait, SoftDeletingTrait;

	protected $table = 'users';

	protected $fillable = array('username', 'password', 'first_name', 'last_name', 'email', 'group_id');
	protected $hidden = array('password', 'remember_token', 'deleted_at');

	protected $dates = ['deleted_at'];


	public function setPasswordAttribute($value)
	{
		$this->attributes['password'] = Hash::make($value);
	}

	public function touchLastSeen()
	{
		$this->last_seen = $this->freshTimestamp();

		$this->save();
	}

	public function group()
	{
		return $this->belongsTo('Group')->select(array('id', 'name'));
	}

}
