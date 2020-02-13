<?php

namespace FactureBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Facture
 *
 * @ORM\Table(name="facture")
 * @ORM\Entity(repositoryClass="FactureBundle\Repository\FactureRepository")
 */
class Facture
{
    /**
     * @var int
     *
     * @ORM\Column(name="idFacture", type="integer")
     * @ORM\Id
     */
    private $idFacture;



    /**
     * @var int
     *
     * @ORM\Column(name="employee_id", type="integer")
     */
    private $employeeId;

    /**
     * @var int
     *
     * @ORM\Column(name="fournisseur_id", type="integer")
     */
    private $fournisseurId;

    /**
     * @var string
     *
     * @ORM\Column(name="type_product", type="string", length=255)
     */
    private $typeProduct;


    /**
     * @var int
     *
     * @ORM\Column(name="montant", type="integer")
     */
    private $montant;

    /**
     * @return int
     */
    public function getMontant()
    {
        return $this->montant;
    }

    /**
     * @param int $montant
     */
    public function setMontant($montant)
    {
        $this->montant = $montant;
    }


    /**
     * Set idFacture
     *
     * @param string $idFacture
     *
     * @return Facture
     */
    public function setIdFacture($idFacture)
    {
        $this->idFacture = $idFacture;

        return $this;
    }

    /**
     * Get idFacture
     *
     * @return string
     */
    public function getIdFacture()
    {
        return $this->idFacture;
    }

    /**
     * Set employeeId
     *
     * @param integer $employeeId
     *
     * @return Facture
     */
    public function setEmployeeId($employeeId)
    {
        $this->employeeId = $employeeId;

        return $this;
    }

    /**
     * Get employeeId
     *
     * @return int
     */
    public function getEmployeeId()
    {
        return $this->employeeId;
    }

    /**
     * Set fournisseurId
     *
     * @param integer $fournisseurId
     *
     * @return Facture
     */
    public function setFournisseurId($fournisseurId)
    {
        $this->fournisseurId = $fournisseurId;

        return $this;
    }

    /**
     * Get fournisseurId
     *
     * @return int
     */
    public function getFournisseurId()
    {
        return $this->fournisseurId;
    }

    /**
     * Set typeProduct
     *
     * @param string $typeProduct
     *
     * @return Facture
     */
    public function setTypeProduct($typeProduct)
    {
        $this->typeProduct = $typeProduct;

        return $this;
    }

    /**
     * Get typeProduct
     *
     * @return string
     */
    public function getTypeProduct()
    {
        return $this->typeProduct;
    }
}

