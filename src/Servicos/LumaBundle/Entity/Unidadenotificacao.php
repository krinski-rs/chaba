<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Unidadenotificacao
 */
class Unidadenotificacao
{
    /**
     * @var integer
     */
    private $unidnotiCodigoid;

    /**
     * @var boolean
     */
    private $unidnotiEnviada;

    /**
     * @var \Servicos\LumaBundle\Entity\Unidaderesponsavel
     */
    private $unidrespCodigoid;

    /**
     * @var \Servicos\LumaBundle\Entity\Movimentacao
     */
    private $moviCodigoid;


    /**
     * Get unidnotiCodigoid
     *
     * @return integer 
     */
    public function getUnidnotiCodigoid()
    {
        return $this->unidnotiCodigoid;
    }

    /**
     * Set unidnotiEnviada
     *
     * @param boolean $unidnotiEnviada
     * @return Unidadenotificacao
     */
    public function setUnidnotiEnviada($unidnotiEnviada)
    {
        $this->unidnotiEnviada = $unidnotiEnviada;

        return $this;
    }

    /**
     * Get unidnotiEnviada
     *
     * @return boolean 
     */
    public function getUnidnotiEnviada()
    {
        return $this->unidnotiEnviada;
    }

    /**
     * Set unidrespCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Unidaderesponsavel $unidrespCodigoid
     * @return Unidadenotificacao
     */
    public function setUnidrespCodigoid(\Servicos\LumaBundle\Entity\Unidaderesponsavel $unidrespCodigoid = null)
    {
        $this->unidrespCodigoid = $unidrespCodigoid;

        return $this;
    }

    /**
     * Get unidrespCodigoid
     *
     * @return \Servicos\LumaBundle\Entity\Unidaderesponsavel 
     */
    public function getUnidrespCodigoid()
    {
        return $this->unidrespCodigoid;
    }

    /**
     * Set moviCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Movimentacao $moviCodigoid
     * @return Unidadenotificacao
     */
    public function setMoviCodigoid(\Servicos\LumaBundle\Entity\Movimentacao $moviCodigoid = null)
    {
        $this->moviCodigoid = $moviCodigoid;

        return $this;
    }

    /**
     * Get moviCodigoid
     *
     * @return \Servicos\LumaBundle\Entity\Movimentacao 
     */
    public function getMoviCodigoid()
    {
        return $this->moviCodigoid;
    }
}
