<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RelServicosRecursos
 */
class RelServicosRecursos
{
    /**
     * @var integer
     */
    private $relservicosrecursosid;

    /**
     * @var integer
     */
    private $servicoid;

    /**
     * @var integer
     */
    private $recursoid;

    /**
     * @var string
     */
    private $conteudo;

    /**
     * @var string
     */
    private $obrigatorio;


    /**
     * Get relservicosrecursosid
     *
     * @return integer 
     */
    public function getRelservicosrecursosid()
    {
        return $this->relservicosrecursosid;
    }

    /**
     * Set servicoid
     *
     * @param integer $servicoid
     * @return RelServicosRecursos
     */
    public function setServicoid($servicoid)
    {
        $this->servicoid = $servicoid;

        return $this;
    }

    /**
     * Get servicoid
     *
     * @return integer 
     */
    public function getServicoid()
    {
        return $this->servicoid;
    }

    /**
     * Set recursoid
     *
     * @param integer $recursoid
     * @return RelServicosRecursos
     */
    public function setRecursoid($recursoid)
    {
        $this->recursoid = $recursoid;

        return $this;
    }

    /**
     * Get recursoid
     *
     * @return integer 
     */
    public function getRecursoid()
    {
        return $this->recursoid;
    }

    /**
     * Set conteudo
     *
     * @param string $conteudo
     * @return RelServicosRecursos
     */
    public function setConteudo($conteudo)
    {
        $this->conteudo = $conteudo;

        return $this;
    }

    /**
     * Get conteudo
     *
     * @return string 
     */
    public function getConteudo()
    {
        return $this->conteudo;
    }

    /**
     * Set obrigatorio
     *
     * @param string $obrigatorio
     * @return RelServicosRecursos
     */
    public function setObrigatorio($obrigatorio)
    {
        $this->obrigatorio = $obrigatorio;

        return $this;
    }

    /**
     * Get obrigatorio
     *
     * @return string 
     */
    public function getObrigatorio()
    {
        return $this->obrigatorio;
    }
}
