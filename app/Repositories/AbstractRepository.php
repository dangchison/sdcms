<?php
/**
 * @author Sondc <dangchison@gmail.com>
 */
namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;

abstract class AbstractRepository {

    protected $model;

    /**
     * @param Model $model
     */
    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    /**
     * @param array $columns
     * @return mixed
     */
    public function all($columns = array('*'), $orderBy = 'DESC', $perPage = 0) {
        if ($perPage > 0)
            return $this->model->orderBy('created_at', $orderBy)->paginate($perPage, $columns);
        return $this->model->orderBy('created_at', $orderBy)->get($columns);
    }

    /**
     * @param  string $value
     * @param  string $key
     * @return array
     */
    public function lists($value, $key = null) {
        $lists = $this->model->lists($value, $key);
        if(is_array($lists)) {
            return $lists;
        }
        return $lists->all();
    }

    /**
     * @param int $perPage
     * @param array $columns
     * @return mixed
     */
    public function paginate($perPage = 20, $columns = array('*')) {
        return $this->model->paginate($perPage, $columns);
    }

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data) {
        return $this->model->create($data);
    }

    /**
     * @param array $data
     * @param $id
     * @param string $attribute
     * @return mixed
     */
    public function update(array $data, $id, $attribute="id") {
        if (!($model = $this->model->where($attribute, $id)->first())) {
            return false;
        }
        $model->update($data);
        return $model;
    }

    /**
     * @param  array  $data
     * @param  $id
     * @return mixed
     */
    public function updateRich(array $data, $id) {
        if (!($model = $this->model->find($id))) {
            return false;
        }

        $model->fill($data)->save();
        return $model;
    }

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id) {
        return $this->model->destroy($id);
    }

    /**
     * @param $id
     * @param array $columns
     * @return mixed
     */
    public function find($id, $columns = array('*')) {
        return $this->model->find($id, $columns);
    }

    /**
     * @param $attribute
     * @param $value
     * @param array $columns
     * @return mixed
     */
    public function findBy($attribute, $value, $columns = array('*')) {
        return $this->model->where($attribute, '=', $value)->first($columns);
    }

    /**
     * @param $attribute
     * @param $value
     * @param array $columns
     * @return mixed
     */
    public function findAllBy($attribute, $value, $columns = array('*'), $perPage = 0) {
        if ($perPage > 0)
            return $this->model->where($attribute, '=', $value)->paginate($perPage, $columns);
        return $this->model->where($attribute, '=', $value)->get($columns);
    }

    /**
     * Find a collection of models by the given query conditions.
     *
     * @param array $where
     * @param array $columns
     * @param bool  $or
     *
     * @return \Illuminate\Database\Eloquent\Collection|null
     */
    public function findWhere($where, $columns = ['*'], $or = false, $perPage = 0)
    {
        $model = $this->model;

        foreach ($where as $field => $value) {
            if ($value instanceof \Closure) {
                $model = (! $or)
                    ? $model->where($value)
                    : $model->orWhere($value);
            } elseif (is_array($value)) {
                if (count($value) === 3) {
                    list($field, $operator, $search) = $value;
                    $model = (! $or)
                        ? $model->where($field, $operator, $search)
                        : $model->orWhere($field, $operator, $search);
                } elseif (count($value) === 2) {
                    list($field, $search) = $value;
                    $model = (! $or)
                        ? $model->where($field, '=', $search)
                        : $model->orWhere($field, '=', $search);
                }
            } else {
                $model = (! $or)
                    ? $model->where($field, '=', $value)
                    : $model->orWhere($field, '=', $value);
            }
        }
        if ($perPage > 0)
            return $model->paginate($perPage, $columns);
        return $model->get($columns);
    }

}