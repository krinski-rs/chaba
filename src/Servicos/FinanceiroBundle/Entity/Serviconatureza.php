<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Serviconatureza
 */
class Serviconatureza
{
    /**
     * @var integer
     */
    private $servnatuCodigoid;

    /**
     * @var string
     */
    private $servnatuPercentual;

    /**
     * @var string
     */
    private $servnatuBaseicms;

    /**
     * @var boolean
     */
    private $servnatuCedente;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Dadosbancarios
     */
    private $dadobancCodigoid;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Natureza
     */
    private $natuCodigoid;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Servico
     */
    private $servCodigoid;


    /**
     * Get servnatuCodigoid
     *
     * @return integer 
     */
    public function getServnatuCodigoid()
    {
        return $this->servnatuCodigoid;
    }

    /**
     * Set servnatuPercentual
     *
     * @param string $servnatuPercentual
     * @return Serviconatureza
     */
    public function setServnatuPercentual($servnatuPercentual)
    {
        $this->servnatuPercentual = $servnatuPercentual;

        return $this;
    }

    /**
     * Get servnatuPercentual
     *
     * @return string 
     */
    public function getServnatuPercentual()
    {
        return $this->servnatuPercentual;
    }

    /**
     * Set servnatuBaseicms
     *
     * @param string $servnatuBaseicms
     * @return Serviconatureza
     */
    public function setServnatuBaseicms($servnatuBaseicms)
    {
        $this->servnatuBaseicms = $servnatuBaseicms;

        return $this;
    }

    /**
     * Get servnatuBaseicms
     *
     * @return string 
     */
    public function getServnatuBaseicms()
    {
        return $this->servnatuBaseicms;
    }

    /**
     * Set servnatuCedente
     *
     * @param boolean $servnatuCedente
     * @return Serviconatureza
     */
    public function setServnatuCedente($servnatuCedente)
    {
        $this->servnatuCedente = $servnatuCedente;

        return $this;
    }

    /**
     * Get servnatuCedente
     *
     * @return boolean 
     */
    public function getServnatuCedente()
    {
        return $this->servnatuCedente;
    }

    /**
     * Set dadobancCodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Dadosbancarios $dadobancCodigoid
     * @return Serviconatureza
     */
    public function setDadobancCodigoid(\Servicos\FinanceiroBundle\Entity\Dadosbancarios $dadobancCodigoid = null)
    {
        $this->dadobancCodigoid = $dadobancCodigoid;

        return $this;
    }

    /**
     * Get dadobancCodigoid
     *
     * @return \Servicos\FinanceiroBundle\Entity\Dadosbancarios 
     */
    public function getDadobancCodigoid()
    {
        return $this->dadobancCodigoid;
    }

    /**
     * Set natuCodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Natureza $natuCodigoid
     * @return Serviconatureza
     */
    public function setNatuCodigoid(\Servicos\FinanceiroBundle\Entity\Natureza $natuCodigoid = null)
    {
        $this->natuCodigoid = $natuCodigoid;

        return $this;
    }

    /**
     * Get natuCodigoid
     *
     * @return \Servicos\FinanceiroBundle\Entity\Natureza 
     */
    public function getNatuCodigoid()
    {
        return $this->natuCodigoid;
    }

    /**
     * Set servCodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Servico $servCodigoid
     * @return Serviconatureza
     */
    public function setServCodigoid(\Servicos\FinanceiroBundle\Entity\Servico $servCodigoid = null)
    {
        $this->servCodigoid = $servCodigoid;

        return $this;
    }

    /**
     * Get servCodigoid
     *
     * @return \Servicos\FinanceiroBundle\Entity\Servico 
     */
    public function getServCodigoid()
    {
        return $this->servCodigoid;
    }
}
