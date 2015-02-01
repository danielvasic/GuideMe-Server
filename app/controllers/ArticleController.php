<?php

class ArticleController extends ResourceController {

    protected $model = 'Article';
    protected $public_fields = array('id', 'title', 'description', 'content', 'place_id');
    protected $searchable_fields = array('title', 'description', 'content');

}
