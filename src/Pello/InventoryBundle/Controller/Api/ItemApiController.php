<?php

namespace Pello\InventoryBundle\Controller\Api;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use FOS\RestBundle\Controller\Annotations as Rest;
use FOS\RestBundle\View\View;

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

    private function response ($data) {
      //$this->get('logger')->info('This is what we have: ' . $this->serializer->serialize($data, 'json'));
      $response = new Response($this->serializer->serialize($data, 'json'));
      $response->headers->set('Content-Type','application/json');
      $response->headers->set('Access-Control-Allow-Headers', 'origin, content-type, accept');
      $response->headers->set('Access-Control-Allow-Origin', '*');
      return $response;
    }

    /**
     * @Route("/admin/api/item", name="api_item_index")
     * @Rest\View
     */
    public function indexApiAction()
    {
        $items = $this->get("pello_inventory.bo.item")->selectAll();
        return $items;
    }

    /**
     *
     * @Route("/admin/api/item/detail/{id}", name="api_item_detail")
     * @Rest\View
     */
    public function itemDetailAction($id)
    {
        $item = $this->get("pello_inventory.bo.item")->selectById($id);
        return $item;
    }



    /**
    *
    * @Route("/admin/api/item/new/save", name="api_item_new_save")
    * @Method({"POST"})
    */
   public function itemNewSaveAction(Request $request)
   {
     $statusCode = 201;

     $form = $this->createForm(ItemType::class, new Item());
     $form->handleRequest($request);

     $this->get('logger')->info('Here we go.');

       if ($form->isValid()) {
           $item = $form->getData();
           $this->get('logger')->info('ITS CORRECT: ' . $this->serializer->serialize($item, 'json'));

           $this->get("pello_inventory.bo.item")->create($item);


           $response = new Response();
           $response->setStatusCode($statusCode);

           // set the `Location` header only when creating new resources
        /*   if (201 === $statusCode) {
               $response->headers->set('Location',
                   $this->generateUrl(
                       'acme_demo_user_get', array('id' => $item->getId()),
                       true // absolute
                   )
               );
           }*/

           return $response;
       }
           $this->get('logger')->info('NOT CORRECT');
       return View::create($form, 400);
    /*   $form = $this->createForm(ItemType::class, new Item());
       $form->handleRequest($request);
       $item = $form->getData();
      $this->get("logger")->info('This is what we have in POST: ' . $this->serializer->serialize($item, 'json'));
      // if ($form->isValid()) {

           $this->get("pello_inventory.bo.item")->create($item);
           return $this->response($item);
       //} else {
         //return $this->response("{'status':'Error', 'item': 'Error'}");
       //}
       */
   }

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
