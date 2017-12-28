<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Matriznota
 */
class Matriznota
{
    /**
     * @var integer
     */
    private $matrnotaCodigoid;

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
     * Get matrnotaCodigoid
     *
     * @return integer 
     */
    public function getMatrnotaCodigoid()
    {
        return $this->matrnotaCodigoid;
    }

    /**
     * Set finaCodigoid
     *
     * @param \Servicos\LumaBundle\Entity\Finalidade $finaCodigoid
     * @return Matriznota
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
     * @return Matriznota
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
     * @return Matriznota
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
