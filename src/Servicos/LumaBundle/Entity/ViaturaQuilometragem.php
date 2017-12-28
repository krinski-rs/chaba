<?php

namespace Servicos\LumaBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * ViaturaQuilometragem
 */
class ViaturaQuilometragem
{
    /**
     * @var integer
     */
    private $viatQuilometragemid;

    /**
     * @var integer
     */
    private $quilomeTipoLeitura;

    /**
     * @var integer
     */
    private $quilomeCadUsuarioid;

    /**
     * @var string
     */
    private $quilometragem;

    /**
     * @var \DateTime
     */
    private $quilomeDatainc;

    /**
     * @var \Servicos\LumaBundle\Entity\Viatura
     */
    private $viaturaid;


    /**
     * Get viatQuilometragemid
     *
     * @return integer 
     */
    public function getViatQuilometragemid()
    {
        return $this->viatQuilometragemid;
    }

    /**
     * Set quilomeTipoLeitura
     *
     * @param integer $quilomeTipoLeitura
     * @return ViaturaQuilometragem
     */
    public function setQuilomeTipoLeitura($quilomeTipoLeitura)
    {
        $this->quilomeTipoLeitura = $quilomeTipoLeitura;

        return $this;
    }

    /**
     * Get quilomeTipoLeitura
     *
     * @return integer 
     */
    public function getQuilomeTipoLeitura()
    {
        return $this->quilomeTipoLeitura;
    }

    /**
     * Set quilomeCadUsuarioid
     *
     * @param integer $quilomeCadUsuarioid
     * @return ViaturaQuilometragem
     */
    public function setQuilomeCadUsuarioid($quilomeCadUsuarioid)
    {
        $this->quilomeCadUsuarioid = $quilomeCadUsuarioid;

        return $this;
    }

    /**
     * Get quilomeCadUsuarioid
     *
     * @return integer 
     */
    public function getQuilomeCadUsuarioid()
    {
        return $this->quilomeCadUsuarioid;
    }

    /**
     * Set quilometragem
     *
     * @param string $quilometragem
     * @return ViaturaQuilometragem
     */
    public function setQuilometragem($quilometragem)
    {
        $this->quilometragem = $quilometragem;

        return $this;
    }

    /**
     * Get quilometragem
     *
     * @return string 
     */
    public function getQuilometragem()
    {
        return $this->quilometragem;
    }

    /**
     * Set quilomeDatainc
     *
     * @param \DateTime $quilomeDatainc
     * @return ViaturaQuilometragem
     */
    public function setQuilomeDatainc($quilomeDatainc)
    {
        $this->quilomeDatainc = $quilomeDatainc;

        return $this;
    }

    /**
     * Get quilomeDatainc
     *
     * @return \DateTime 
     */
    public function getQuilomeDatainc()
    {
        return $this->quilomeDatainc;
    }

    /**
     * Set viaturaid
     *
     * @param \Servicos\LumaBundle\Entity\Viatura $viaturaid
     * @return ViaturaQuilometragem
     */
    public function setViaturaid(\Servicos\LumaBundle\Entity\Viatura $viaturaid = null)
    {
        $this->viaturaid = $viaturaid;

        return $this;
    }

    /**
     * Get viaturaid
     *
     * @return \Servicos\LumaBundle\Entity\Viatura 
     */
    public function getViaturaid()
    {
        return $this->viaturaid;
    }
}
