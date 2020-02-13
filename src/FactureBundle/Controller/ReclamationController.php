<?php

namespace FactureBundle\Controller;

use FactureBundle\Entity\Facture;
use FactureBundle\Entity\Reclamation;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;

/**
 * Reclamation controller.
 *
 * @Route("reclamation")
 */
class ReclamationController extends Controller
{
    /**
     * Lists all reclamation entities.
     *
     * @Route("/", name="reclamation_index",)

     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $reclamations = $em->getRepository('FactureBundle:Reclamation')->findAll();

        return $this->render('reclamation/index.html.twig', array(
            'reclamations' => $reclamations,
        ));
    }

    /**
     * Creates a new reclamation entity.
     *
     * @Route("/new", name="reclamation_new" , methods={"GET","POST"})
     */
    public function newAction(Request $request)
    {
        $reclamation = new Reclamation();
        $form = $this->createForm('FactureBundle\Form\ReclamationType', $reclamation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($reclamation);
            $em->flush();

            return $this->redirectToRoute('reclamation_show', array('id_reclamation' => $reclamation->getIdReclamation()));
        }

        return $this->render('reclamation/new.html.twig', array(
            'reclamation' => $reclamation,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a reclamation entity.
     *
     * @Route("/{id_reclamation}", name="reclamation_show" , methods={"GET"})
     */
    public function showAction(Reclamation $reclamation)
    {
        $deleteForm = $this->createDeleteForm($reclamation);

        return $this->render('reclamation/show.html.twig', array(
            'reclamation' => $reclamation,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing reclamation entity.
     *
     * @Route("/{id_reclamation}/edit", name="reclamation_edit" , methods={"GET","POST"})
     */
    public function editAction(Request $request, Reclamation $reclamation)
    {
        $deleteForm = $this->createDeleteForm($reclamation);
        $editForm = $this->createForm('FactureBundle\Form\ReclamationType', $reclamation);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('reclamation_edit', array('id_reclamation' => $reclamation->getIdReclamation()));
        }

        return $this->render('reclamation/edit.html.twig', array(
            'reclamation' => $reclamation,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a reclamation entity.
     *
     * @Route("/{id_reclamation}", name="reclamation_delete" , methods={"DELETE"})
     */
    public function deleteAction(Request $request, Reclamation $reclamation)
    {
        $form = $this->createDeleteForm($reclamation);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->remove($reclamation);
            $em->flush();
        }

        return $this->redirectToRoute('reclamation_index');
    }

    /**
     * Creates a form to delete a reclamation entity.
     *
     * @param Reclamation $reclamation The reclamation entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(Reclamation $reclamation)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('reclamation_delete', array('id_reclamation' => $reclamation->getIdReclamation())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
    public function deletepost1Action(Request $request)
    {
        $id_reclamation= $request->get('id_reclamation');
        $em= $this->getDoctrine()->getManager();
        $Reclamation=$em->getRepository(Reclamation::class)->find($id_reclamation);
        $em->remove($Reclamation);
        $em->flush();
        //
        return $this->redirectToRoute('reclamation_index');
    }
}
