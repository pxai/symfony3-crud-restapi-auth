<?php

namespace Pello\InventoryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Pello\IventoryBundle\Repository\ItemRepository;

class ItemController extends Controller
{
    /**
     * @Route("/admin/items", name="item_index")
     */
    public function indexAction()
    {
        $items = $this->getDoctrine()->getRepository("PelloInventoryBundle:Item")->findItems();
        return $this->render('PelloInventoryBundle:Item:index.html.twig',array("items"=>$items));
    }
}
