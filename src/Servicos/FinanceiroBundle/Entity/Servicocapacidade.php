<?php

namespace Servicos\FinanceiroBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Servicocapacidade
 */
class Servicocapacidade
{
    /**
     * @var integer
     */
    private $servcapaCodigoid;

    /**
     * @var \DateTime
     */
    private $servicapaDatainc;

    /**
     * @var boolean
     */
    private $servcapaVisibilidade;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Capacidade
     */
    private $capaCodigoid;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Medida
     */
    private $mediCodigoid;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Scriptmedicao
     */
    private $scrimediCodigoid;

    /**
     * @var \Servicos\FinanceiroBundle\Entity\Servico
     */
    private $servCodigoid;


    /**
     * Get servcapaCodigoid
     *
     * @return integer 
     */
    public function getServcapaCodigoid()
    {
        return $this->servcapaCodigoid;
    }

    /**
     * Set servicapaDatainc
     *
     * @param \DateTime $servicapaDatainc
     * @return Servicocapacidade
     */
    public function setServicapaDatainc($servicapaDatainc)
    {
        $this->servicapaDatainc = $servicapaDatainc;

        return $this;
    }

    /**
     * Get servicapaDatainc
     *
     * @return \DateTime 
     */
    public function getServicapaDatainc()
    {
        return $this->servicapaDatainc;
    }

    /**
     * Set servcapaVisibilidade
     *
     * @param boolean $servcapaVisibilidade
     * @return Servicocapacidade
     */
    public function setServcapaVisibilidade($servcapaVisibilidade)
    {
        $this->servcapaVisibilidade = $servcapaVisibilidade;

        return $this;
    }

    /**
     * Get servcapaVisibilidade
     *
     * @return boolean 
     */
    public function getServcapaVisibilidade()
    {
        return $this->servcapaVisibilidade;
    }

    /**
     * Set capaCodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Capacidade $capaCodigoid
     * @return Servicocapacidade
     */
    public function setCapaCodigoid(\Servicos\FinanceiroBundle\Entity\Capacidade $capaCodigoid = null)
    {
        $this->capaCodigoid = $capaCodigoid;

        return $this;
    }

    /**
     * Get capaCodigoid
     *
     * @return \Servicos\FinanceiroBundle\Entity\Capacidade 
     */
    public function getCapaCodigoid()
    {
        return $this->capaCodigoid;
    }

    /**
     * Set mediCodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Medida $mediCodigoid
     * @return Servicocapacidade
     */
    public function setMediCodigoid(\Servicos\FinanceiroBundle\Entity\Medida $mediCodigoid = null)
    {
        $this->mediCodigoid = $mediCodigoid;

        return $this;
    }

    /**
     * Get mediCodigoid
     *
     * @return \Servicos\FinanceiroBundle\Entity\Medida 
     */
    public function getMediCodigoid()
    {
        return $this->mediCodigoid;
    }

    /**
     * Set scrimediCodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Scriptmedicao $scrimediCodigoid
     * @return Servicocapacidade
     */
    public function setScrimediCodigoid(\Servicos\FinanceiroBundle\Entity\Scriptmedicao $scrimediCodigoid = null)
    {
        $this->scrimediCodigoid = $scrimediCodigoid;

        return $this;
    }

    /**
     * Get scrimediCodigoid
     *
     * @return \Servicos\FinanceiroBundle\Entity\Scriptmedicao 
     */
    public function getScrimediCodigoid()
    {
        return $this->scrimediCodigoid;
    }

    /**
     * Set servCodigoid
     *
     * @param \Servicos\FinanceiroBundle\Entity\Servico $servCodigoid
     * @return Servicocapacidade
     */
    public function setServCodigoid(\Servicos\FinanceiroBundle\Entity\Servico $servCodigoid = null)
    {
        $this->servCodigoid = $servCodigoid;

        return $this;
    }

    /**
     * Get servCodigoid
     *
     * @return \Servicos\FinanceiroBundle\Entity\Servico 
     */
    public function getServCodigoid()
    {
        return $this->servCodigoid;
    }
}
