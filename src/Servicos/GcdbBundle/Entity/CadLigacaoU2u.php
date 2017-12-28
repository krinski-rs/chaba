<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CadLigacaoU2u
 */
class CadLigacaoU2u
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var \DateTime
     */
    private $dtInicio;

    /**
     * @var \DateTime
     */
    private $dtFim;

    /**
     * @var \Servicos\GcdbBundle\Entity\AdmTipoLigacao
     */
    private $admTipoLigacao;

    /**
     * @var \Servicos\GcdbBundle\Entity\CadUsers
     */
    private $cadUsers2;

    /**
     * @var \Servicos\GcdbBundle\Entity\CadUsers
     */
    private $cadUsers;


    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set dtInicio
     *
     * @param \DateTime $dtInicio
     * @return CadLigacaoU2u
     */
    public function setDtInicio($dtInicio)
    {
        $this->dtInicio = $dtInicio;

        return $this;
    }

    /**
     * Get dtInicio
     *
     * @return \DateTime 
     */
    public function getDtInicio()
    {
        return $this->dtInicio;
    }

    /**
     * Set dtFim
     *
     * @param \DateTime $dtFim
     * @return CadLigacaoU2u
     */
    public function setDtFim($dtFim)
    {
        $this->dtFim = $dtFim;

        return $this;
    }

    /**
     * Get dtFim
     *
     * @return \DateTime 
     */
    public function getDtFim()
    {
        return $this->dtFim;
    }

    /**
     * Set admTipoLigacao
     *
     * @param \Servicos\GcdbBundle\Entity\AdmTipoLigacao $admTipoLigacao
     * @return CadLigacaoU2u
     */
    public function setAdmTipoLigacao(\Servicos\GcdbBundle\Entity\AdmTipoLigacao $admTipoLigacao = null)
    {
        $this->admTipoLigacao = $admTipoLigacao;

        return $this;
    }

    /**
     * Get admTipoLigacao
     *
     * @return \Servicos\GcdbBundle\Entity\AdmTipoLigacao 
     */
    public function getAdmTipoLigacao()
    {
        return $this->admTipoLigacao;
    }

    /**
     * Set cadUsers2
     *
     * @param \Servicos\GcdbBundle\Entity\CadUsers $cadUsers2
     * @return CadLigacaoU2u
     */
    public function setCadUsers2(\Servicos\GcdbBundle\Entity\CadUsers $cadUsers2 = null)
    {
        $this->cadUsers2 = $cadUsers2;

        return $this;
    }

    /**
     * Get cadUsers2
     *
     * @return \Servicos\GcdbBundle\Entity\CadUsers 
     */
    public function getCadUsers2()
    {
        return $this->cadUsers2;
    }

    /**
     * Set cadUsers
     *
     * @param \Servicos\GcdbBundle\Entity\CadUsers $cadUsers
     * @return CadLigacaoU2u
     */
    public function setCadUsers(\Servicos\GcdbBundle\Entity\CadUsers $cadUsers = null)
    {
        $this->cadUsers = $cadUsers;

        return $this;
    }

    /**
     * Get cadUsers
     *
     * @return \Servicos\GcdbBundle\Entity\CadUsers 
     */
    public function getCadUsers()
    {
        return $this->cadUsers;
    }
}
