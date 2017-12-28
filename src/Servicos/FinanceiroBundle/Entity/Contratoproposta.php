<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Contratoproposta
 */
class Contratoproposta
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $idproposal;

    /**
     * @var integer
     */
    private $idcontrato;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set idproposal
     *
     * @param integer $idproposal
     * @return Contratoproposta
     */
    public function setIdproposal($idproposal)
    {
        $this->idproposal = $idproposal;

        return $this;
    }

    /**
     * Get idproposal
     *
     * @return integer 
     */
    public function getIdproposal()
    {
        return $this->idproposal;
    }

    /**
     * Set idcontrato
     *
     * @param integer $idcontrato
     * @return Contratoproposta
     */
    public function setIdcontrato($idcontrato)
    {
        $this->idcontrato = $idcontrato;

        return $this;
    }

    /**
     * Get idcontrato
     *
     * @return integer 
     */
    public function getIdcontrato()
    {
        return $this->idcontrato;
    }
}
