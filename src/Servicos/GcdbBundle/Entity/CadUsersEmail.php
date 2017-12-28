<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * CadUsersEmail
 */
class CadUsersEmail
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $email;

    /**
     * @var boolean
     */
    private $mailing;

    /**
     * @var boolean
     */
    private $principal;

    /**
     * @var \Servicos\GcdbBundle\Entity\AdmTipoLigacao
     */
    private $idAdmTipoLigacao;

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
     * Set email
     *
     * @param string $email
     * @return CadUsersEmail
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set mailing
     *
     * @param boolean $mailing
     * @return CadUsersEmail
     */
    public function setMailing($mailing)
    {
        $this->mailing = $mailing;

        return $this;
    }

    /**
     * Get mailing
     *
     * @return boolean 
     */
    public function getMailing()
    {
        return $this->mailing;
    }

    /**
     * Set principal
     *
     * @param boolean $principal
     * @return CadUsersEmail
     */
    public function setPrincipal($principal)
    {
        $this->principal = $principal;

        return $this;
    }

    /**
     * Get principal
     *
     * @return boolean 
     */
    public function getPrincipal()
    {
        return $this->principal;
    }

    /**
     * Set idAdmTipoLigacao
     *
     * @param \Servicos\GcdbBundle\Entity\AdmTipoLigacao $idAdmTipoLigacao
     * @return CadUsersEmail
     */
    public function setIdAdmTipoLigacao(\Sistech\Entity\AdmTipoLigacao $idAdmTipoLigacao = null)
    {
        $this->idAdmTipoLigacao = $idAdmTipoLigacao;
        return $this;
    }

    /**
     * Get idAdmTipoLigacao
     *
     * @return \Servicos\GcdbBundle\Entity\AdmTipoLigacao
     */
    public function getIdAdmTipoLigacao()
    {
        return $this->idAdmTipoLigacao;
    }

    /**
     * Set cadUsers
     *
     * @param \Servicos\GcdbBundle\Entity\CadUsers $cadUsers
     * @return CadUsersEmail
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
