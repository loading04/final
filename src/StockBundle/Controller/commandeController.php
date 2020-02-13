<?php

namespace StockBundle\Controller;

use StockBundle\Entity\categorie;
use StockBundle\Entity\commande;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

/**
 * Commande controller.
 *
 * @Route("commande")
 */
class commandeController extends Controller
{
    /**
     * Lists all commande entities.
     *
     * @Route("/", name="commande_index" , methods={"GET"})

     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $commandes = $em->getRepository('StockBundle:commande')->findAll();

        return $this->render('commande/index.html.twig', array(
            'commandes' => $commandes,
        ));
    }

    /**
     * Creates a new commande entity.
     *
     * @Route("/new", name="commande_new" , methods={"GET","POST"})

     */
    public function newAction(Request $request)
    {
        $commande = new Commande();
        $form = $this->createForm('StockBundle\Form\commandeType', $commande);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($commande);
            $em->flush();

            return $this->redirectToRoute('commande_index', array('id_commande' => $commande->getIdCommande()));
        }

        return $this->render('commande/new.html.twig', array(
            'commande' => $commande,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a commande entity.
     *
     * @Route("/{id_commande}", name="commande_show" , methods={"GET"})

     */
    public function showAction(commande $commande)
    {
        $deleteForm = $this->createDeleteForm($commande);

        return $this->render('commande/show.html.twig', array(
            'commande' => $commande,
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Displays a form to edit an existing commande entity.
     *
     * @Route("/{id_commande}/edit", name="commande_edit" , methods={"GET","POST"})
     *
     */
    public function editAction(Request $request, commande $commande)
    {
        $deleteForm = $this->createDeleteForm($commande);
        $editForm = $this->createForm('StockBundle\Form\commandeType', $commande);
        $editForm->handleRequest($request);

        if ($editForm->isSubmitted() && $editForm->isValid()) {
            $this->getDoctrine()->getManager()->flush();

            return $this->redirectToRoute('stock_homepagecom');
        }

        return $this->render('commande/edit.html.twig', array(
            'commande' => $commande,
            'edit_form' => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Deletes a commande entity.
     *
     * @Route("/{id_commande}", name="commande_delete" , methods={"DELETE"})

     */
    public function deleteAction($id)
    {
      //  $id_commande = $request->get('id_commande');
        $em= $this->getDoctrine()->getManager();
        $commande=$em->getRepository(commande::class)->find($id);
        $em->remove($commande);
        $em->flush();
        return $this->redirectToRoute('commande_index');
    }


    /**
     * Creates a form to delete a commande entity.
     *
     * @param commande $commande The commande entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm(commande $commande)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('commande_delete', array('id_commande' => $commande->getIdCommande())))
            ->setMethod('DELETE')
            ->getForm()
        ;
    }
}
