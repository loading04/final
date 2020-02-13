<?php

namespace FrontOfficeBundle\Entity;

use AppBundle\Entity\User;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Client
 *
 * @ORM\Table(name="client")
 * @ORM\Entity(repositoryClass="FrontOfficeBundle\Repository\ClientRepository")
 */
class Client
{
    /**
     * @var int
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(name="id", type="integer")
     */
    private $idClient;


    /**
     * Get id
     *
     * @return int
     */
    public function getIdClient()
    {
        return $this->idClient;
    }
    /**
     *
     * @ORM\OneToMany(targetEntity="FrontOfficeBundle\Entity\Detail_Panier", mappedBy="Client")
     */
    private
    $Details_Paniers ;
    /**
     *
     * @ORM\OneToMany(targetEntity="FrontOfficeBundle\Entity\Commande", mappedBy="Client")
     */
    private
        $Commandes ;
    public function __construct()
    {
        $this->Details_Paniers=new ArrayCollection();
        $this->Commandes=new ArrayCollection();

    }
    /**
     * @ORM\OneToOne(targetEntity="AppBundle\Entity\User")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     *
     *
     */
      private $user;

    /**
     * @return mixed
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * @param mixed $user
     */
    public function setUser($user)
    {
        $this->user = $user;
    }

}

