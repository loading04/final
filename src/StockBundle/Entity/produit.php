<?php

namespace StockBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
/**
 * produit
 *
 * @ORM\Table(name="produit")
 * @ORM\Entity(repositoryClass="StockBundle\Repository\produitRepository")
 */
class produit
{
    /**
     * @var reference
     *
     * @ORM\Column(name="reference", type="string")
     * @ORM\Id
     */
    private $reference;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_produit", type="string", length=255)
     */
    private $nomProduit;

    /**
     * @var string
     *
     * @ORM\Column(name="description_produit", type="string", length=255)
     */
    private $descriptionProduit;

    /**
     * @var int
     *
     * @ORM\Column(name="quantite", type="integer")
     */
    private $quantite;

    /**
     * @var int
     *
     * @ORM\Column(name="prix_unitaire", type="integer")
     */
    private $prixUnitaire;

    /**
     * @var int
     *
     * @ORM\Column(name="prix_vente", type="integer")
     */
    private $prixVente;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_fabrication", type="datetimetz")
     */
    private $dateFabrication;

    /**
     * @ORM\ManyToOne(targetEntity="categorie")
     * @ORM\JoinColumn(name="categorie",referencedColumnName="id_categorie")
     */
    private $categorie;

    /**
     * @return mixed
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * @param mixed $categorie
     */
    public function setCategorie($categorie)
    {
        $this->categorie = $categorie;
    }

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_expiration", type="datetimetz")
     */
    private $dateExpiration;


    /**
     * @ORM\Column(name="photoProduit", type="string", length=500)
     *
    @Assert\File(maxSize="500k", mimeTypes={"image/jpeg", "image/jpg", "image/png", "image/GIF"})
    */
private $photoProduit;

    /**
     * @return mixed
     */
    public function getPhotoProduit()
    {
        return $this->photoProduit;
    }

    /**
     * @param mixed $photoProduit
     */
    public function setPhotoProduit($photoProduit)
    {
        $this->photoProduit = $photoProduit;
    }

    /**
     * @return reference
     */
    public function getReference()
    {
        return $this->reference;
    }

    /**
     * @param reference $reference
     */
    public function setReference($reference)
    {
        $this->reference = $reference;
    }


    /**
     * Set nomProduit
     *
     * @param string $nomProduit
     *
     * @return produit
     */
    public function setNomProduit($nomProduit)
    {
        $this->nomProduit = $nomProduit;

        return $this;
    }

    /**
     * Get nomProduit
     *
     * @return string
     */
    public function getNomProduit()
    {
        return $this->nomProduit;
    }

    /**
     * Set descriptionProduit
     *
     * @param string $descriptionProduit
     *
     * @return produit
     */
    public function setDescriptionProduit($descriptionProduit)
    {
        $this->descriptionProduit = $descriptionProduit;

        return $this;
    }

    /**
     * Get descriptionProduit
     *
     * @return string
     */
    public function getDescriptionProduit()
    {
        return $this->descriptionProduit;
    }

    /**
     * Set quantite
     *
     * @param integer $quantite
     *
     * @return produit
     */
    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;

        return $this;
    }

    /**
     * Get quantite
     *
     * @return int
     */
    public function getQuantite()
    {
        return $this->quantite;
    }

    /**
     * Set prixUnitaire
     *
     * @param integer $prixUnitaire
     *
     * @return produit
     */
    public function setPrixUnitaire($prixUnitaire)
    {
        $this->prixUnitaire = $prixUnitaire;

        return $this;
    }

    /**
     * Get prixUnitaire
     *
     * @return int
     */
    public function getPrixUnitaire()
    {
        return $this->prixUnitaire;
    }

    /**
     * Set prixVente
     *
     * @param integer $prixVente
     *
     * @return produit
     */
    public function setPrixVente($prixVente)
    {
        $this->prixVente = $prixVente;

        return $this;
    }

    /**
     * Get prixVente
     *
     * @return int
     */
    public function getPrixVente()
    {
        return $this->prixVente;
    }

    /**
     * Set dateFabrication
     *
     * @param \DateTime $dateFabrication
     *
     * @return produit
     */
    public function setDateFabrication($dateFabrication)
    {
        $this->dateFabrication = $dateFabrication;

        return $this;
    }

    /**
     * Get dateFabrication
     *
     * @return \DateTime
     */
    public function getDateFabrication()
    {
        return $this->dateFabrication;
    }

    /**
     * Set dateExpiration
     *
     * @param \DateTime $dateExpiration
     *
     * @return produit
     */
    public function setDateExpiration($dateExpiration)
    {
        $this->dateExpiration = $dateExpiration;

        return $this;
    }

    /**
     * Get dateExpiration
     *
     * @return \DateTime
     */
    public function getDateExpiration()
    {
        return $this->dateExpiration;
    }


}

