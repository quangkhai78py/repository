<?php
namespace App\Repositories;

class BaseRepository
{
    protected $model;

    public function create($data)
    {
        return $this->model->create($data);
    }

    public function update($data, $id)
    {
        return $this->model->where('id', $id)->update($data);
    }

    public function getUserTotall()
    {
        return $this->model->all()->toArray();
    }

    public function getUser($id)
    {
        return $this->model->where('id', $id)->get();
    }

    public function delete($id)
    {
        return $this->model->where('id', $id)->delete();
    }

}
