<?php

namespace FactureBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Reclamation
 *
 * @ORM\Table(name="reclamation")
 * @ORM\Entity(repositoryClass="FactureBundle\Repository\ReclamationRepository")
 */
class Reclamation
{
    /**
     * @var int
     *
     * @ORM\Column(name="id_reclamation", type="integer")
     * @ORM\Id
     */
    public $id_reclamation;

    /**
     * @var int
     *
     * @ORM\Column(name="client_id", type="integer")
     */
    public $clientId;
    /**
     * @var int
     *
     * @ORM\Column(name="description", type="string")
     */
    private $description;

    /**
     * @return int
     */
    public function getIdReclamation()
    {
        return $this->id_reclamation;
    }

    /**
     * @param int $id_reclamation
     */
    public function setIdReclamation($id_reclamation)
    {
        $this->id_reclamation = $id_reclamation;
    }


    /**
     * @return int
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param int $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }



    /**
     * Set clientId
     *
     * @param integer $clientId
     *
     * @return Reclamation
     */
    public function setClientId($clientId)
    {
        $this->clientId = $clientId;

        return $this;
    }

    /**
     * Get clientId
     *
     * @return int
     */
    public function getClientId()
    {
        return $this->clientId;
    }
}

