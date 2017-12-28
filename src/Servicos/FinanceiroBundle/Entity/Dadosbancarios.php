<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Dadosbancarios
 */
class Dadosbancarios
{
    /**
     * @var integer
     */
    private $dadobancCodigoid;

    /**
     * @var string
     */
    private $dadobancAgencia;

    /**
     * @var string
     */
    private $dadobancConta;

    /**
     * @var integer
     */
    private $emprCodigoid;

    /**
     * @var string
     */
    private $dadobancCodigocedente;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Banco
     */
    private $bancCodigoid;


    /**
     * Get dadobancCodigoid
     *
     * @return integer 
     */
    public function getDadobancCodigoid()
    {
        return $this->dadobancCodigoid;
    }

    /**
     * Set dadobancAgencia
     *
     * @param string $dadobancAgencia
     * @return Dadosbancarios
     */
    public function setDadobancAgencia($dadobancAgencia)
    {
        $this->dadobancAgencia = $dadobancAgencia;

        return $this;
    }

    /**
     * Get dadobancAgencia
     *
     * @return string 
     */
    public function getDadobancAgencia()
    {
        return $this->dadobancAgencia;
    }

    /**
     * Set dadobancConta
     *
     * @param string $dadobancConta
     * @return Dadosbancarios
     */
    public function setDadobancConta($dadobancConta)
    {
        $this->dadobancConta = $dadobancConta;

        return $this;
    }

    /**
     * Get dadobancConta
     *
     * @return string 
     */
    public function getDadobancConta()
    {
        return $this->dadobancConta;
    }

    /**
     * Set emprCodigoid
     *
     * @param integer $emprCodigoid
     * @return Dadosbancarios
     */
    public function setEmprCodigoid($emprCodigoid)
    {
        $this->emprCodigoid = $emprCodigoid;

        return $this;
    }

    /**
     * Get emprCodigoid
     *
     * @return integer 
     */
    public function getEmprCodigoid()
    {
        return $this->emprCodigoid;
    }

    /**
     * Set dadobancCodigocedente
     *
     * @param string $dadobancCodigocedente
     * @return Dadosbancarios
     */
    public function setDadobancCodigocedente($dadobancCodigocedente)
    {
        $this->dadobancCodigocedente = $dadobancCodigocedente;

        return $this;
    }

    /**
     * Get dadobancCodigocedente
     *
     * @return string 
     */
    public function getDadobancCodigocedente()
    {
        return $this->dadobancCodigocedente;
    }

    /**
     * Set bancCodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Banco $bancCodigoid
     * @return Dadosbancarios
     */
    public function setBancCodigoid(\Servicos\FinanceiroBundle\Entity\Banco $bancCodigoid = null)
    {
        $this->bancCodigoid = $bancCodigoid;

        return $this;
    }

    /**
     * Get bancCodigoid
     *
     * @return \Servicos\FinanceiroBundle\Entity\Banco 
     */
    public function getBancCodigoid()
    {
        return $this->bancCodigoid;
    }
}
