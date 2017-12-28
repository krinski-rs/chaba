<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Alcadacompras
 */
class Alcadacompras
{
    /**
     * @var integer
     */
    private $alcaCodigoid;

    /**
     * @var string
     */
    private $alcaValormaximo;

    /**
     * @var string
     */
    private $alcaValormaximolimite;

    /**
     * @var \Servicos\LumaBundle\Entity\Unidade
     */
    private $unidCodigoid;


    /**
     * Get alcaCodigoid
     *
     * @return integer 
     */
    public function getAlcaCodigoid()
    {
        return $this->alcaCodigoid;
    }

    /**
     * Set alcaValormaximo
     *
     * @param string $alcaValormaximo
     * @return Alcadacompras
     */
    public function setAlcaValormaximo($alcaValormaximo)
    {
        $this->alcaValormaximo = $alcaValormaximo;

        return $this;
    }

    /**
     * Get alcaValormaximo
     *
     * @return string 
     */
    public function getAlcaValormaximo()
    {
        return $this->alcaValormaximo;
    }

    /**
     * Set alcaValormaximolimite
     *
     * @param string $alcaValormaximolimite
     * @return Alcadacompras
     */
    public function setAlcaValormaximolimite($alcaValormaximolimite)
    {
        $this->alcaValormaximolimite = $alcaValormaximolimite;

        return $this;
    }

    /**
     * Get alcaValormaximolimite
     *
     * @return string 
     */
    public function getAlcaValormaximolimite()
    {
        return $this->alcaValormaximolimite;
    }

    /**
     * Set unidCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Unidade $unidCodigoid
     * @return Alcadacompras
     */
    public function setUnidCodigoid(\Servicos\LumaBundle\Entity\Unidade $unidCodigoid = null)
    {
        $this->unidCodigoid = $unidCodigoid;

        return $this;
    }

    /**
     * Get unidCodigoid
     *
     * @return \Servicos\LumaBundle\Entity\Unidade 
     */
    public function getUnidCodigoid()
    {
        return $this->unidCodigoid;
    }
}
