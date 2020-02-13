<?php

namespace FactureBundle\Controller;

use BalProjetBundle\Entity\Projet;
use FactureBundle\Entity\Facture;
use FactureBundle\FactureBundle;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Facture controller.
 *
 * @Route("facture")
 */
class FactureController extends Controller
{
    /**
     * Lists all facture entities.
     *
     * @Route("/", name="facture_index" , methods={"GET"})
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $factures = $em->getRepository('FactureBundle:Facture')->findAll();

        return $this->render('facture/index.html.twig', array(
            'factures' => $factures,
        ));
    }

    /**
     * Creates a new facture entity.
     *
     * @Route("/new", name="facture_new", methods={"GET","POST"})
     */
    public function newAction(Request $request)
    {
        $facture = new Facture();
        $form = $this->createForm('FactureBundle\Form\FactureType', $facture);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($facture);
            $em->flush();

            return $this->redirectToRoute('facture_show', array('idFacture' => $facture->getIdfacture()));
        }

        return $this->render('facture/new.html.twig', array(
            'facture' => $facture,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a facture entity.
     *
     * @Route("/{idFacture}", name="facture_show" , methods={"GET"})
     */
    public function showAction(Facture $facture)
    {
        $deleteForm = $this->createDeleteForm($facture);
        return $this->render('facture/show.html.twig', array(
            'facture' => $facture,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing facture entity.
     *
     * @Route("/{idFacture}/edit", name="facture_edit" , methods={"GET" , "POST"})
     */
    public function editAction(Request $request, Facture $facture)
    {
        $deleteForm = $this->createDeleteForm($facture);
        $editForm = $this->createForm('FactureBundle\Form\FactureType', $facture);
        $editForm->handleRequest($request);
        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('facture_edit', array('idFacture' => $facture->getIdfacture()));
        }

        return $this->render('facture/edit.html.twig', array(
            'facture' => $facture,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a facture entity.
     *
     * @Route("/{idFacture}", name="facture_delete" , methods={"DELETE"})
     */
    public function deleteAction(Request $request, Facture $facture)
    {
        $form = $this->createDeleteForm($facture);
        $form->handleRequest($request);
        print ("gdg");

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($facture);
            $em->flush();
        }

        return $this->redirectToRoute('facture_index');
    }

    /**
     * Creates a form to delete a facture entity.
     *
     * @param Facture $facture The facture entity
     *
     * @return \Symfony\Component\Form\FormInterface
     */
    private function createDeleteForm(Facture $facture)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('facture_delete', array('idFacture' => $facture->getIdFacture())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
    public function dellAction(Request $request){
        //1.recu d l objet
        $em = $this->getDoctrine()->getManager();
        $Facture= $em->getRepository(Facture::class)->find($IdFacture);
        $em->remove($Facture);
        $em->flush();

    }
    public function deletepostAction(Request $request)
    {
        $idFacture= $request->get('idFacture');
        $em= $this->getDoctrine()->getManager();
        $Facture=$em->getRepository(Facture::class)->find($idFacture);
        $em->remove($Facture);
        $em->flush();
        //
        return $this->redirectToRoute('facture_index');
    }
}
