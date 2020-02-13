<?php

namespace StockBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * categorie
 *
 * @ORM\Table(name="categorie")
 * @ORM\Entity(repositoryClass="StockBundle\Repository\categorieRepository")
 */
class categorie
{
    /**
     * @var id_categorie
     *
     * @ORM\Column(name="id_categorie", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    public $id_categorie;

    /**
     * @var string
     *
     * @ORM\Column(name="nom_categorie", type="string", length=255)
     */
    private $nomCategorie;

    /**
     * @var string
     *
     * @ORM\Column(name="description_categorie", type="string", length=255)
     */
    private $descriptionCategorie;

    /**
     * @var string
     *
     * @ORM\Column(name="type_stockage", type="string", length=255)
     */
    private $typeStockage;

    /**
     * @return id_categorie
     */
    public function getIdCategorie()
    {
        return $this->id_categorie;
    }

    /**
     * @param id_categorie $id_categorie
     */
    public function setIdCategorie($id_categorie)
    {
        $this->id_categorie = $id_categorie;
    }




    /**
     * Set nomCategorie
     *
     * @param string $nomCategorie
     *
     * @return categorie
     */
    public function setNomCategorie($nomCategorie)
    {
        $this->nomCategorie = $nomCategorie;

        return $this;
    }

    /**
     * Get nomCategorie
     *
     * @return string
     */
    public function getNomCategorie()
    {
        return $this->nomCategorie;
    }

    /**
     * Set descriptionCategorie
     *
     * @param string $descriptionCategorie
     *
     * @return categorie
     */
    public function setDescriptionCategorie($descriptionCategorie)
    {
        $this->descriptionCategorie = $descriptionCategorie;

        return $this;
    }

    /**
     * Get descriptionCategorie
     *
     * @return string
     */
    public function getDescriptionCategorie()
    {
        return $this->descriptionCategorie;
    }

    /**
     * Set typeStockage
     *
     * @param string $typeStockage
     *
     * @return categorie
     */
    public function setTypeStockage($typeStockage)
    {
        $this->typeStockage = $typeStockage;

        return $this;
    }

    /**
     * Get typeStockage
     *
     * @return string
     */
    public function getTypeStockage()
    {
        return $this->typeStockage;
    }
    public function __toString(){
        // to show the name of the Category in the select
        return $this->nomCategorie;
        // to show the id of the Category in the select
        // return $this->id;
    }
}

