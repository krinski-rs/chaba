<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * PlanosVpsn
 */
class PlanosVpsn
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $accountid;

    /**
     * @var string
     */
    private $vpsn;

    /**
     * @var string
     */
    private $tipo;


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
     * Set accountid
     *
     * @param integer $accountid
     * @return PlanosVpsn
     */
    public function setAccountid($accountid)
    {
        $this->accountid = $accountid;

        return $this;
    }

    /**
     * Get accountid
     *
     * @return integer 
     */
    public function getAccountid()
    {
        return $this->accountid;
    }

    /**
     * Set vpsn
     *
     * @param string $vpsn
     * @return PlanosVpsn
     */
    public function setVpsn($vpsn)
    {
        $this->vpsn = $vpsn;

        return $this;
    }

    /**
     * Get vpsn
     *
     * @return string 
     */
    public function getVpsn()
    {
        return $this->vpsn;
    }

    /**
     * Set tipo
     *
     * @param string $tipo
     * @return PlanosVpsn
     */
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return string 
     */
    public function getTipo()
    {
        return $this->tipo;
    }
}
