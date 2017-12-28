<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GenTemplateHistorico
 */
class GenTemplateHistorico
{
    /**
     * @var integer
     */
    private $tmpHistoricoId;

    /**
     * @var string
     */
    private $tmpHistoricoMensagem;

    /**
     * @var \DateTime
     */
    private $tmpHistoricoDatainc;

    /**
     * @var \Servicos\GcdbBundle\Entity\AutUsuarios
     */
    private $autUsuarios;

    /**
     * @var \Servicos\GcdbBundle\Entity\GenTemplate
     */
    private $tmp;


    /**
     * Get tmpHistoricoId
     *
     * @return integer 
     */
    public function getTmpHistoricoId()
    {
        return $this->tmpHistoricoId;
    }

    /**
     * Set tmpHistoricoMensagem
     *
     * @param string $tmpHistoricoMensagem
     * @return GenTemplateHistorico
     */
    public function setTmpHistoricoMensagem($tmpHistoricoMensagem)
    {
        $this->tmpHistoricoMensagem = $tmpHistoricoMensagem;

        return $this;
    }

    /**
     * Get tmpHistoricoMensagem
     *
     * @return string 
     */
    public function getTmpHistoricoMensagem()
    {
        return $this->tmpHistoricoMensagem;
    }

    /**
     * Set tmpHistoricoDatainc
     *
     * @param \DateTime $tmpHistoricoDatainc
     * @return GenTemplateHistorico
     */
    public function setTmpHistoricoDatainc($tmpHistoricoDatainc)
    {
        $this->tmpHistoricoDatainc = $tmpHistoricoDatainc;

        return $this;
    }

    /**
     * Get tmpHistoricoDatainc
     *
     * @return \DateTime 
     */
    public function getTmpHistoricoDatainc()
    {
        return $this->tmpHistoricoDatainc;
    }

    /**
     * Set autUsuarios
     *
     * @param \Servicos\GcdbBundle\Entity\AutUsuarios $autUsuarios
     * @return GenTemplateHistorico
     */
    public function setAutUsuarios(\Servicos\GcdbBundle\Entity\AutUsuarios $autUsuarios = null)
    {
        $this->autUsuarios = $autUsuarios;

        return $this;
    }

    /**
     * Get autUsuarios
     *
     * @return \Servicos\GcdbBundle\Entity\AutUsuarios 
     */
    public function getAutUsuarios()
    {
        return $this->autUsuarios;
    }

    /**
     * Set tmp
     *
     * @param \Servicos\GcdbBundle\Entity\GenTemplate $tmp
     * @return GenTemplateHistorico
     */
    public function setTmp(\Servicos\GcdbBundle\Entity\GenTemplate $tmp = null)
    {
        $this->tmp = $tmp;

        return $this;
    }

    /**
     * Get tmp
     *
     * @return \Servicos\GcdbBundle\Entity\GenTemplate 
     */
    public function getTmp()
    {
        return $this->tmp;
    }
}
