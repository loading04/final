<?php

namespace BlogBundle\Controller;

use BlogBundle\Entity\Tag;
use BlogBundle\Form\TagType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class TagController extends Controller
{
    public function addAction(Request $request)
    {
        //creation de formulaire
        $tag = new Tag();
        $form = $this->createForm(TagType::class, $tag);
        $form->handleRequest($request);
        //si le formulaire a été envoyer avec succes
        if ($form->isSubmitted() && $form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($tag);
            $em->flush();
            return $this->redirectToRoute('list_tag');
        }
        return $this->render('@Blog/Tag/add.html.twig', array(
            "Form"=> $form->createView()
        ));
    }
    public function listtagAction(Request $request)
    {

        $em=$this->getDoctrine()->getManager();
        $tags=$em->getRepository('BlogBundle:Tag')->findAll();
        return $this->render('@Blog/Tag/listtag.html.twig', array(
            "tags" =>$tags
        ));

    }

    public function deleteAction(Request $request)
    {
        $id = $request->get('id');
        $em= $this->getDoctrine()->getManager();
        $Tag=$em->getRepository('BlogBundle:Tag')->find($id);
        $em->remove($Tag);
        $em->flush();
        return $this->redirectToRoute('list_tag');
    }

    public function updateAction(Request $request,$id)
    {
        $em=$this->getDoctrine()->getManager();
        $p= $em->getRepository('BlogBundle:Tag')->find($id);
        $form=$this->createForm(TagType::class,$p);
        $form->handleRequest($request);
        if($form->isSubmitted()){

            $em= $this->getDoctrine()->getManager();
            $em->persist($p);
            $em->flush();
            return $this->redirectToRoute('list_tag');

        }
        return $this->render('@Blog/Tag/update.html.twig', array(
            "form"=> $form->createView()
        ));
    }

}
