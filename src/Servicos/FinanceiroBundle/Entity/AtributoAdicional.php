<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AtributoAdicional
 */
class AtributoAdicional
{
    /**
     * @var integer
     */
    private $idAtributoAdiconal;

    /**
     * @var string
     */
    private $valor;

    /**
     * @var string
     */
    private $infoInterna;

    /**
     * @var string
     */
    private $infoExterna;

    /**
     * @var \DateTime
     */
    private $dataInc;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Enderecoentregaatributovalor
     */
    private $endeentratrivaloCodigoid;


    /**
     * Get idAtributoAdiconal
     *
     * @return integer 
     */
    public function getIdAtributoAdiconal()
    {
        return $this->idAtributoAdiconal;
    }

    /**
     * Set valor
     *
     * @param string $valor
     * @return AtributoAdicional
     */
    public function setValor($valor)
    {
        $this->valor = $valor;

        return $this;
    }

    /**
     * Get valor
     *
     * @return string 
     */
    public function getValor()
    {
        return $this->valor;
    }

    /**
     * Set infoInterna
     *
     * @param string $infoInterna
     * @return AtributoAdicional
     */
    public function setInfoInterna($infoInterna)
    {
        $this->infoInterna = $infoInterna;

        return $this;
    }

    /**
     * Get infoInterna
     *
     * @return string 
     */
    public function getInfoInterna()
    {
        return $this->infoInterna;
    }

    /**
     * Set infoExterna
     *
     * @param string $infoExterna
     * @return AtributoAdicional
     */
    public function setInfoExterna($infoExterna)
    {
        $this->infoExterna = $infoExterna;

        return $this;
    }

    /**
     * Get infoExterna
     *
     * @return string 
     */
    public function getInfoExterna()
    {
        return $this->infoExterna;
    }

    /**
     * Set dataInc
     *
     * @param \DateTime $dataInc
     * @return AtributoAdicional
     */
    public function setDataInc($dataInc)
    {
        $this->dataInc = $dataInc;

        return $this;
    }

    /**
     * Get dataInc
     *
     * @return \DateTime 
     */
    public function getDataInc()
    {
        return $this->dataInc;
    }

    /**
     * Set endeentratrivaloCodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Enderecoentregaatributovalor $endeentratrivaloCodigoid
     * @return AtributoAdicional
     */
    public function setEndeentratrivaloCodigoid(\Servicos\FinanceiroBundle\Entity\Enderecoentregaatributovalor $endeentratrivaloCodigoid = null)
    {
        $this->endeentratrivaloCodigoid = $endeentratrivaloCodigoid;

        return $this;
    }

    /**
     * Get endeentratrivaloCodigoid
     *
     * @return \Servicos\FinanceiroBundle\Entity\Enderecoentregaatributovalor 
     */
    public function getEndeentratrivaloCodigoid()
    {
        return $this->endeentratrivaloCodigoid;
    }
}
