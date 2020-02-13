<?php

namespace FrontOfficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * detail_commande
 *
 * @ORM\Table(name="detail_commande")
 * @ORM\Entity(repositoryClass="FrontOfficeBundle\Repository\detail_commandeRepository")
 */
class detail_commande
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
     * @var int
     *
     * @ORM\Column(name="qte_c", type="integer")
     */
    private $qteC;


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
     * Set qteC
     *
     * @param integer $qteC
     *
     * @return detail_commande
     */
    public function setQteC($qteC)
    {
        $this->qteC = $qteC;

        return $this;
    }

    /**
     * Get qteC
     *
     * @return int
     */
    public function getQteC()
    {
        return $this->qteC;
    }

    /**
     * @return mixed
     */
    public function getCommande()
    {
        return $this->Commande;
    }

    /**
     * @param mixed $Commande
     */
    public function setCommande($Commande)
    {
        $this->Commande = $Commande;
    }

    /**
     * @return mixed
     */
    public function getProduit()
    {
        return $this->Produit;
    }

    /**
     * @param mixed $Produit
     */
    public function setProduit($Produit)
    {
        $this->Produit = $Produit;
    }
    /**
     * @ORM\ManyToOne(targetEntity="FrontOfficeBundle\Entity\Commande",inversedBy="detail_commandes")
     * @ORM\JoinColumn(name="commande_id",referencedColumnName="id")
     */
    private $Commande;
    /**
     * @ORM\ManyToOne(targetEntity="StockBundle\Entity\produit",inversedBy="Details_commandes")
     * @ORM\JoinColumn(name="Produit_id",referencedColumnName="reference")
     */
    private $Produit;

}


