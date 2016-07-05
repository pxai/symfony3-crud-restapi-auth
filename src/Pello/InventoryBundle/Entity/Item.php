<?php

namespace Pello\InventoryBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="Pello\InventoryBundle\EntityRepository\ItemRepository")
 * @ORM\Table(name="item")
 */
class Item extends Entity
{
    /**
     * @ORM\Column(name="id",type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;
    
     /**
     * @ORM\Column(name="name",type="string", length=100)
     */
    private $name;
  
    /**
     * @ORM\Column(name="description",type="string", length=255)
     */
    private $description;
    
    /**
     * @ORM\Column(name="last_update",type="datetime", length=255)
     */
    private $lastUpdate;

    
    /**
     * @ORM\Column(name="status",type="integer")
     */
    private $status;

    
    public function __construct () {
        $this->lastUpdate = new \DateTime();
    }

    /**
    *
    */
    public function getId () {
      return $this->id;  
    }
    
    /**
    *
    */
    public function setId ($id) {
        $this->id = $id;
        return $this;
    }

    
    /**
    *
    */
    public function getName () {
      return $this->name;  
    }
    
    /**
    *
    */
    public function setName($name) {
        $this->name = $name;
        return $this;
    }
    public function getDescription() {
        return $this->description;
    }

    public function getLastUpdate() {
        return $this->lastUpdate;
    }

    public function getStatus() {
        return $this->status;
    }

    public function setDescription($description) {
        $this->description = $description;
    }

    public function setLastUpdate($lastUpdate) {
        $this->lastUpdate = $lastUpdate;
    }

    public function setStatus($status) {
        $this->status = $status;
    }


   
}