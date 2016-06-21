<?php
// src/Pello/InventoryBundle/EntityRepository/ItemRepository.php

namespace Pello\InventoryBundle\EntityRepository;
use Doctrine\ORM\EntityRepository;

class ItemRepository extends EntityRepository
{

	/**
	* customized function
	*
	*/
	public function findItems()
	{
            return $this->findAll();
	}
}