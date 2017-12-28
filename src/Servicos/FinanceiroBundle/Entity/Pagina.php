<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Pagina
 */
class Pagina
{
    /**
     * @var integer
     */
    private $pagiCodigoid;

    /**
     * @var integer
     */
    private $pagiPagina;

    /**
     * @var string
     */
    private $pagiNome;

    /**
     * @var string
     */
    private $pagiExtensao;

    /**
     * @var \DateTime
     */
    private $pagiDatainc;

    /**
     * @var string
     */
    private $pagiTexto;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Documento
     */
    private $docuCodigoid;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Pagina
     */
    private $pagiProxima;


    /**
     * Get pagiCodigoid
     *
     * @return integer 
     */
    public function getPagiCodigoid()
    {
        return $this->pagiCodigoid;
    }

    /**
     * Set pagiPagina
     *
     * @param integer $pagiPagina
     * @return Pagina
     */
    public function setPagiPagina($pagiPagina)
    {
        $this->pagiPagina = $pagiPagina;

        return $this;
    }

    /**
     * Get pagiPagina
     *
     * @return integer 
     */
    public function getPagiPagina()
    {
        return $this->pagiPagina;
    }

    /**
     * Set pagiNome
     *
     * @param string $pagiNome
     * @return Pagina
     */
    public function setPagiNome($pagiNome)
    {
        $this->pagiNome = $pagiNome;

        return $this;
    }

    /**
     * Get pagiNome
     *
     * @return string 
     */
    public function getPagiNome()
    {
        return $this->pagiNome;
    }

    /**
     * Set pagiExtensao
     *
     * @param string $pagiExtensao
     * @return Pagina
     */
    public function setPagiExtensao($pagiExtensao)
    {
        $this->pagiExtensao = $pagiExtensao;

        return $this;
    }

    /**
     * Get pagiExtensao
     *
     * @return string 
     */
    public function getPagiExtensao()
    {
        return $this->pagiExtensao;
    }

    /**
     * Set pagiDatainc
     *
     * @param \DateTime $pagiDatainc
     * @return Pagina
     */
    public function setPagiDatainc($pagiDatainc)
    {
        $this->pagiDatainc = $pagiDatainc;

        return $this;
    }

    /**
     * Get pagiDatainc
     *
     * @return \DateTime 
     */
    public function getPagiDatainc()
    {
        return $this->pagiDatainc;
    }

    /**
     * Set pagiTexto
     *
     * @param string $pagiTexto
     * @return Pagina
     */
    public function setPagiTexto($pagiTexto)
    {
        $this->pagiTexto = $pagiTexto;

        return $this;
    }

    /**
     * Get pagiTexto
     *
     * @return string 
     */
    public function getPagiTexto()
    {
        return $this->pagiTexto;
    }

    /**
     * Set docuCodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Documento $docuCodigoid
     * @return Pagina
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
     * Set pagiProxima
     *
     * @param \Servicos\FinanceiroBundle\Entity\Pagina $pagiProxima
     * @return Pagina
     */
    public function setPagiProxima(\Servicos\FinanceiroBundle\Entity\Pagina $pagiProxima = null)
    {
        $this->pagiProxima = $pagiProxima;

        return $this;
    }

    /**
     * Get pagiProxima
     *
     * @return \Servicos\FinanceiroBundle\Entity\Pagina 
     */
    public function getPagiProxima()
    {
        return $this->pagiProxima;
    }
}
