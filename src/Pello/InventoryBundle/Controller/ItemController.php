<?php

namespace Pello\InventoryBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Pello\IventoryBundle\Repository\ItemRepository;
use Pello\InventoryBundle\Form\Type\ItemType;
use Pello\InventoryBundle\Entity\Item;

class ItemController extends Controller
{
    /**
     * @Route("/admin/item", name="item_index")
     */
    public function indexAction()
    {
        $items = $this->get("pello_inventory.bo.item")->selectAll();
        return $this->render('PelloInventoryBundle:Item:index.html.twig',array("items"=>$items));
    }

    /**
     * 
     * @Route("/admin/item/detail/{id}", name="item_detail")
     */
    public function itemDetailAction($id)
    {
        $item = $this->get("pello_inventory.bo.item")->selectById($id);
        return $this->render('PelloInventoryBundle:Item:detail.html.twig',array("item"=>$item));
    }
    
     /**
     * 
     * @Route("/admin/item/new", name="item_new")
     */
    public function itemNewAction()
    {
        $form = $this->createForm(ItemType::class);
        return $this->render('PelloInventoryBundle:Item:new.html.twig', array('form'=> $form->createView()));
    }

     /**
     * 
     * @Route("/admin/item/new/save", name="item_new_save")
     * @Method({"POST"})
     */
    public function itemNewSaveAction(Request $request)
    {
        $form = $this->createForm(ItemType::class, new Item());
        $form->handleRequest($request);
            
        if ($form->isValid()) {
            $item = $form->getData();
            $this->get("pello_inventory.bo.item")->create($item);
            $response =  $this->render('PelloInventoryBundle:Item:newSave.html.twig', array('item' => $item));               
        } else {
            $response = $this->render('PelloInventoryBundle:Item:new.html.twig', array('form'=> $form->createView()));
        }
        return $response;
    }

    
    /**
     * 
     * @Route("/admin/item/update/{id}", name="item_update")
     */
    public function itemUpdateAction($id)
    {
       $item = $this->get("pello_inventory.bo.item")->selectById($id);
       $form = $this->createForm(ItemType::class, $item);
       return $this->render('PelloInventoryBundle:Item:update.html.twig',array("form"=> $form->createView()));
    }

    
     /**
     * 
     * @Route("/admin/item/update/save", name="item_update_save")
     * @Method({"POST"})
     */
    public function itemUpdateSaveAction(Request $request)
    {
       $form = $this->createForm(ItemType::class, new Item());
       $form->handleRequest($request);
            
        if ($form->isValid()) {
            $item = $form->getData();
            print_r($item);
            $this->get("pello_inventory.bo.item")->update($item);
            $response =  $this->forward('PelloInventoryBundle:Item:detail.html.twig', array('item' => $item));               
            //return $this->indexAction();
        } else {
            $response = $this->render('PelloInventoryBundle:Item:update.html.twig', array('form'=> $form->createView()));
        }
        return $response;   
        
    }
    
    /**
     * 
     * @Route("/admin/item/delete/{id}", name="item_delete")
     */
    public function itemDeleteAction($id)
    {
        $item = $this->get("pello_inventory.bo.item")->selectById($id);
        return $this->render('PelloInventoryBundle:Item:delete.html.twig',array("item"=>$item));    
    }
    
     /**
     * 
     * @Route("/admin/item/delete/save/{id}", name="item_delete_confirm")
     */
    public function itemDeleteSaveAction(Item $item)
    {
        $this->get("pello_inventory.bo.item")->remove($item);
        return $this->indexAction();
    }
    
}
