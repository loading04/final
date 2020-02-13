<?php

namespace FrontOfficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Detail_Panier
 *
 * @ORM\Table(name="detail__panier")
 * @ORM\Entity(repositoryClass="FrontOfficeBundle\Repository\Detail_PanierRepository")
 */
class Detail_Panier
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
     * @ORM\Column(name="Qte", type="integer")
     */
    private $qte;


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
     * Set qte
     *
     * @param integer $qte
     *
     * @return Detail_Panier
     */
    public function setQte($qte)
    {
        $this->qte = $qte;

        return $this;
    }

    /**
     * Get qte
     *
     * @return int
     */
    public function getQte()
    {
        return $this->qte;
    }
    /**
     * @ORM\ManyToOne(targetEntity="Client",inversedBy="Details_Paniers")
     * @ORM\JoinColumn(name="Client_id",referencedColumnName="id")
     */
    private $Client;
    /**
     * @ORM\ManyToOne(targetEntity="Panier",inversedBy="Details_Paniers")
     * @ORM\JoinColumn(name="Panier_id",referencedColumnName="id")
     */
    private $Panier;

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
     * @return mixed
     */
    public function getPanier()
    {
        return $this->Panier;
    }

    /**
     * @param mixed $Panier
     */
    public function setPanier($Panier)
    {
        $this->Panier = $Panier;
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
     * @ORM\ManyToOne(targetEntity="StockBundle\Entity\produit",inversedBy="Details_Paniers")
     * @ORM\JoinColumn(name="Produit_id",referencedColumnName="reference")
     */
    private $Produit;

}

