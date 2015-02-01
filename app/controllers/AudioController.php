<?php

class AudioController extends ResourceController {

    protected $model = 'Audio';
    protected $public_fields = array('id', 'filename', 'title', 'description', 'place_id');
    protected $searchable_fields = array('filename', 'title', 'description');

}
