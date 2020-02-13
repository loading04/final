<?php

namespace FrontOfficeBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * Commande
 *
 * @ORM\Table(name="commandeC")
 * @ORM\Entity(repositoryClass="FrontOfficeBundle\Repository\CommandeRepository")
 */
class Commande
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="qte_c", type="datetime")
     */
    private $Date;

    /**
     * @return \DateTime
     */
    public function getDate()
    {
        return $this->Date;
    }

    /**
     * @param \DateTime $Date
     */
    public function setDate($Date)
    {
        $this->Date = $Date;
    }


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }
    /**
     * @ORM\ManyToOne(targetEntity="Client",inversedBy="Commandes")
     * @ORM\JoinColumn(name="Client_id",referencedColumnName="id")
     */
    private $Client;

    /**
     * @ORM\OneToMany (targetEntity="FrontOfficeBundle\Entity\detail_commande",
    mappedBy="commande")
     */
    private $Detail_commandes;
    public function __construct()
    {
        $this->Detail_commandes=new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getClient()
    {
        return $this->Client;
    }

    /**
     * @param mixed $Client
     */
    public function setClient($Client)
    {
        $this->Client = $Client;
    }

    /**
     * @return ArrayCollection
     */
    public function getDetailCommandes()
    {
        return $this->Detail_commandes;
    }

    /**
     * @param ArrayCollection $Detail_commandes
     */
    public function setDetailCommandes($Detail_commandes)
    {
        $this->Detail_commandes = $Detail_commandes;
    }

}

