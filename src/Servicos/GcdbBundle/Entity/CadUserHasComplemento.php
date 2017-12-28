<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CadUserHasComplemento
 */
class CadUserHasComplemento
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $complemento;

    /**
     * @var \Servicos\GcdbBundle\Entity\AdmTipoComplemento
     */
    private $admTipoComplemento;

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
     * Set complemento
     *
     * @param string $complemento
     * @return CadUserHasComplemento
     */
    public function setComplemento($complemento)
    {
        $this->complemento = $complemento;

        return $this;
    }

    /**
     * Get complemento
     *
     * @return string 
     */
    public function getComplemento()
    {
        return $this->complemento;
    }

    /**
     * Set admTipoComplemento
     *
     * @param \Servicos\GcdbBundle\Entity\AdmTipoComplemento $admTipoComplemento
     * @return CadUserHasComplemento
     */
    public function setAdmTipoComplemento(\Servicos\GcdbBundle\Entity\AdmTipoComplemento $admTipoComplemento = null)
    {
        $this->admTipoComplemento = $admTipoComplemento;

        return $this;
    }

    /**
     * Get admTipoComplemento
     *
     * @return \Servicos\GcdbBundle\Entity\AdmTipoComplemento 
     */
    public function getAdmTipoComplemento()
    {
        return $this->admTipoComplemento;
    }

    /**
     * Set cadUsers
     *
     * @param \Servicos\GcdbBundle\Entity\CadUsers $cadUsers
     * @return CadUserHasComplemento
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
