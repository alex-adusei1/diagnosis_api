<?php

namespace App\Traits;

use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

trait CommonFunctions
{

    /**
     * Retrieves all records based on request data passed in
     */
    public function getAll(Request $request)
    {
        $limit = $request->limit ?? 20;
        $conditions = [];

        $builder = $this->where($conditions);

        foreach ($request->all() as $key => $value) {

            if (\is_string($value) && in_array($key, $this->fillable)) {
                $data = explode(",", $value);

                if (is_array($data)) {
                    $builder = $builder->whereIn($key, $data);
                } else {
                    $builder = $builder->where($key, $value);
                }
            }
        }

        $builder = $this->includeContains($request, $builder);
        $builder = $this->includeCounts($request, $builder);
        $builder = $this->applySorts($request, $builder);

        return $builder->paginate($limit);
    }

    /**
     * Retrieves a record based on primary key id
     */
    public function getById($id, Request $request)
    {
        $builder = $this->where($this->primaryKey, $id);

        $builder = $this->includeCounts($request, $builder);
        $builder = $this->includeContains($request, $builder);
        $builder = $this->applySorts($request, $builder);

        return $builder->first();
    }

    public function store(Request $request)
    {
        $data = $this->create($request->all());

        $builder = $this->where('id', $data->id);
        $builder = $this->includeContains($request, $builder);
        $builder = $this->includeCounts($request, $builder);

        $dataModel = $builder->first();

        return $dataModel;
    }

    public function modify(Request $request, $id)
    {
        $dataModel = $this->findOrFail($id);

        if (!$dataModel) {
            throw new NotFoundHttpException("Resource not found");
        }

        $dataModel->fill($request->all());
        $dataModel->save();

        $builder = $this->where('id', $id);
        $builder = $this->includeContains($request, $builder);
        $builder = $this->includeCounts($request, $builder);

        $dataModel = $builder->first();

        return $dataModel;
    }

    public function remove($id)
    {
        $record = $this->find($id);

        if ($record) {
            try {
                return $record->delete();
            } catch (\Exception $e) {
                throw $e;
            }
        }

        return false;
    }

    public function count(Request $request)
    {
        $conditions = [];

        return $this->where($conditions)->count();
    }

    public function includeContains(Request $request, $builder)
    {
        if ($request->contain) {
            $contains = explode(',', $request->contain);
            foreach ($contains as $contain) {
                if (\method_exists($this, $contain) || strpos($contain, '.') !== false) {
                    $builder->with(trim($contain));
                }
            }
        }

        return $builder;
    }

    public function includeCounts($request, $builder)
    {
        $count_info = $request->count ?? $request->with_count ?? null;

        if ($count_info) {
            $counters = explode(",", $count_info);

            foreach ($counters as $counter) {
                if (\method_exists($this, $counter)) {
                    $builder->withCount($counter);
                }
            }
        }

        return $builder;
    }

    public function applySorts($request, $builder)
    {
        $sort_info = $request->sort ? $request->sort : null;

        if ($sort_info) {
            $sorts = explode(',', $sort_info);

            foreach ($sorts as $sort) {
                $sd = explode(":", $sort);
                if ($sd && count($sd) == 2) {
                    $builder->orderBy(trim($sd[0]), trim($sd[1]));
                }
            }
        }

        return $builder;
    }
}
