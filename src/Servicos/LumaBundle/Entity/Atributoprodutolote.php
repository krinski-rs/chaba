<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Atributoprodutolote
 */
class Atributoprodutolote
{
    /**
     * @var integer
     */
    private $atriprodloteCodigoid;

    /**
     * @var integer
     */
    private $autUserid;

    /**
     * @var string
     */
    private $atriprodloteDado;

    /**
     * @var \DateTime
     */
    private $datainc;

    /**
     * @var \Servicos\LumaBundle\Entity\Atributoproduto
     */
    private $atriprodCodigoid;

    /**
     * @var \Servicos\LumaBundle\Entity\Lote
     */
    private $loteCodigoid;

    /**
     * @var \Servicos\GcdbBundle\Entity\AutUsuarios
     */
    private $autUsuarios;


    /**
     * Get atriprodloteCodigoid
     *
     * @return integer 
     */
    public function getAtriprodloteCodigoid()
    {
        return $this->atriprodloteCodigoid;
    }

    /**
     * Set autUserid
     *
     * @param integer $autUserid
     * @return Atributoprodutolote
     */
    public function setAutUserid($autUserid)
    {
        $this->autUserid = $autUserid;

        return $this;
    }

    /**
     * Get autUserid
     *
     * @return integer 
     */
    public function getAutUserid()
    {
        return $this->autUserid;
    }

    /**
     * Set atriprodloteDado
     *
     * @param string $atriprodloteDado
     * @return Atributoprodutolote
     */
    public function setAtriprodloteDado($atriprodloteDado)
    {
        $this->atriprodloteDado = $atriprodloteDado;

        return $this;
    }

    /**
     * Get atriprodloteDado
     *
     * @return string 
     */
    public function getAtriprodloteDado()
    {
        return $this->atriprodloteDado;
    }

    /**
     * Set datainc
     *
     * @param \DateTime $datainc
     * @return Atributoprodutolote
     */
    public function setDatainc($datainc)
    {
        $this->datainc = $datainc;

        return $this;
    }

    /**
     * Get datainc
     *
     * @return \DateTime 
     */
    public function getDatainc()
    {
        return $this->datainc;
    }

    /**
     * Set atriprodCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Atributoproduto $atriprodCodigoid
     * @return Atributoprodutolote
     */
    public function setAtriprodCodigoid(\Servicos\LumaBundle\Entity\Atributoproduto $atriprodCodigoid = null)
    {
        $this->atriprodCodigoid = $atriprodCodigoid;

        return $this;
    }

    /**
     * Get atriprodCodigoid
     *
     * @return \Servicos\LumaBundle\Entity\Atributoproduto 
     */
    public function getAtriprodCodigoid()
    {
        return $this->atriprodCodigoid;
    }

    /**
     * Set loteCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Lote $loteCodigoid
     * @return Atributoprodutolote
     */
    public function setLoteCodigoid(\Servicos\LumaBundle\Entity\Lote $loteCodigoid = null)
    {
        $this->loteCodigoid = $loteCodigoid;

        return $this;
    }

    /**
     * Get loteCodigoid
     *
     * @return \Servicos\LumaBundle\Entity\Lote 
     */
    public function getLoteCodigoid()
    {
        return $this->loteCodigoid;
    }

    /**
     * Set autUsuarios
     *
     * @param \Servicos\GcdbBundle\Entity\AutUsuarios $autUsuarios
     * @return Atributoprodutolote
     */
    public function setAutUsuarios(\Servicos\GcdbBundle\Entity\AutUsuarios $autUsuarios)
    {
        $this->autUsuarios = $autUsuarios;

        return $this;
    }

    /**
     * Get autUsuarios
     *
     * @return \Servicos\GcdbBundle\Entity\AutUsuarios 
     */
    public function getAutUsuarios()
    {
        return $this->autUsuarios;
    }
}
