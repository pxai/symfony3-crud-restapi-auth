<?php

namespace Pello\InventoryBundle\Service\Business;

use Pello\InventoryBundle\Entity\Item;
use Pello\InventoryBundle\Service\DAO\ItemDAO;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
class ItemBusiness {
    
    private $itemDAO;
    
    public function __construct (ItemDAO $itemDAO) {
        $this->itemDAO = $itemDAO;
    }
    
    /**
     * selects all items from dao
     * @return type
     */
    public function selectAll() {
        return $this->itemDAO->selectAll();
    }
    
    /**
     * Selects item by id
     * @param type $id
     * @return type
     */
    public function selectById($id) {
        return $this->itemDAO->selectById($id);
    }
    
     /**
     * Selects item by id
     * @param type $id
     * @return type
     */
    public function remove(Item $item) {
        return $this->itemDAO->remove($item);
    }
}
