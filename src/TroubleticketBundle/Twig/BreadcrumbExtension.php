<?php

namespace TroubleticketBundle\Twig;

/**
 * Classe que monta um caminho de pão (breadcrumb) de acordo com a rota
 */
class BreadcrumbExtension extends \Twig_Extension
{
    /**
     * {@inheritDoc}
     */
    public function getFunctions()
    {
        return array(
            new \Twig_SimpleFunction('tt_breadcrumb', array($this, 'breadcrumb')),
        );
    }

    /**
     * Obtem o breadcrumb baseado na rota
     *
     * @param string $route      Nome da rota
     * @param array $routeParams Parâmetros da rota
     * @access public
     * @return array
     */
    public function breadcrumb($route, $routeParams)
    {
        $items = array();

        $data = explode('_', $route);
        if ($data[0] == 'troubleticket') {
            $currentLabel = null;

            switch($data[1]) {
                case 'ba':
                    $items[] = array(
                        'routeName' => 'troubleticket_ba_stack',
                        'routeParams' => array(),
                        'label' => 'BA >'
                    );
                    break;
                case 'bi':
                    $items[] = array(
                        'routeName' => 'troubleticket_bi_stack',
                        'routeParams' => array(),
                        'label' => 'BI >'
                    );
                    break;
                case 'bs':
                    $items[] = array(
                        'routeName' => 'troubleticket_bs_stack',
                        'routeParams' => array(),
                        'label' => 'BS >'
                    );
                    break;
                case 'history':
                    $currentLabel = 'Histórico';
                    break;
            }
            if (count($data) > 2) {
                switch($data[2]) {
                    case 'stack':
                        $currentLabel = 'Fila';
                        break;
                    case 'new':
                        $currentLabel = 'Novo';
                        break;
                    case 'config':
                        $currentLabel = 'Configurações';
                        break;
                    case 'main':
                        $currentLabel = 'Apresentação';
                        break;
                    case 'subcase':
                        $currentLabel = 'Subcaso';
                        break;
                    case 'related':
                        $currentLabel = 'Incidentes';
                        break;
                }
            }
            $items[] = array(
                'url' => '#',
                'label' => $currentLabel
            );
        }

        return $items;
    }

    /**
     * {@inheritDoc}
     */
    public function getName()
    {
        return 'tt_breadcrumb_extension';
    }
}
