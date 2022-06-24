<?php
namespace Repository;
require_once __DIR__ . '/../Repository/DataMapper.php';
class repository
{
    private DataMapper $dataMapp;

    public function __construct()
    {
        $this->dataMapp = new DataMapper();
    }

    public function getAll()
    {
        return $this->dataMapp->getAll();
    }

    public function fById($id)
    {
        return $this->dataMapp->fById($id);
    }

    public function fByMark($mark)
    {
        return $this->dataMapp->fByMark($mark);
    }

    public function addRow($id, $mark, $model)
    {
        $this->dataMapp->add($id, $mark, $model);
    }

    public function delete($id)
    {
        $this->dataMapp->delete($id);
    }

}