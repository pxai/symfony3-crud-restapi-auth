<?php

namespace Pello\InventoryBundle\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

use Symfony\Component\Serializer\Serializer;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;

use Pello\InventoryBundle\Form\Type\ItemType;
use Pello\InventoryBundle\Entity\Item;

class ItemApiController extends Controller
{

        private $serializer;
    
    public function __construct () {
        $encoders = array(new JsonEncoder());
        $normalizers = array(new ObjectNormalizer());

        $this->serializer = new Serializer($normalizers, $encoders);
    }
    
    /**
     * @Route("/admin/api/item", name="api_item_index")
     */
    public function indexApiAction()
    {
        $items = $this->get("pello_inventory.bo.item")->selectAll();
        $response = new Response($this->serializer->serialize($items, 'json'));
        $response->headers->set('Content-Type','application/json');
        $response->headers->set('Access-Control-Allow-Headers', 'origin, content-type, accept');
        $response->headers->set('Access-Control-Allow-Origin', '*');
        return $response;
    }

    /**
     * 
     * @Route("/admin/api/item/detail/{id}", name="api_item_detail")
     */
    public function itemDetailAction($id)
    {
        $item = $this->get("pello_inventory.bo.item")->selectById($id);
        $response = new Response($this->serializer->serialize($item, 'json'));
        $response->headers->set('Content-Type','application/json');
        return $response;
    }
   
//     /**
//     * 
//     * @Route("/admin/api/item/new", name="item_new")
//     */
//    public function itemNewAction()
//    {
//        $form = $this->createForm(ItemType::class);
//        return $this->render('PelloInventoryBundle:Item:new.html.twig', array('form'=> $form->createView()));
//    }
//
//     /**
//     * 
//     * @Route("/admin/api/item/new/save", name="api_item_new_save")
//     * @Method({"POST"})
//     */
//    public function itemNewSaveAction(Request $request)
//    {
//        $form = $this->createForm(ItemType::class, new Item());
//        $form->handleRequest($request);
//            
//        if ($form->isValid()) {
//            $item = $form->getData();
//            $this->get("pello_inventory.bo.item")->create($item);
//            $response =  $this->render('PelloInventoryBundle:Item:newSave.html.twig', array('item' => $item));               
//        } else {
//            $response = $this->render('PelloInventoryBundle:Item:new.html.twig', array('form'=> $form->createView()));
//        }
//        return $response;
//    }
//
//    
//    /**
//     * 
//     * @Route("/admin/api/item/update/{id}", name="api_item_update", requirements={
//     *     "id": "\d+"}))
//     */
//    public function itemUpdateAction($id)
//    {
//       $item = $this->get("pello_inventory.bo.item")->selectById($id);
//       $form = $this->createForm(ItemType::class, $item);
//       return $this->render('PelloInventoryBundle:Item:update.html.twig',array("form"=> $form->createView(),'msg'=> 'yes'));
//    }
//
//    
//     /**
//     * 
//     * @Route("/admin/api/item/update/save", name="api_item_update_save")
//     * Method({"POST"})
//     */
//    public function itemUpdateSaveAction(Request $request)
//    {
//       $form = $this->createForm(ItemType::class, new Item());
//       $form->handleRequest($request);
//
//        if ($form->isValid()) {
//
//            $item = $form->getData();
//
//            $this->get("pello_inventory.bo.item")->update($item);
//            //$response =  $this->forward('PelloInventoryBundle:Item:detail.html.twig', array('item' => $item));               
//            return $this->indexAction();
//        } else {
//
//            $response = $this->render('PelloInventoryBundle:Item:update.html.twig', array('form'=> $form->createView()));
//        }
//        return $response;   
//        
//    }
//    
//    /**
//     * 
//     * @Route("/admin/api/item/delete/{id}", name="api_item_delete")
//     */
//    public function itemDeleteAction($id)
//    {
//        $item = $this->get("pello_inventory.bo.item")->selectById($id);
//        return $this->render('PelloInventoryBundle:Item:delete.html.twig',array("item"=>$item));    
//    }
//    
//     /**
//     * 
//     * @Route("/admin/api/item/delete/save/{id}", name="api_item_delete_confirm")
//     */
//    public function itemDeleteSaveAction(Item $item)
//    {
//        $this->get("pello_inventory.bo.item")->remove($item);
//        return $this->indexAction();
//    }
//    
}
