<?php

namespace BlogBundle\Controller;

use BlogBundle\Entity\Post;
use BlogBundle\Form\PostType;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class BlogController extends Controller
{

    public function addAction(Request $request)
    {

        //creation de formulaire
        $post = new Post();
        $form= $this->createForm(PostType::class, $post);
        $form->handleRequest($request);
        //si le formulaire a été envoyer avec succes
        if($form->isSubmitted() && $form->isValid())
        {
            $em = $this->getDoctrine()->getManager();

            $file = $post->getPhoto();
            //genere un nom cripté avec md5
            $filename= md5(uniqid()) . '.' . $file->guessExtension();
            //ajouter l'image dance /web/uploads/post
            $file->move($this->getParameter('photos_directory'), $filename);
            $post->setPhoto($filename);
            //ajouter date de maintenant
            $post->setPostdate(new \DateTime('now'));
            //ajouter dans base
            $em->persist($post);
            $em->flush();
            return $this->redirectToRoute('list_post');

        }
        return $this->render('@Blog/Post/add.html.twig', array(
            "Form"=> $form->createView()
        ));
    }

    public function listpostAction(Request $request)
    {

        $em=$this->getDoctrine()->getManager();
        $posts=$em->getRepository('BlogBundle:Post')->findAll();
        return $this->render('@Blog/Post/list.html.twig', array(
            "posts" =>$posts
        ));

    }

    public function updatepostAction(Request $request, $id)
    {
        $em=$this->getDoctrine()->getManager();
        $p= $em->getRepository('BlogBundle:Post')->find($id);
        $form=$this->createForm(PostType::class,$p);
        $form->handleRequest($request);
        if($form->isSubmitted()){
            $file = $p->getPhoto();
            $filename= md5(uniqid()) . '.' . $file->guessExtension();
            $file->move($this->getParameter('photos_directory'), $filename);
            $p->setPhoto($filename);
            $p->setPostdate(new \DateTime('now'));
            $em= $this->getDoctrine()->getManager();
            $em->persist($p);
            $em->flush();
            return $this->redirectToRoute('list_post');

        }
        return $this->render('@Blog/Post/update.html.twig', array(
            "form"=> $form->createView()
        ));
    }

    public function deletepostAction(Request $request)
    {
        $id = $request->get('id');
        $em= $this->getDoctrine()->getManager();
        $Post=$em->getRepository('BlogBundle:Post')->find($id);
        $em->remove($Post);
        $em->flush();
        return $this->redirectToRoute('list_post');
    }

    public function showdetailedAction($id)
    {
        $em= $this->getDoctrine()->getManager();
        $p=$em->getRepository('BlogBundle:Post')->find($id);
        return $this->render('@Blog/Post/detailedpost.html.twig', array(
            'title'=>$p->getTitle(),
            'date'=>$p->getPostdate(),
            'photo'=>$p->getPhoto(),
            'descripion'=>$p->getDescription(),
            'posts'=>$p,
            'comments'=>$p,
            'id'=>$p->getId()
        ));
    }

}
