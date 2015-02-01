<?php

use Illuminate\Database\Eloquent\ModelNotFoundException;

abstract class ResourceController extends BaseController {

    /**
     * The model used by the controller.
     *
     * @var
     */
    protected $model;

    /**
     * Fields visible to unauthorized users.
     *
     * @var array
     */
    protected $public_fields = array('*');

    /**
     * Searchable fields.
     *
     * @var array
     */
    protected $searchable_fields = array();


    /**
     * Index all resources.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function indexResource()
    {
        $resource_model = $this->model;

        $query = $resource_model::query();


        // Sort

        if(Input::has('sort'))
        {
            $sort_fields = array_map('trim', explode(',', Input::get('sort')));

            foreach($sort_fields as $sort_field)
            {
                if(substr($sort_field, 0, 1) === '-')
                {
                    $query->orderBy(substr($sort_field, 1), 'DESC');
                }
                else
                {
                    $query->orderBy($sort_field, 'ASC');
                }
            }
        }


        // Search

        if(Input::has('q'))
        {
            foreach($this->searchable_fields as $index => $searchable_field)
            {
                if($index === 0)
                {
                    $query->where($searchable_field, 'LIKE', Input::get('q'));
                }
                else
                {
                    $query->orWhere($searchable_field, 'LIKE', Input::get('q'));
                }
            }

        }


        // Field selection

        if(!Auth::check() && Input::has('fields'))
        {
            $query->select(array_intersect($this->public_fields, array_map('trim', explode(',', Input::get('fields')))));
        }
        else if(!Auth::check())
        {
            $query->select($this->public_fields);
        }
        else if(Input::has('fields'))
        {
            $query->select(array_map('trim', explode(',', Input::get('fields'))));
        }


        // Pagination

        if(Input::has('limit'))
        {
            $query->limit(Input::get('limit'));
        }

        if(Input::has('offset'))
        {
            $query->offset(Input::get('offset'));
        }


        $resource = $query->get();

        // return $resource;
        return Response::json($resource, 200, array(), JSON_PRETTY_PRINT);

    }

    /**
     * Create a resource.
     *
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function createResource()
    {
        $resource_model = $this->model;

        try
        {
            $resource = new $resource_model;

            $resource->fill(Input::all());

            $resource->created_by = Auth::id();
            $resource->updated_by = Auth::id();

            $resource->save();
        }
        catch (Exception $e)
        {
            return Response::json(array('error' => $e->getMessage()), 500, array(), JSON_PRETTY_PRINT);
        }

        return Response::make('Created', 201);
    }

    /**
     * Retrieve a specific resource.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function retrieveResource($id)
    {
        try
        {
            if(!Auth::check() && Input::has('fields'))
            {
                $resource = $this->findResource($id, array_intersect($this->public_fields, array_map('trim', explode(',', Input::get('fields')))));
            }
            else if(!Auth::check())
            {
                $resource = $this->findResource($id, $this->public_fields);
            }
            else if(Input::has('fields'))
            {
                $resource = $this->findResource($id, array_map('trim', explode(',', Input::get('fields'))));
            }
            else
            {
                $resource = $this->findResource($id);
            }
        }
        catch (ModelNotFoundException $e)
        {
            return Response::make('Not Found', 404);
        }

        // return $resource;
        return Response::json($resource, 200, array(), JSON_PRETTY_PRINT);
    }

    /**
     * Update a specific resource.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function updateResource($id)
    {
        try
        {
            $resource = $this->findResource($id);

            $resource->fill(Input::all());

            $resource->updated_by = Auth::id();

            $resource->save();
        }
        catch (Exception $e)
        {
            if($e instanceof ModelNotFoundException)
                return Response::make('Not Found', 404);
            else
                return Response::json(array('error' => $e->getMessage()), 500, array(), JSON_PRETTY_PRINT);
        }

        // return $resource;
        return Response::json($resource, 200, array(), JSON_PRETTY_PRINT);
    }

    /**
     * Delete a specific resource.
     *
     * @param $id
     * @return \Illuminate\Http\JsonResponse|\Illuminate\Http\Response
     */
    public function deleteResource($id)
    {
        try
        {
            $resource = $this->findResource($id);

            $resource->delete();
        }
        catch (Exception $e)
        {
            if($e instanceof ModelNotFoundException)
                return Response::make('Not Found', 404);
            else
                return Response::json(array('error' => $e->getMessage()), 500, array(), JSON_PRETTY_PRINT);
        }

        return Response::make('No Content', 204);
    }

    /**
     * Find a specific resource.
     *
     * @param $id
     * @param array $columns
     * @return mixed
     */
    private function findResource($id, $columns = array('*'))
    {
        $resource_model = $this->model;

        return $resource_model::findOrFail($id, $columns);
    }

}
