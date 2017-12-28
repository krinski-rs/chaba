<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * RelRecursosAccounts
 */
class RelRecursosAccounts
{
    /**
     * @var integer
     */
    private $relrecursosaccountsid;

    /**
     * @var integer
     */
    private $accountid;

    /**
     * @var integer
     */
    private $recursoid;

    /**
     * @var string
     */
    private $conteudo;


    /**
     * Get relrecursosaccountsid
     *
     * @return integer 
     */
    public function getRelrecursosaccountsid()
    {
        return $this->relrecursosaccountsid;
    }

    /**
     * Set accountid
     *
     * @param integer $accountid
     * @return RelRecursosAccounts
     */
    public function setAccountid($accountid)
    {
        $this->accountid = $accountid;

        return $this;
    }

    /**
     * Get accountid
     *
     * @return integer 
     */
    public function getAccountid()
    {
        return $this->accountid;
    }

    /**
     * Set recursoid
     *
     * @param integer $recursoid
     * @return RelRecursosAccounts
     */
    public function setRecursoid($recursoid)
    {
        $this->recursoid = $recursoid;

        return $this;
    }

    /**
     * Get recursoid
     *
     * @return integer 
     */
    public function getRecursoid()
    {
        return $this->recursoid;
    }

    /**
     * Set conteudo
     *
     * @param string $conteudo
     * @return RelRecursosAccounts
     */
    public function setConteudo($conteudo)
    {
        $this->conteudo = $conteudo;

        return $this;
    }

    /**
     * Get conteudo
     *
     * @return string 
     */
    public function getConteudo()
    {
        return $this->conteudo;
    }
}
