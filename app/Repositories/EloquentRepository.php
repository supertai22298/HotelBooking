<?php

namespace App\Repositories;

abstract class EloquentRepository
{
    /**
     * @var \Illuminate\Database\Eloquent\Model
     */
    protected $_model;

    /**
     * EloquentRepository constructor
     */
    public function __construct()
    {
        $this->setModel();
    }

    /**
     * Get model
     * @return string
     */
    abstract public function getModel();

    /**
     * Set model
     */
    public function setModel()
    {
        $this->_model = app()->make(
            $this->getModel()
        );
    }

    /**
     * Get All
     *  @return \Illuminate\Database\Eloquent\Collection|static[]
     */
    public function getAll()
    {
        return $this->_model->all();
    }

    /**
     * Get one 
     * @param int $id
     * @return mixed
     */
    public function find($id)
    {
        $result =  $this->_model->find($id);
        return $result;
    }

    /**
     * Create
     * @param array $data
     * @return mixed
     */
    public function create($data)
    {
        return $this->_model->create($data);
    }

    /**
     * Update
     * @param int $id
     * @param array $data
     * @return bool|mixed
     */
    public function update($id, $data)
    {
        $result = $this->_model->find($id);
        if ($result) {
            $result->update($data);
            return $result;
        }
        return false;
    }

    /**
     * Detele 
     * @param $id
     * @return bool
     */
    public function delete($id)
    {
        $result = $this->_model->find($id);
        if($result){
            $result->delete();
            return true;
        }
        return false;
    }
}
