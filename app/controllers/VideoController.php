<?php

class VideoController extends ResourceController {

    protected $model = 'Video';
    protected $public_fields = array('id', 'filename', 'title', 'description', 'place_id');
    protected $searchable_fields = array('filename', 'title', 'description');

}
