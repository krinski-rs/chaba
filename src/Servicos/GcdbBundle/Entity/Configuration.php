<?php

namespace Servicos\GcdbBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Configuration
 */
class Configuration
{
    /**
     * @var string
     */
    private $version;

    /**
     * @var string
     */
    private $billahead;

    /**
     * @var string
     */
    private $language;


    /**
     * Get version
     *
     * @return string 
     */
    public function getVersion()
    {
        return $this->version;
    }

    /**
     * Set billahead
     *
     * @param string $billahead
     * @return Configuration
     */
    public function setBillahead($billahead)
    {
        $this->billahead = $billahead;

        return $this;
    }

    /**
     * Get billahead
     *
     * @return string 
     */
    public function getBillahead()
    {
        return $this->billahead;
    }

    /**
     * Set language
     *
     * @param string $language
     * @return Configuration
     */
    public function setLanguage($language)
    {
        $this->language = $language;

        return $this;
    }

    /**
     * Get language
     *
     * @return string 
     */
    public function getLanguage()
    {
        return $this->language;
    }
}
