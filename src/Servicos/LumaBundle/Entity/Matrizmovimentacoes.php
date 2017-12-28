<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Matrizmovimentacoes
 */
class Matrizmovimentacoes
{
    /**
     * @var integer
     */
    private $matrmoviCodigoid;

    /**
     * @var boolean
     */
    private $matrmoviInterna;

    /**
     * @var boolean
     */
    private $matrmoviExterna;

    /**
     * @var \Servicos\LumaBundle\Entity\Finalidade
     */
    private $finaCodigoid;

    /**
     * @var \Servicos\LumaBundle\Entity\Tipo
     */
    private $tipoDecodigoid;

    /**
     * @var \Servicos\LumaBundle\Entity\Tipo
     */
    private $tipoParacodigoid;


    /**
     * Get matrmoviCodigoid
     *
     * @return integer 
     */
    public function getMatrmoviCodigoid()
    {
        return $this->matrmoviCodigoid;
    }

    /**
     * Set matrmoviInterna
     *
     * @param boolean $matrmoviInterna
     * @return Matrizmovimentacoes
     */
    public function setMatrmoviInterna($matrmoviInterna)
    {
        $this->matrmoviInterna = $matrmoviInterna;

        return $this;
    }

    /**
     * Get matrmoviInterna
     *
     * @return boolean 
     */
    public function getMatrmoviInterna()
    {
        return $this->matrmoviInterna;
    }

    /**
     * Set matrmoviExterna
     *
     * @param boolean $matrmoviExterna
     * @return Matrizmovimentacoes
     */
    public function setMatrmoviExterna($matrmoviExterna)
    {
        $this->matrmoviExterna = $matrmoviExterna;

        return $this;
    }

    /**
     * Get matrmoviExterna
     *
     * @return boolean 
     */
    public function getMatrmoviExterna()
    {
        return $this->matrmoviExterna;
    }

    /**
     * Set finaCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Finalidade $finaCodigoid
     * @return Matrizmovimentacoes
     */
    public function setFinaCodigoid(\Servicos\LumaBundle\Entity\Finalidade $finaCodigoid = null)
    {
        $this->finaCodigoid = $finaCodigoid;

        return $this;
    }

    /**
     * Get finaCodigoid
     *
     * @return \Servicos\LumaBundle\Entity\Finalidade 
     */
    public function getFinaCodigoid()
    {
        return $this->finaCodigoid;
    }

    /**
     * Set tipoDecodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Tipo $tipoDecodigoid
     * @return Matrizmovimentacoes
     */
    public function setTipoDecodigoid(\Servicos\LumaBundle\Entity\Tipo $tipoDecodigoid = null)
    {
        $this->tipoDecodigoid = $tipoDecodigoid;

        return $this;
    }

    /**
     * Get tipoDecodigoid
     *
     * @return \Servicos\LumaBundle\Entity\Tipo 
     */
    public function getTipoDecodigoid()
    {
        return $this->tipoDecodigoid;
    }

    /**
     * Set tipoParacodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Tipo $tipoParacodigoid
     * @return Matrizmovimentacoes
     */
    public function setTipoParacodigoid(\Servicos\LumaBundle\Entity\Tipo $tipoParacodigoid = null)
    {
        $this->tipoParacodigoid = $tipoParacodigoid;

        return $this;
    }

    /**
     * Get tipoParacodigoid
     *
     * @return \Servicos\LumaBundle\Entity\Tipo 
     */
    public function getTipoParacodigoid()
    {
        return $this->tipoParacodigoid;
    }
}
