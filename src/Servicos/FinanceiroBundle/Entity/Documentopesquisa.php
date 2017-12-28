<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Documentopesquisa
 */
class Documentopesquisa
{
    /**
     * @var integer
     */
    private $docupesqCodigoid;

    /**
     * @var string
     */
    private $docupesqDado;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Documento
     */
    private $docuCodigoid;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Pesquisa
     */
    private $pesqCodigoid;


    /**
     * Get docupesqCodigoid
     *
     * @return integer 
     */
    public function getDocupesqCodigoid()
    {
        return $this->docupesqCodigoid;
    }

    /**
     * Set docupesqDado
     *
     * @param string $docupesqDado
     * @return Documentopesquisa
     */
    public function setDocupesqDado($docupesqDado)
    {
        $this->docupesqDado = $docupesqDado;

        return $this;
    }

    /**
     * Get docupesqDado
     *
     * @return string 
     */
    public function getDocupesqDado()
    {
        return $this->docupesqDado;
    }

    /**
     * Set docuCodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Documento $docuCodigoid
     * @return Documentopesquisa
     */
    public function setDocuCodigoid(\Servicos\FinanceiroBundle\Entity\Documento $docuCodigoid = null)
    {
        $this->docuCodigoid = $docuCodigoid;

        return $this;
    }

    /**
     * Get docuCodigoid
     *
     * @return \Servicos\FinanceiroBundle\Entity\Documento 
     */
    public function getDocuCodigoid()
    {
        return $this->docuCodigoid;
    }

    /**
     * Set pesqCodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Pesquisa $pesqCodigoid
     * @return Documentopesquisa
     */
    public function setPesqCodigoid(\Servicos\FinanceiroBundle\Entity\Pesquisa $pesqCodigoid = null)
    {
        $this->pesqCodigoid = $pesqCodigoid;

        return $this;
    }

    /**
     * Get pesqCodigoid
     *
     * @return \Servicos\FinanceiroBundle\Entity\Pesquisa 
     */
    public function getPesqCodigoid()
    {
        return $this->pesqCodigoid;
    }
}
