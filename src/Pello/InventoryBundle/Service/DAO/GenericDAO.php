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
        $em = $this->getDoctrine()->getEntityManager();
        $em->merge($entity);
        $em->flush();
        
        return $entity->getId();
    }
    
    /**
     * update Item
     * @param $entity
     */
    public function update ($entity) {
        $em = $this->getDoctrine()->getEntityManager();
        $em->merge($entity);
        $em->flush();        
    }
    
    /**
     * remove entity
     * @param $entity
     */
    public function remove ($entity) {
       $em = $this->getDoctrine()->getEntityManager();
       $em->remove($entity);
       $em->flush();
    }

}
