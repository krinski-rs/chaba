<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TempCadUsersEmail
 */
class TempCadUsersEmail
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var integer
     */
    private $cadUsersId;

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
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set cadUsersId
     *
     * @param integer $cadUsersId
     * @return TempCadUsersEmail
     */
    public function setCadUsersId($cadUsersId)
    {
        $this->cadUsersId = $cadUsersId;

        return $this;
    }

    /**
     * Get cadUsersId
     *
     * @return integer 
     */
    public function getCadUsersId()
    {
        return $this->cadUsersId;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return TempCadUsersEmail
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
     * @return TempCadUsersEmail
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
     * @return TempCadUsersEmail
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
}
