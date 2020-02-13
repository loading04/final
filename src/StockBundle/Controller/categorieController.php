<?php

namespace StockBundle\Controller;

use StockBundle\Entity\categorie;
use StockBundle\Form\categorieType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class categorieController extends Controller
{

    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $categories = $em->getRepository('StockBundle:categorie')->findAll();

        return $this->render('categorie/index.html.twig', array(
            'categories' => $categories,
        ));
    }


    public function newAction(Request $request)
    {
        $categorie = new Categorie();
        $form = $this->createForm('StockBundle\Form\categorieType', $categorie);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($categorie);
            $em->flush();

            return $this->redirectToRoute('stock_homepage4', array('id_categorie' => $categorie->getIdCategorie()));
        }

        return $this->render('categorie/new.html.twig', array(
            'categorie' => $categorie,
            'form' => $form->createView(),
        ));
    }


    public function showAction(categorie $categorie)
    {
        $deleteForm = $this->createDeleteForm($categorie);

        return $this->render('categorie/show.html.twig', array(
            'categorie' => $categorie,
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Displays a form to edit an existing commande entity.
     *
     * @Route("/{id_categorie}/editcategorie", name="categorie_edit" , methods={"GET","POST"})
     *
     */

    public function editAction(Request $request, $id)
    {
        $em=$this->getDoctrine()->getManager();
        $p= $em->getRepository('StockBundle:categorie')->find($id);
        $form=$this->createForm(categorieType::class,$p);
        $form->handleRequest($request);
        if($form->isSubmitted()){


            $em= $this->getDoctrine()->getManager();
            $em->persist($p);
            $em->flush();
            return $this->redirectToRoute('stock_homepage4');

        }
        return $this->render('categorie/edit.html.twig', array(
            "form"=> $form->createView()
        ));
    }




    public function deleteAction($id)
    {
        //$id_categorie = $request->get('$id_categorie');
        $em= $this->getDoctrine()->getManager();
        $categorie=$em->getRepository(categorie::class)->find($id);
        $em->remove($categorie);
        $em->flush();
        return $this->redirectToRoute('stock_homepage4');

    }

    /**
     * Creates a form to delete a categorie entity.
     *
     * @param categorie $categorie The categorie entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(categorie $categorie)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('categorie_delete', array('id_categorie' => $categorie->getIdCategorie())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
