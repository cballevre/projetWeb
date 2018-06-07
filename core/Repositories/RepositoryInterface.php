<?php
/**
 * Created by PhpStorm.
 * User: cballevre
 * Date: 07/06/2018
 * Time: 13:54
 */

namespace Core\Repositories;

/**
 * Interface RepositoryInterface
 * @package Core\Repositories
 */
interface RepositoryInterface {

    /**
     * @return mixed
     */
    public function findAll();

    /**
     * @param array $param
     * @return mixed
     */
    public function findById($id);


    /**
     * @param array $param
     * @return mixed
     */
    public function findBy(array $param);

    /**
     * @param array $data
     * @return mixed
     */
    public function create(array $data);

    /**
     * @param array $data
     * @param $id
     * @return mixed
     */
    public function update(array $data, $id);

    /**
     * @param $id
     * @return mixed
     */
    public function delete($id);

}