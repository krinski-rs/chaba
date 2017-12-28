<?php

namespace TroubleticketBundle\Twig;

/**
 * Extensão do Twig para facilitar a renderização de tempo
 */
class TimeExtension extends \Twig_Extension
{
    /**
     * {@inheritDoc}
     */
    public function getFilters()
    {
        return array(
            new \Twig_SimpleFilter('tt_time', array($this, 'timeFilter')),
        );
    }

    /**
     * Realiza a transformação do tempo em segundos para um texto amigável
     *
     * @param int $seconds
     * @access public
     * @return string
     */
    public function timeFilter($seconds)
    {
        if (is_null($seconds)) {
            return "";
        }

        $days = intval($seconds/ (3600 * 24));
        $seconds -= $days * (3600 * 24);
        $hours = intval($seconds / 3600);
        $seconds -= $hours * 3600;
        $min = intval($seconds/60);
        $sec = $seconds % 60;

        return sprintf('%d dias, %d horas, %d min e %s seg', $days, $hours, $min, $sec);
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return 'tt_time_extension';
    }
}
