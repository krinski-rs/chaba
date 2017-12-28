<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Scriptmedicao
 */
class Scriptmedicao
{
    /**
     * @var integer
     */
    private $scrimediCodigoid;

    /**
     * @var string
     */
    private $scrimediNome;

    /**
     * @var string
     */
    private $scrimediDescricao;

    /**
     * @var string
     */
    private $scrimediPath;

    /**
     * @var string
     */
    private $scrimediTiporetorno;


    /**
     * Get scrimediCodigoid
     *
     * @return integer 
     */
    public function getScrimediCodigoid()
    {
        return $this->scrimediCodigoid;
    }

    /**
     * Set scrimediNome
     *
     * @param string $scrimediNome
     * @return Scriptmedicao
     */
    public function setScrimediNome($scrimediNome)
    {
        $this->scrimediNome = $scrimediNome;

        return $this;
    }

    /**
     * Get scrimediNome
     *
     * @return string 
     */
    public function getScrimediNome()
    {
        return $this->scrimediNome;
    }

    /**
     * Set scrimediDescricao
     *
     * @param string $scrimediDescricao
     * @return Scriptmedicao
     */
    public function setScrimediDescricao($scrimediDescricao)
    {
        $this->scrimediDescricao = $scrimediDescricao;

        return $this;
    }

    /**
     * Get scrimediDescricao
     *
     * @return string 
     */
    public function getScrimediDescricao()
    {
        return $this->scrimediDescricao;
    }

    /**
     * Set scrimediPath
     *
     * @param string $scrimediPath
     * @return Scriptmedicao
     */
    public function setScrimediPath($scrimediPath)
    {
        $this->scrimediPath = $scrimediPath;

        return $this;
    }

    /**
     * Get scrimediPath
     *
     * @return string 
     */
    public function getScrimediPath()
    {
        return $this->scrimediPath;
    }

    /**
     * Set scrimediTiporetorno
     *
     * @param string $scrimediTiporetorno
     * @return Scriptmedicao
     */
    public function setScrimediTiporetorno($scrimediTiporetorno)
    {
        $this->scrimediTiporetorno = $scrimediTiporetorno;

        return $this;
    }

    /**
     * Get scrimediTiporetorno
     *
     * @return string 
     */
    public function getScrimediTiporetorno()
    {
        return $this->scrimediTiporetorno;
    }
}
