<?php

class PlaceTypeController extends ResourceController {

    protected $model = 'PlaceType';
    protected $public_fields = array('id', 'name');
    protected $searchable_fields = array('name');

}
