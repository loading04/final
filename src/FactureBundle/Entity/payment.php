<?php

namespace FactureBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * payment
 *
 * @ORM\Table(name="payment")
 * @ORM\Entity(repositoryClass="FactureBundle\Repository\paymentRepository")
 */
class payment
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_payment", type="integer")
     * @ORM\Id
     */
    private $id_payment;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="date_payment", type="date")
     */
    private $datePayment;

    /**
     * @var string
     *
     * @ORM\Column(name="montant", type="string", length=255)
     */
    private $montant;



    /**
     * Set datePayment
     *
     * @param \DateTime $datePayment
     *
     * @return payment
     */
    public function setDatePayment($datePayment)
    {
        $this->datePayment = $datePayment;

        return $this;
    }

    /**
     * @return int
     */
    public function getIdPayment()
    {
        return $this->id_payment;
    }

    /**
     * @ORM\ManyToOne(targetEntity="Facture")
     * @ORM\JoinColumn(name="facture_id1",referencedColumnName="idFacture")
     */
    private $Facture;

    /**
     * @param int $id_payment
     */
    public function setIdPayment($id_payment)
    {
        $this->id_payment = $id_payment;
    }

    /**
     * Get datePayment
     *
     * @return \DateTime
     */
    public function getDatePayment()
    {
        return $this->datePayment;
    }

    /**
     * Set montant
     *
     * @param string $montant
     *
     * @return payment
     */
    public function setMontant($montant)
    {
        $this->montant = $montant;

        return $this;
    }

    /**
     * Get montant
     *
     * @return string
     */
    public function getMontant()
    {
        return $this->montant;
    }
}

