<?php

namespace FrontOfficeBundle\Controller;

use http\Env\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class PanierController extends Controller
{
    public function addAction ($id, Request $request){
        $session =$request->getSession();
        if (!$session->has('panier')) $session->set('panier',array());
        $panier =$session->get('panier');
        if (array_key_exists($id,$panier)){
            if($request->getQuery('qte')!=null) $panier[$id]=$request->getQuery('qte');
        } else {
            if($request->getQuery('qte')!=null)
            {
                $panier[$id]=1;
            }
            $this->get('session')->getFlashBag()->add('success','Article ajouté avec succés');

        }



    }
}
