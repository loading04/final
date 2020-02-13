<?php

namespace FrontOfficeBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Panier
 *
 * @ORM\Table(name="panier")
 * @ORM\Entity(repositoryClass="FrontOfficeBundle\Repository\PanierRepository")
 */
class Panier
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
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return ArrayCollection
     */
    public function getDetailsPaniers()
    {
        return $this->Details_Paniers;
    }

    /**
     * @param ArrayCollection $Details_Paniers
     */
    public function setDetailsPaniers($Details_Paniers)
    {
        $this->Details_Paniers = $Details_Paniers;
    }
    /**
     * @ORM\OneToMany (targetEntity="Detail_Panier",
    mappedBy="Panier")
     */
    private $Details_Paniers;
    public function __construct()
    {
        $this->Details_Paniers=new ArrayCollection();
    }
}

