<?php
/**
 * Created by PhpStorm.
 * User: cballevre
 * Date: 07/06/2018
 * Time: 00:14
 */

namespace Core\DAO;

interface interfaceDAO {

    public function findAll();

    public function findByPrimaryKey($primaryKey);

}