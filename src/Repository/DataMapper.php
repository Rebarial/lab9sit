<?php

namespace Repository;
require_once __DIR__ . '/../model/car.php';
use PDO;
use model\car;
class DataMapper
{

    private $connect;

    function __construct(){
        $this->connect = new PDO("mysql:host=localhost;dbname=lr8", "lr8user", "lr8parol");
    }

    public function fById($id)
    {
        $sql = 'select * from cars where id =' . $id;
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        $allD = $stmt->fetchAll();
        $objects = array();

        foreach ($allD as $row) {
            $object = new car();
            $object->setID($row[0]);
            $object->setMark($row[1]);
            $object->setModel($row[2]);
            $objects[] = $object;
        }
        return $objects;
    }

    public function fByMark($mark)
    {
        $sql = 'select * from cars where mark = ' . "'" . $mark . "'";
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        $allD = $stmt->fetchAll();
        $objects = array();

        foreach ($allD as $row) {
            $object = new car();
            $object->setID($row[0]);
            $object->setMark($row[1]);
            $object->setModel($row[2]);
            $objects[] = $object;
        }
        return $objects;
    }

    public function getAll()
    {
        $sql = 'select * from cars';
        $stmt = $this->connect->prepare($sql);
        $stmt->execute();
        $allD = $stmt->fetchAll();
        $objects = array();
        foreach ($allD as $row) {
            $object = new car();
            $object->setID($row[0]);
            $object->setMark($row[1]);
            $object->setModel($row[2]);
            $objects[] = $object;
        }
        return $objects;
    }

    public function add($id, $mark, $model)
    {
        $sql = 'insert into cars (id, model, mark) values (' . $id . ', ' . "'" . $model . "'" . ', ' . "'" . $mark . "'" . ')';
        $stmt = $this->connect->prepare($sql);
        $stmt->bindParam('id', $id);
        $stmt->bindParam('mark', $mark);
        $stmt->bindParam('model', $model);
        $stmt->execute();
    }

    public function delete($id)
    {
        $sql = 'delete from cars where id = ' . $id;
        $stmt = $this->connect->prepare($sql);
        $stmt->bindParam('id', $d);
        $stmt->execute();
    }
}