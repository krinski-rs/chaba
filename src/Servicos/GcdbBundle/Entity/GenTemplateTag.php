<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * GenTemplateTag
 */
class GenTemplateTag
{
    /**
     * @var integer
     */
    private $tmpTagId;

    /**
     * @var string
     */
    private $tmpTagNome;

    /**
     * @var string
     */
    private $tmpTagAlias;

    /**
     * @var string
     */
    private $tmpTagDesc;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $tmp;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->tmp = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get tmpTagId
     *
     * @return integer 
     */
    public function getTmpTagId()
    {
        return $this->tmpTagId;
    }

    /**
     * Set tmpTagNome
     *
     * @param string $tmpTagNome
     * @return GenTemplateTag
     */
    public function setTmpTagNome($tmpTagNome)
    {
        $this->tmpTagNome = $tmpTagNome;

        return $this;
    }

    /**
     * Get tmpTagNome
     *
     * @return string 
     */
    public function getTmpTagNome()
    {
        return $this->tmpTagNome;
    }

    /**
     * Set tmpTagAlias
     *
     * @param string $tmpTagAlias
     * @return GenTemplateTag
     */
    public function setTmpTagAlias($tmpTagAlias)
    {
        $this->tmpTagAlias = $tmpTagAlias;

        return $this;
    }

    /**
     * Get tmpTagAlias
     *
     * @return string 
     */
    public function getTmpTagAlias()
    {
        return $this->tmpTagAlias;
    }

    /**
     * Set tmpTagDesc
     *
     * @param string $tmpTagDesc
     * @return GenTemplateTag
     */
    public function setTmpTagDesc($tmpTagDesc)
    {
        $this->tmpTagDesc = $tmpTagDesc;

        return $this;
    }

    /**
     * Get tmpTagDesc
     *
     * @return string 
     */
    public function getTmpTagDesc()
    {
        return $this->tmpTagDesc;
    }

    /**
     * Add tmp
     *
     * @param \Servicos\GcdbBundle\Entity\GenTemplate $tmp
     * @return GenTemplateTag
     */
    public function addTmp(\Servicos\GcdbBundle\Entity\GenTemplate $tmp)
    {
        $this->tmp[] = $tmp;

        return $this;
    }

    /**
     * Remove tmp
     *
     * @param \Servicos\GcdbBundle\Entity\GenTemplate $tmp
     */
    public function removeTmp(\Servicos\GcdbBundle\Entity\GenTemplate $tmp)
    {
        $this->tmp->removeElement($tmp);
    }

    /**
     * Get tmp
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getTmp()
    {
        return $this->tmp;
    }
}
