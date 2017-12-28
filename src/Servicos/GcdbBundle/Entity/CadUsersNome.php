<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CadUsersNome
 */
class CadUsersNome
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $nome;

    /**
     * @var \Servicos\GcdbBundle\Entity\CadUsers
     */
    private $cadUsers;

    /**
     * @var \Servicos\GcdbBundle\Entity\AdmTipoNome
     */
    private $admTipoNome;


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
     * Set nome
     *
     * @param string $nome
     * @return CadUsersNome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get nome
     *
     * @return string 
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set cadUsers
     *
     * @param \Servicos\GcdbBundle\Entity\CadUsers $cadUsers
     * @return CadUsersNome
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

    /**
     * Set admTipoNome
     *
     * @param \Servicos\GcdbBundle\Entity\AdmTipoNome $admTipoNome
     * @return CadUsersNome
     */
    public function setAdmTipoNome(\Servicos\GcdbBundle\Entity\AdmTipoNome $admTipoNome = null)
    {
        $this->admTipoNome = $admTipoNome;

        return $this;
    }

    /**
     * Get admTipoNome
     *
     * @return \Servicos\GcdbBundle\Entity\AdmTipoNome 
     */
    public function getAdmTipoNome()
    {
        return $this->admTipoNome;
    }
}
