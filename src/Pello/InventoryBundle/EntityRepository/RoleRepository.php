<?php
// src/Pello/InventoryBundle/EntityRepository/NewsRepository.php

namespace Pello\InventoryBundle\EntityRepository;

use Doctrine\ORM\EntityRepository;

class RoleRepository extends EntityRepository 
{
	/**
	* customized function
	*
	*/
	public function findRoles()
	{
            return $this->findAll();
	}
}
