<?php

class UserController extends ResourceController {

    protected $model = 'User';
    protected $searchable_fields = array('username', 'first_name', 'last_name', 'email');

}
