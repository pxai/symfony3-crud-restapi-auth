<?php

namespace Pello\InventoryBundle\Service\Business;

use Pello\InventoryBundle\Entity\Entity;
use Pello\InventoryBundle\Service\DAO\GenericDAO;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class GenericBusiness {
    
    private $entityDAO;
    
    public function __construct (GenericDAO $entityDAO) {
        $this->entityDAO = $entityDAO;
    }
    
    /**
     * selects all items from dao
     * @return type
     */
    public function selectAll() {
        return $this->entityDAO->selectAll();
    }
    
    /**
     * Selects item by id
     * @param type $id
     * @return type
     */
    public function selectById($id) {
        return $this->entityDAO->selectById($id);
    }
    
     /**
     * creates entity
     * @param type $id
     * @return type
     */
    public function create (Entity $entity) {
        return $this->entityDAO->create($entity);
    }
    
     /**
     * Removes entity
     * @param type $id
     * @return type
     */
    public function remove(Entity $entity) {
        return $this->entityDAO->remove($entity);
    }
}
