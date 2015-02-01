<?php

class ImageController extends ResourceController {

    protected $model = 'Image';
    protected $public_fields = array('id', 'filename', 'title', 'description', 'place_id');
    protected $searchable_fields = array('filename', 'title', 'description');

}
