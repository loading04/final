<?php

namespace BlogBundle\Controller;

use BlogBundle\Entity\Section;
use BlogBundle\Form\SectionType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class SectionController extends Controller
{
    public function addAction(Request $request)
    {

        //creation de formulaire
        $section = new Section();
        $form = $this->createForm(SectionType::class, $section);
        $form->handleRequest($request);
        //si le formulaire a été envoyer avec succes
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($section);
            $em->flush();
            return $this->redirectToRoute('list_section');
        }
        return $this->render('@Blog/Section/add.html.twig', array(
            "Form"=> $form->createView()
        ));
    }
    public function listsectionAction(Request $request)
    {

        $em=$this->getDoctrine()->getManager();
        $sections=$em->getRepository('BlogBundle:Section')->findAll();
        return $this->render('@Blog/Section/listsection.html.twig', array(
            "sections" =>$sections
        ));

    }

    public function deleteAction(Request $request)
    {
        $id = $request->get('id');
        $em= $this->getDoctrine()->getManager();
        $Section=$em->getRepository('BlogBundle:Section')->find($id);
        $em->remove($Section);
        $em->flush();
        return $this->redirectToRoute('list_section');
    }

    public function updateAction(Request $request,$id)
    {
        $em=$this->getDoctrine()->getManager();
        $p= $em->getRepository('BlogBundle:Section')->find($id);
        $form=$this->createForm(SectionType::class,$p);
        $form->handleRequest($request);
        if($form->isSubmitted()){

            $em= $this->getDoctrine()->getManager();
            $em->persist($p);
            $em->flush();
            return $this->redirectToRoute('list_section');

        }
        return $this->render('@Blog/Section/update.html.twig', array(
            "form"=> $form->createView()
        ));
    }

}
