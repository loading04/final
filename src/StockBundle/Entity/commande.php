<?php

namespace StockBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * commande
 *
 * @ORM\Table(name="commande")
 * @ORM\Entity(repositoryClass="StockBundle\Repository\commandeRepository")
 */
class commande
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_commande", type="integer")
     * @ORM\Id
     */
    public $id_commande;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_produit", type="string", length=255)
     */
    public $nomProduit;

    /**
     * @var string
     *
     * @ORM\Column(name="id_fournisseur", type="string", length=255)
     */
    public $idFournisseur;

    /**
     * @var string
     *
     * @ORM\Column(name="id_categorie", type="string", length=255)
     */
    public $idCategorie;

    /**
     * @var int
     *
     * @ORM\Column(name="quantite_cammande", type="integer")
     */
    public $quantiteCammande;

    /**
     * @return int
     */
    public function getIdCommande()
    {
        return $this->id_commande;
    }

    /**
     * @param int $id_commande
     */
    public function setIdCommande($id_commande)
    {
        $this->id_commande = $id_commande;
    }




    /**
     * Set nomProduit
     *
     * @param string $nomProduit
     *
     * @return commande
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
     * Set idFournisseur
     *
     * @param string $idFournisseur
     *
     * @return commande
     */
    public function setIdFournisseur($idFournisseur)
    {
        $this->idFournisseur = $idFournisseur;

        return $this;
    }

    /**
     * Get idFournisseur
     *
     * @return string
     */
    public function getIdFournisseur()
    {
        return $this->idFournisseur;
    }

    /**
     * Set idCategorie
     *
     * @param string $idCategorie
     *
     * @return commande
     */
    public function setIdCategorie($idCategorie)
    {
        $this->idCategorie = $idCategorie;

        return $this;
    }

    /**
     * Get idCategorie
     *
     * @return string
     */
    public function getIdCategorie()
    {
        return $this->idCategorie;
    }

    /**
     * Set quantiteCammande
     *
     * @param integer $quantiteCammande
     *
     * @return commande
     */
    public function setQuantiteCammande($quantiteCammande)
    {
        $this->quantiteCammande = $quantiteCammande;

        return $this;
    }

    /**
     * Get quantiteCammande
     *
     * @return int
     */
    public function getQuantiteCammande()
    {
        return $this->quantiteCammande;
    }
}

