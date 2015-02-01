<?php

class PlaceController extends ResourceController {

    protected $model = 'Place';
    protected $public_fields = array('id', 'name', 'description', 'address', 'phone', 'email', 'url', 'lat', 'lng', 'place_type_id');
    protected $searchable_fields = array('name', 'description', 'address', 'phone', 'email', 'url');

}
