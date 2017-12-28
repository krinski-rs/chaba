<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GenTemplate
 */
class GenTemplate
{
    /**
     * @var integer
     */
    private $tmpId;

    /**
     * @var string
     */
    private $tmpNome;

    /**
     * @var boolean
     */
    private $tmpStatus;

    /**
     * @var integer
     */
    private $tmpPermissao;

    /**
     * @var string
     */
    private $modulo;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $tmpTag;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tmpTag = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get tmpId
     *
     * @return integer 
     */
    public function getTmpId()
    {
        return $this->tmpId;
    }

    /**
     * Set tmpNome
     *
     * @param string $tmpNome
     * @return GenTemplate
     */
    public function setTmpNome($tmpNome)
    {
        $this->tmpNome = $tmpNome;

        return $this;
    }

    /**
     * Get tmpNome
     *
     * @return string 
     */
    public function getTmpNome()
    {
        return $this->tmpNome;
    }

    /**
     * Set tmpStatus
     *
     * @param boolean $tmpStatus
     * @return GenTemplate
     */
    public function setTmpStatus($tmpStatus)
    {
        $this->tmpStatus = $tmpStatus;

        return $this;
    }

    /**
     * Get tmpStatus
     *
     * @return boolean 
     */
    public function getTmpStatus()
    {
        return $this->tmpStatus;
    }

    /**
     * Set tmpPermissao
     *
     * @param integer $tmpPermissao
     * @return GenTemplate
     */
    public function setTmpPermissao($tmpPermissao)
    {
        $this->tmpPermissao = $tmpPermissao;

        return $this;
    }

    /**
     * Get tmpPermissao
     *
     * @return integer 
     */
    public function getTmpPermissao()
    {
        return $this->tmpPermissao;
    }

    /**
     * Set modulo
     *
     * @param string $modulo
     * @return GenTemplate
     */
    public function setModulo($modulo)
    {
        $this->modulo = $modulo;

        return $this;
    }

    /**
     * Get modulo
     *
     * @return string 
     */
    public function getModulo()
    {
        return $this->modulo;
    }

    /**
     * Add tmpTag
     *
     * @param \Servicos\GcdbBundle\Entity\GenTemplateTag $tmpTag
     * @return GenTemplate
     */
    public function addTmpTag(\Servicos\GcdbBundle\Entity\GenTemplateTag $tmpTag)
    {
        $this->tmpTag[] = $tmpTag;

        return $this;
    }

    /**
     * Remove tmpTag
     *
     * @param \Servicos\GcdbBundle\Entity\GenTemplateTag $tmpTag
     */
    public function removeTmpTag(\Servicos\GcdbBundle\Entity\GenTemplateTag $tmpTag)
    {
        $this->tmpTag->removeElement($tmpTag);
    }

    /**
     * Get tmpTag
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTmpTag()
    {
        return $this->tmpTag;
    }
}
