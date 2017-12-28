<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RegionalGrupoMeta
 */
class RegionalGrupoMeta
{
    /**
     * @var integer
     */
    private $grupCodigoid;

    /**
     * @var integer
     */
    private $mes;

    /**
     * @var integer
     */
    private $ano;

    /**
     * @var integer
     */
    private $tme;

    /**
     * @var string
     */
    private $projecao;


    /**
     * Set grupCodigoid
     *
     * @param integer $grupCodigoid
     * @return RegionalGrupoMeta
     */
    public function setGrupCodigoid($grupCodigoid)
    {
        $this->grupCodigoid = $grupCodigoid;

        return $this;
    }

    /**
     * Get grupCodigoid
     *
     * @return integer 
     */
    public function getGrupCodigoid()
    {
        return $this->grupCodigoid;
    }

    /**
     * Set mes
     *
     * @param integer $mes
     * @return RegionalGrupoMeta
     */
    public function setMes($mes)
    {
        $this->mes = $mes;

        return $this;
    }

    /**
     * Get mes
     *
     * @return integer 
     */
    public function getMes()
    {
        return $this->mes;
    }

    /**
     * Set ano
     *
     * @param integer $ano
     * @return RegionalGrupoMeta
     */
    public function setAno($ano)
    {
        $this->ano = $ano;

        return $this;
    }

    /**
     * Get ano
     *
     * @return integer 
     */
    public function getAno()
    {
        return $this->ano;
    }

    /**
     * Set tme
     *
     * @param integer $tme
     * @return RegionalGrupoMeta
     */
    public function setTme($tme)
    {
        $this->tme = $tme;

        return $this;
    }

    /**
     * Get tme
     *
     * @return integer 
     */
    public function getTme()
    {
        return $this->tme;
    }

    /**
     * Set projecao
     *
     * @param string $projecao
     * @return RegionalGrupoMeta
     */
    public function setProjecao($projecao)
    {
        $this->projecao = $projecao;

        return $this;
    }

    /**
     * Get projecao
     *
     * @return string 
     */
    public function getProjecao()
    {
        return $this->projecao;
    }
}
