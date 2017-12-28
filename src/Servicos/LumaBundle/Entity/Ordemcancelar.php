<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Ordemcancelar
 */
class Ordemcancelar
{
    /**
     * @var integer
     */
    private $ordecancCodigoid;

    /**
     * @var string
     */
    private $ordecancMotivo;

    /**
     * @var string
     */
    private $ordecancMotivofornecedor;

    /**
     * @var integer
     */
    private $ordecancUsr;

    /**
     * @var integer
     */
    private $ordecancTipo;

    /**
     * @var \DateTime
     */
    private $ordecancDatainc;

    /**
     * @var integer
     */
    private $ordeCodigoid;


    /**
     * Get ordecancCodigoid
     *
     * @return integer 
     */
    public function getOrdecancCodigoid()
    {
        return $this->ordecancCodigoid;
    }

    /**
     * Set ordecancMotivo
     *
     * @param string $ordecancMotivo
     * @return Ordemcancelar
     */
    public function setOrdecancMotivo($ordecancMotivo)
    {
        $this->ordecancMotivo = $ordecancMotivo;

        return $this;
    }

    /**
     * Get ordecancMotivo
     *
     * @return string 
     */
    public function getOrdecancMotivo()
    {
        return $this->ordecancMotivo;
    }

    /**
     * Set ordecancMotivofornecedor
     *
     * @param string $ordecancMotivofornecedor
     * @return Ordemcancelar
     */
    public function setOrdecancMotivofornecedor($ordecancMotivofornecedor)
    {
        $this->ordecancMotivofornecedor = $ordecancMotivofornecedor;

        return $this;
    }

    /**
     * Get ordecancMotivofornecedor
     *
     * @return string 
     */
    public function getOrdecancMotivofornecedor()
    {
        return $this->ordecancMotivofornecedor;
    }

    /**
     * Set ordecancUsr
     *
     * @param integer $ordecancUsr
     * @return Ordemcancelar
     */
    public function setOrdecancUsr($ordecancUsr)
    {
        $this->ordecancUsr = $ordecancUsr;

        return $this;
    }

    /**
     * Get ordecancUsr
     *
     * @return integer 
     */
    public function getOrdecancUsr()
    {
        return $this->ordecancUsr;
    }

    /**
     * Set ordecancTipo
     *
     * @param integer $ordecancTipo
     * @return Ordemcancelar
     */
    public function setOrdecancTipo($ordecancTipo)
    {
        $this->ordecancTipo = $ordecancTipo;

        return $this;
    }

    /**
     * Get ordecancTipo
     *
     * @return integer 
     */
    public function getOrdecancTipo()
    {
        return $this->ordecancTipo;
    }

    /**
     * Set ordecancDatainc
     *
     * @param \DateTime $ordecancDatainc
     * @return Ordemcancelar
     */
    public function setOrdecancDatainc($ordecancDatainc)
    {
        $this->ordecancDatainc = $ordecancDatainc;

        return $this;
    }

    /**
     * Get ordecancDatainc
     *
     * @return \DateTime 
     */
    public function getOrdecancDatainc()
    {
        return $this->ordecancDatainc;
    }

    /**
     * Set ordeCodigoid
     *
     * @param integer $ordeCodigoid
     * @return Ordemcancelar
     */
    public function setOrdeCodigoid($ordeCodigoid)
    {
        $this->ordeCodigoid = $ordeCodigoid;

        return $this;
    }

    /**
     * Get ordeCodigoid
     *
     * @return integer 
     */
    public function getOrdeCodigoid()
    {
        return $this->ordeCodigoid;
    }
}
