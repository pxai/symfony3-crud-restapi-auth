<?php

namespace Pello\InventoryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Pello\IventoryBundle\Repository\ItemRepository;
use Pello\InventoryBundle\Entity\Item;

class ItemController extends Controller
{
    /**
     * @Route("/admin/items", name="item_index")
     */
    public function indexAction()
    {
        //$items = $this->getDoctrine()->getRepository("PelloInventoryBundle:Item")->findItems();
        $items = $this->get("pello_inventory.bo.item")->selectAll();
        
        return $this->render('PelloInventoryBundle:Item:index.html.twig',array("items"=>$items));
    }
}
