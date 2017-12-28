<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Documento
 */
class Documento
{
    /**
     * @var integer
     */
    private $docuCodigoid;

    /**
     * @var string
     */
    private $docuNome;

    /**
     * @var \DateTime
     */
    private $docuDatainc;

    /**
     * @var integer
     */
    private $docuUsuainc;

    /**
     * @var \DateTime
     */
    private $docuDatafim;

    /**
     * @var integer
     */
    private $docuUsuafim;

    /**
     * @var string
     */
    private $docuAprovado;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Contrato
     */
    private $contCodigoid;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Tipodocumento
     */
    private $tipodocuCodigoid;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $pagina;

    /**
     * Constructor
     */
    public function __construct()
    {
    	$this->pagina = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get docuCodigoid
     *
     * @return integer 
     */
    public function getDocuCodigoid()
    {
        return $this->docuCodigoid;
    }
    
    /**
     * Set docuNome
     *
     * @param string $docuNome
     * @return Documento
     */
    public function setDocuNome($docuNome)
    {
        $this->docuNome = $docuNome;

        return $this;
    }

    /**
     * Get docuNome
     *
     * @return string 
     */
    public function getDocuNome()
    {
        return $this->docuNome;
    }

    /**
     * Set docuDatainc
     *
     * @param \DateTime $docuDatainc
     * @return Documento
     */
    public function setDocuDatainc($docuDatainc)
    {
        $this->docuDatainc = $docuDatainc;

        return $this;
    }

    /**
     * Get docuDatainc
     *
     * @return \DateTime 
     */
    public function getDocuDatainc()
    {
        return $this->docuDatainc;
    }

    /**
     * Set docuUsuainc
     *
     * @param integer $docuUsuainc
     * @return Documento
     */
    public function setDocuUsuainc($docuUsuainc)
    {
        $this->docuUsuainc = $docuUsuainc;

        return $this;
    }

    /**
     * Get docuUsuainc
     *
     * @return integer 
     */
    public function getDocuUsuainc()
    {
        return $this->docuUsuainc;
    }

    /**
     * Set docuDatafim
     *
     * @param \DateTime $docuDatafim
     * @return Documento
     */
    public function setDocuDatafim($docuDatafim)
    {
        $this->docuDatafim = $docuDatafim;

        return $this;
    }

    /**
     * Get docuDatafim
     *
     * @return \DateTime 
     */
    public function getDocuDatafim()
    {
        return $this->docuDatafim;
    }

    /**
     * Set docuUsuafim
     *
     * @param integer $docuUsuafim
     * @return Documento
     */
    public function setDocuUsuafim($docuUsuafim)
    {
        $this->docuUsuafim = $docuUsuafim;

        return $this;
    }

    /**
     * Get docuUsuafim
     *
     * @return integer 
     */
    public function getDocuUsuafim()
    {
        return $this->docuUsuafim;
    }

    /**
     * Set docuAprovado
     *
     * @param string $docuAprovado
     * @return Documento
     */
    public function setDocuAprovado($docuAprovado)
    {
        $this->docuAprovado = $docuAprovado;

        return $this;
    }

    /**
     * Get docuAprovado
     *
     * @return string 
     */
    public function getDocuAprovado()
    {
        return $this->docuAprovado;
    }

    /**
     * Set contCodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Contrato $contCodigoid
     * @return Documento
     */
    public function setContCodigoid(\Servicos\FinanceiroBundle\Entity\Contrato $contCodigoid = null)
    {
        $this->contCodigoid = $contCodigoid;

        return $this;
    }

    /**
     * Get contCodigoid
     *
     * @return \Servicos\FinanceiroBundle\Entity\Contrato 
     */
    public function getContCodigoid()
    {
        return $this->contCodigoid;
    }

    /**
     * Set tipodocuCodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Tipodocumento $tipodocuCodigoid
     * @return Documento
     */
    public function setTipodocuCodigoid(\Servicos\FinanceiroBundle\Entity\Tipodocumento $tipodocuCodigoid = null)
    {
        $this->tipodocuCodigoid = $tipodocuCodigoid;

        return $this;
    }

    /**
     * Get tipodocuCodigoid
     *
     * @return \Servicos\FinanceiroBundle\Entity\Tipodocumento 
     */
    public function getTipodocuCodigoid()
    {
        return $this->tipodocuCodigoid;
    }

    /**
     * Add pagina
     *
     * @param \Servicos\FinanceiroBundle\Entity\Pagina $pagina
     * @return Contrato
     */
    public function addPagina(\Servicos\FinanceiroBundle\Entity\Pagina $pagina)
    {
    	$this->pagina[] = $pagina;
    
    	return $this;
    }
    
    /**
     * Remove pagina
     *
     * @param \Servicos\FinanceiroBundle\Entity\Rescisao $rescisao
     */
    public function removePagina(\Servicos\FinanceiroBundle\Entity\Pagina $pagina)
    {
    	$this->pagina->removeElement($pagina);
    }
    
    /**
     * Get pagina
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPagina()
    {
    	return $this->pagina;
    }
    
}
