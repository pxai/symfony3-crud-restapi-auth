<?php

namespace Pello\InventoryBundle\Service\DAO;

use Doctrine\ORM\EntityManager;

/**
 *
 * @author Pello Altadill
 */
abstract class GenericDAO {
    
    protected $entityType;
    protected $em;
    
    function __construct($entityType, EntityManager $em) {
        $this->entityType = $entityType;
        $this->em = $em;
    }
    
    /**
     * select one 
     * @param type $id
     */
    public function selectById($id) {
        return $this->em->getRepository($this->entityType)->findOneBy(array('id' => $id));
    }

    /**
     * selectBy any params given
     * @param type $params
     * @return type
     */
    public function selectBy($params) {
        return $this->em->getRepository($this->entityType)->findOneBy($params);
    }
    
    /**
     * select all items
     */
    public function selectAll() {
        return $this->em->getRepository($this->entityType)->findItems();        
    }
    
    /**
     * create one Item entity
     * @param Item $entity
     */
    public function create($entity) {
        $this->em->merge($entity);
        $this->em->flush();
        
        return $entity->getId();
    }
    
    /**
     * update Item
     * @param $entity
     */
    public function update ($entity) {
        $this->em->merge($entity);
        $this->em->flush();        
    }
    
    /**
     * remove entity
     * @param $entity
     */
    public function remove ($entity) {
       $this->em->remove($entity);
       $this->em->flush();
    }

}
