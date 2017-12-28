<?php

use Symfony\Component\Routing\Exception\MethodNotAllowedException;
use Symfony\Component\Routing\Exception\ResourceNotFoundException;
use Symfony\Component\Routing\RequestContext;

/**
 * appDevUrlMatcher.
 *
 * This class has been auto-generated
 * by the Symfony Routing Component.
 */
class appDevUrlMatcher extends Symfony\Bundle\FrameworkBundle\Routing\RedirectableUrlMatcher
{
    /**
     * Constructor.
     */
    public function __construct(RequestContext $context)
    {
        $this->context = $context;
    }

    public function match($pathinfo)
    {
        $allow = array();
        $pathinfo = rawurldecode($pathinfo);

        if (0 === strpos($pathinfo, '/_')) {
            // _wdt
            if (0 === strpos($pathinfo, '/_wdt') && preg_match('#^/_wdt/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => '_wdt')), array (  '_controller' => 'web_profiler.controller.profiler:toolbarAction',));
            }

            if (0 === strpos($pathinfo, '/_profiler')) {
                // _profiler_home
                if (rtrim($pathinfo, '/') === '/_profiler') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_profiler_home');
                    }

                    return array (  '_controller' => 'web_profiler.controller.profiler:homeAction',  '_route' => '_profiler_home',);
                }

                if (0 === strpos($pathinfo, '/_profiler/search')) {
                    // _profiler_search
                    if ($pathinfo === '/_profiler/search') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchAction',  '_route' => '_profiler_search',);
                    }

                    // _profiler_search_bar
                    if ($pathinfo === '/_profiler/search_bar') {
                        return array (  '_controller' => 'web_profiler.controller.profiler:searchBarAction',  '_route' => '_profiler_search_bar',);
                    }

                }

                // _profiler_purge
                if ($pathinfo === '/_profiler/purge') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:purgeAction',  '_route' => '_profiler_purge',);
                }

                // _profiler_info
                if (0 === strpos($pathinfo, '/_profiler/info') && preg_match('#^/_profiler/info/(?P<about>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_info')), array (  '_controller' => 'web_profiler.controller.profiler:infoAction',));
                }

                // _profiler_phpinfo
                if ($pathinfo === '/_profiler/phpinfo') {
                    return array (  '_controller' => 'web_profiler.controller.profiler:phpinfoAction',  '_route' => '_profiler_phpinfo',);
                }

                // _profiler_search_results
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/search/results$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_search_results')), array (  '_controller' => 'web_profiler.controller.profiler:searchResultsAction',));
                }

                // _profiler
                if (preg_match('#^/_profiler/(?P<token>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler')), array (  '_controller' => 'web_profiler.controller.profiler:panelAction',));
                }

                // _profiler_router
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/router$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_router')), array (  '_controller' => 'web_profiler.controller.router:panelAction',));
                }

                // _profiler_exception
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception')), array (  '_controller' => 'web_profiler.controller.exception:showAction',));
                }

                // _profiler_exception_css
                if (preg_match('#^/_profiler/(?P<token>[^/]++)/exception\\.css$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_profiler_exception_css')), array (  '_controller' => 'web_profiler.controller.exception:cssAction',));
                }

            }

            if (0 === strpos($pathinfo, '/_configurator')) {
                // _configurator_home
                if (rtrim($pathinfo, '/') === '/_configurator') {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', '_configurator_home');
                    }

                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::checkAction',  '_route' => '_configurator_home',);
                }

                // _configurator_step
                if (0 === strpos($pathinfo, '/_configurator/step') && preg_match('#^/_configurator/step/(?P<index>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => '_configurator_step')), array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::stepAction',));
                }

                // _configurator_final
                if ($pathinfo === '/_configurator/final') {
                    return array (  '_controller' => 'Sensio\\Bundle\\DistributionBundle\\Controller\\ConfiguratorController::finalAction',  '_route' => '_configurator_final',);
                }

            }

        }

        // troubleticket_ba_home
        if (rtrim($pathinfo, '/') === '') {
            if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                goto not_troubleticket_ba_home;
            }

            if (substr($pathinfo, -1) !== '/') {
                return $this->redirect($pathinfo.'/', 'troubleticket_ba_home');
            }

            return array (  '_controller' => 'TroubleticketBundle\\Controller\\BAController::stackAction',  '_route' => 'troubleticket_ba_home',);
        }
        not_troubleticket_ba_home:

        if (0 === strpos($pathinfo, '/b')) {
            if (0 === strpos($pathinfo, '/ba')) {
                // troubleticket_ba_new
                if ($pathinfo === '/ba/novo') {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_troubleticket_ba_new;
                    }

                    return array (  '_controller' => 'TroubleticketBundle\\Controller\\BAController::newAction',  '_route' => 'troubleticket_ba_new',);
                }
                not_troubleticket_ba_new:

                if (0 === strpos($pathinfo, '/ba/criar')) {
                    // troubleticket_ba_create_preview
                    if ($pathinfo === '/ba/criar') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_troubleticket_ba_create_preview;
                        }

                        return array (  '_controller' => 'TroubleticketBundle\\Controller\\BAController::createPreviewAction',  '_route' => 'troubleticket_ba_create_preview',);
                    }
                    not_troubleticket_ba_create_preview:

                    // troubleticket_ba_create
                    if (preg_match('#^/ba/criar/(?P<report_id>[^/]++)$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                            goto not_troubleticket_ba_create;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'troubleticket_ba_create')), array (  '_controller' => 'TroubleticketBundle\\Controller\\BAController::createAction',));
                    }
                    not_troubleticket_ba_create:

                    // troubleticket_ba_create_post
                    if (preg_match('#^/ba/criar/(?P<report_id>[^/]++)$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_troubleticket_ba_create_post;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'troubleticket_ba_create_post')), array (  '_controller' => 'TroubleticketBundle\\Controller\\BAController::createPostAction',));
                    }
                    not_troubleticket_ba_create_post:

                }

                // troubleticket_ba_main
                if (0 === strpos($pathinfo, '/ba/editar') && preg_match('#^/ba/editar/(?P<report_id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_troubleticket_ba_main;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'troubleticket_ba_main')), array (  '_controller' => 'TroubleticketBundle\\Controller\\BAController::mainAction',));
                }
                not_troubleticket_ba_main:

                // troubleticket_ba_symptom_update
                if (0 === strpos($pathinfo, '/ba/atualizasintoma') && preg_match('#^/ba/atualizasintoma/(?P<report_id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_troubleticket_ba_symptom_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'troubleticket_ba_symptom_update')), array (  '_controller' => 'TroubleticketBundle\\Controller\\BAController::symptomUpdateAction',));
                }
                not_troubleticket_ba_symptom_update:

                // troubleticket_ba_main_update
                if (0 === strpos($pathinfo, '/ba/editar') && preg_match('#^/ba/editar/(?P<report_id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_troubleticket_ba_main_update;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'troubleticket_ba_main_update')), array (  '_controller' => 'TroubleticketBundle\\Controller\\BAController::mainUpdateAction',));
                }
                not_troubleticket_ba_main_update:

                // troubleticket_ba_main_pause
                if (0 === strpos($pathinfo, '/ba/pause') && preg_match('#^/ba/pause/(?P<report_id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_troubleticket_ba_main_pause;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'troubleticket_ba_main_pause')), array (  '_controller' => 'TroubleticketBundle\\Controller\\BAController::mainPauseAction',));
                }
                not_troubleticket_ba_main_pause:

                if (0 === strpos($pathinfo, '/ba/re')) {
                    // troubleticket_ba_main_restart
                    if (0 === strpos($pathinfo, '/ba/reiniciar') && preg_match('#^/ba/reiniciar/(?P<report_id>[^/]++)$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_troubleticket_ba_main_restart;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'troubleticket_ba_main_restart')), array (  '_controller' => 'TroubleticketBundle\\Controller\\BAController::mainRestartAction',));
                    }
                    not_troubleticket_ba_main_restart:

                    // troubleticket_ba_main_solve
                    if (0 === strpos($pathinfo, '/ba/resolver') && preg_match('#^/ba/resolver/(?P<report_id>[^/]++)$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_troubleticket_ba_main_solve;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'troubleticket_ba_main_solve')), array (  '_controller' => 'TroubleticketBundle\\Controller\\BAController::mainSolveAction',));
                    }
                    not_troubleticket_ba_main_solve:

                }

                // troubleticket_ba_main_unsolved
                if (0 === strpos($pathinfo, '/ba/nao-resolvido') && preg_match('#^/ba/nao\\-resolvido/(?P<report_id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_troubleticket_ba_main_unsolved;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'troubleticket_ba_main_unsolved')), array (  '_controller' => 'TroubleticketBundle\\Controller\\BAController::mainUnsolvedAction',));
                }
                not_troubleticket_ba_main_unsolved:

                // troubleticket_ba_main_close
                if (0 === strpos($pathinfo, '/ba/fechar') && preg_match('#^/ba/fechar/(?P<report_id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_troubleticket_ba_main_close;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'troubleticket_ba_main_close')), array (  '_controller' => 'TroubleticketBundle\\Controller\\BAController::mainCloseAction',));
                }
                not_troubleticket_ba_main_close:

                // troubleticket_ba_main_cancel
                if (0 === strpos($pathinfo, '/ba/cancelar') && preg_match('#^/ba/cancelar/(?P<report_id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_troubleticket_ba_main_cancel;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'troubleticket_ba_main_cancel')), array (  '_controller' => 'TroubleticketBundle\\Controller\\BAController::mainCancelAction',));
                }
                not_troubleticket_ba_main_cancel:

                // troubleticket_ba_stack
                if ($pathinfo === '/ba/fila') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_troubleticket_ba_stack;
                    }

                    return array (  '_controller' => 'TroubleticketBundle\\Controller\\BAController::stackAction',  '_route' => 'troubleticket_ba_stack',);
                }
                not_troubleticket_ba_stack:

                // troubleticket_ba_counters
                if ($pathinfo === '/ba/contadores') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_troubleticket_ba_counters;
                    }

                    return array (  '_controller' => 'TroubleticketBundle\\Controller\\BAController::countersAction',  '_route' => 'troubleticket_ba_counters',);
                }
                not_troubleticket_ba_counters:

                // troubleticket_ba_stack_request
                if ($pathinfo === '/ba/stack-request') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_troubleticket_ba_stack_request;
                    }

                    return array (  '_controller' => 'TroubleticketBundle\\Controller\\BAController::stackRequestAction',  '_route' => 'troubleticket_ba_stack_request',);
                }
                not_troubleticket_ba_stack_request:

                if (0 === strpos($pathinfo, '/ba/enviar-para-sn')) {
                    // troubleticket_ba_send_to_sn2
                    if (0 === strpos($pathinfo, '/ba/enviar-para-sn2') && preg_match('#^/ba/enviar\\-para\\-sn2/(?P<report_id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'troubleticket_ba_send_to_sn2')), array (  '_controller' => 'TroubleticketBundle\\Controller\\BAController::sendToSn2Action',  0 =>   array (  ),  1 =>   array (    'report_id' => '\\d+',  ),));
                    }

                    // troubleticket_ba_send_to_sn3
                    if (0 === strpos($pathinfo, '/ba/enviar-para-sn3') && preg_match('#^/ba/enviar\\-para\\-sn3/(?P<report_id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'troubleticket_ba_send_to_sn3')), array (  '_controller' => 'TroubleticketBundle\\Controller\\BAController::sendToSn3Action',  0 =>   array (  ),  1 =>   array (    'report_id' => '\\d+',  ),));
                    }

                }

                // troubleticket_ba_change_stack
                if (0 === strpos($pathinfo, '/ba/alterar-stack') && preg_match('#^/ba/alterar\\-stack/(?P<report_id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'troubleticket_ba_change_stack')), array (  '_controller' => 'TroubleticketBundle\\Controller\\BAController::changeStackAction',  0 =>   array (  ),  1 =>   array (    'report_id' => '\\d+',  ),));
                }

                // troubleticket_ba_send_to_user
                if (0 === strpos($pathinfo, '/ba/enviar-para-usuario') && preg_match('#^/ba/enviar\\-para\\-usuario/(?P<report_id>[^/]++)/?$#s', $pathinfo, $matches)) {
                    if (substr($pathinfo, -1) !== '/') {
                        return $this->redirect($pathinfo.'/', 'troubleticket_ba_send_to_user');
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'troubleticket_ba_send_to_user')), array (  '_controller' => 'TroubleticketBundle\\Controller\\BAController::sendToUserAction',  0 =>   array (  ),  1 =>   array (    'report_id' => '\\d+',  ),  2 => '',  3 =>   array (  ),  4 =>   array (    0 => 'POST',  ),));
                }

                if (0 === strpos($pathinfo, '/ba/c')) {
                    // troubleticket_ba_comment
                    if (0 === strpos($pathinfo, '/ba/comentar') && preg_match('#^/ba/comentar/(?P<report_id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'troubleticket_ba_comment')), array (  '_controller' => 'TroubleticketBundle\\Controller\\BAController::commentAction',  0 =>   array (  ),  1 =>   array (    'report_id' => '\\d+',  ),  2 => '',  3 =>   array (  ),  4 =>   array (    0 => 'POST',  ),));
                    }

                    if (0 === strpos($pathinfo, '/ba/chat')) {
                        // troubleticket_ba_chat
                        if (preg_match('#^/ba/chat/(?P<report_id>[^/]++)$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_troubleticket_ba_chat;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'troubleticket_ba_chat')), array (  '_controller' => 'TroubleticketBundle\\Controller\\BAController::chatListAction',));
                        }
                        not_troubleticket_ba_chat:

                        // troubleticket_ba_chat_insert
                        if (preg_match('#^/ba/chat/(?P<report_id>[^/]++)$#s', $pathinfo, $matches)) {
                            if ($this->context->getMethod() != 'POST') {
                                $allow[] = 'POST';
                                goto not_troubleticket_ba_chat_insert;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'troubleticket_ba_chat_insert')), array (  '_controller' => 'TroubleticketBundle\\Controller\\BAController::chatAction',));
                        }
                        not_troubleticket_ba_chat_insert:

                    }

                }

                // troubleticket_ba_link_to_bi
                if (preg_match('#^/ba/(?P<report_id>[^/]++)/bis$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'troubleticket_ba_link_to_bi')), array (  '_controller' => 'TroubleticketBundle\\Controller\\BAController::bisAction',));
                }

                // troubleticket_ba_take_on
                if (0 === strpos($pathinfo, '/ba/assumir') && preg_match('#^/ba/assumir/(?P<report_id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'troubleticket_ba_take_on')), array (  '_controller' => 'TroubleticketBundle\\Controller\\BAController::takeOnAction',));
                }

                // troubleticket_ba_report_incident
                if ($pathinfo === '/ba/relatorio/incidente') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_troubleticket_ba_report_incident;
                    }

                    return array (  '_controller' => 'TroubleticketBundle\\Controller\\BAController::reportIncidentAction',  '_route' => 'troubleticket_ba_report_incident',);
                }
                not_troubleticket_ba_report_incident:

            }

            // troubleticket_bs_report
            if ($pathinfo === '/bs/relatorio') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_troubleticket_bs_report;
                }

                return array (  '_controller' => 'TroubleticketBundle\\Controller\\BSController::reportAction',  '_route' => 'troubleticket_bs_report',);
            }
            not_troubleticket_bs_report:

            // troubleticket_ba_report_performance
            if ($pathinfo === '/ba/relatorio/performance') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_troubleticket_ba_report_performance;
                }

                return array (  '_controller' => 'TroubleticketBundle\\Controller\\BAController::reportPerformanceAction',  '_route' => 'troubleticket_ba_report_performance',);
            }
            not_troubleticket_ba_report_performance:

        }

        // troubleticket_circuit_ba_request
        if ($pathinfo === '/circuito-ba-request') {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_troubleticket_circuit_ba_request;
            }

            return array (  '_controller' => 'TroubleticketBundle\\Controller\\BAController::circuitRequestAction',  '_route' => 'troubleticket_circuit_ba_request',);
        }
        not_troubleticket_circuit_ba_request:

        if (0 === strpos($pathinfo, '/bi')) {
            // troubleticket_bi_symptom_update
            if (0 === strpos($pathinfo, '/bi/atualizasintoma') && preg_match('#^/bi/atualizasintoma/(?P<report_id>[^/]++)$#s', $pathinfo, $matches)) {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_troubleticket_bi_symptom_update;
                }

                return $this->mergeDefaults(array_replace($matches, array('_route' => 'troubleticket_bi_symptom_update')), array (  '_controller' => 'TroubleticketBundle\\Controller\\BIController::symptomUpdateAction',));
            }
            not_troubleticket_bi_symptom_update:

            // troubleticket_bi_new
            if ($pathinfo === '/bi/novo') {
                if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                    goto not_troubleticket_bi_new;
                }

                return array (  '_controller' => 'TroubleticketBundle\\Controller\\BIController::newAction',  '_route' => 'troubleticket_bi_new',);
            }
            not_troubleticket_bi_new:

            if (0 === strpos($pathinfo, '/bi/criar')) {
                // troubleticket_bi_create_preview
                if ($pathinfo === '/bi/criar') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_troubleticket_bi_create_preview;
                    }

                    return array (  '_controller' => 'TroubleticketBundle\\Controller\\BIController::createPreviewAction',  '_route' => 'troubleticket_bi_create_preview',);
                }
                not_troubleticket_bi_create_preview:

                // troubleticket_bi_create
                if (preg_match('#^/bi/criar/(?P<report_id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_troubleticket_bi_create;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'troubleticket_bi_create')), array (  '_controller' => 'TroubleticketBundle\\Controller\\BIController::createAction',));
                }
                not_troubleticket_bi_create:

                // troubleticket_bi_create_post
                if (preg_match('#^/bi/criar/(?P<report_id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_troubleticket_bi_create_post;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'troubleticket_bi_create_post')), array (  '_controller' => 'TroubleticketBundle\\Controller\\BIController::createPostAction',));
                }
                not_troubleticket_bi_create_post:

            }

        }

        // troubleticket_circuit_request
        if ($pathinfo === '/circuito-request') {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_troubleticket_circuit_request;
            }

            return array (  '_controller' => 'TroubleticketBundle\\Controller\\BIController::circuitRequestAction',  '_route' => 'troubleticket_circuit_request',);
        }
        not_troubleticket_circuit_request:

        if (0 === strpos($pathinfo, '/b')) {
            if (0 === strpos($pathinfo, '/bi')) {
                // troubleticket_bi_main
                if (0 === strpos($pathinfo, '/bi/editar') && preg_match('#^/bi/editar/(?P<report_id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_troubleticket_bi_main;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'troubleticket_bi_main')), array (  '_controller' => 'TroubleticketBundle\\Controller\\BIController::mainAction',));
                }
                not_troubleticket_bi_main:

                // troubleticket_bi_main_close
                if (0 === strpos($pathinfo, '/bi/fechar') && preg_match('#^/bi/fechar/(?P<report_id>[^/]++)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_troubleticket_bi_main_close;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'troubleticket_bi_main_close')), array (  '_controller' => 'TroubleticketBundle\\Controller\\BIController::mainCloseAction',));
                }
                not_troubleticket_bi_main_close:

                // troubleticket_bi_comment
                if (0 === strpos($pathinfo, '/bi/comentar') && preg_match('#^/bi/comentar/(?P<report_id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'troubleticket_bi_comment')), array (  '_controller' => 'TroubleticketBundle\\Controller\\BIController::commentAction',  0 =>   array (  ),  1 =>   array (    'report_id' => '\\d+',  ),  2 => '',  3 =>   array (  ),  4 =>   array (    0 => 'POST',  ),));
                }

                // troubleticket_bi_take_on
                if (0 === strpos($pathinfo, '/bi/assumir') && preg_match('#^/bi/assumir/(?P<report_id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'troubleticket_bi_take_on')), array (  '_controller' => 'TroubleticketBundle\\Controller\\BIController::takeOnAction',));
                }

                // troubleticket_bi_send_to_user
                if (0 === strpos($pathinfo, '/bi/enviar-para-usuario') && preg_match('#^/bi/enviar\\-para\\-usuario/(?P<report_id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'troubleticket_bi_send_to_user')), array (  '_controller' => 'TroubleticketBundle\\Controller\\BIController::sendToUserAction',  0 =>   array (  ),  1 =>   array (    'report_id' => '\\d+',  ),  2 => '',  3 =>   array (  ),  4 =>   array (    0 => 'POST',  ),));
                }

                // troubleticket_bi_stack
                if ($pathinfo === '/bi/fila') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_troubleticket_bi_stack;
                    }

                    return array (  '_controller' => 'TroubleticketBundle\\Controller\\BIController::stackAction',  '_route' => 'troubleticket_bi_stack',);
                }
                not_troubleticket_bi_stack:

                // troubleticket_bi_stack_request
                if ($pathinfo === '/bi/stack-request') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_troubleticket_bi_stack_request;
                    }

                    return array (  '_controller' => 'TroubleticketBundle\\Controller\\BIController::stackRequestAction',  '_route' => 'troubleticket_bi_stack_request',);
                }
                not_troubleticket_bi_stack_request:

                // troubleticket_bi_related_ba
                if (0 === strpos($pathinfo, '/bi/incidentes') && preg_match('#^/bi/incidentes/(?P<report_id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_troubleticket_bi_related_ba;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'troubleticket_bi_related_ba')), array (  '_controller' => 'TroubleticketBundle\\Controller\\BIController::mainBaRelatedAction',));
                }
                not_troubleticket_bi_related_ba:

                // troubleticket_bi_related_ba_request
                if (0 === strpos($pathinfo, '/bi/ba-related-request') && preg_match('#^/bi/ba\\-related\\-request/(?P<report_id>[^/]++)$#s', $pathinfo, $matches)) {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_troubleticket_bi_related_ba_request;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'troubleticket_bi_related_ba_request')), array (  '_controller' => 'TroubleticketBundle\\Controller\\BIController::mainBaRelatedRequestAction',));
                }
                not_troubleticket_bi_related_ba_request:

                if (0 === strpos($pathinfo, '/bi/relatorio')) {
                    // troubleticket_bi_report_incident
                    if ($pathinfo === '/bi/relatorio/incidente') {
                        return array (  '_controller' => 'TroubleticketBundle\\Controller\\BIController::reportIncidentAction',  0 =>   array (  ),  1 =>   array (  ),  2 => '',  3 =>   array (  ),  4 =>   array (    0 => 'GET',  ),  '_route' => 'troubleticket_bi_report_incident',);
                    }

                    // troubleticket_bi_report_performance
                    if ($pathinfo === '/bi/relatorio/performance') {
                        if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'HEAD'));
                            goto not_troubleticket_bi_report_performance;
                        }

                        return array (  '_controller' => 'TroubleticketBundle\\Controller\\BIController::reportPerformanceAction',  '_route' => 'troubleticket_bi_report_performance',);
                    }
                    not_troubleticket_bi_report_performance:

                }

                if (0 === strpos($pathinfo, '/bi/subcaso')) {
                    // troubleticket_bi_subcase_main
                    if (preg_match('#^/bi/subcaso/(?P<subcaseId>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'troubleticket_bi_subcase_main')), array (  '_controller' => 'TroubleticketBundle\\Controller\\SubcasesController::mainAction',  0 =>   array (  ),  1 =>   array (    'subcaseId' => '\\d+',  ),  2 => '',  3 =>   array (  ),  4 =>   array (    0 => 'GET',  ),));
                    }

                    // troubleticket_bi_subcase_create
                    if (0 === strpos($pathinfo, '/bi/subcaso/criar') && preg_match('#^/bi/subcaso/criar/(?P<report_id>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'troubleticket_bi_subcase_create')), array (  '_controller' => 'TroubleticketBundle\\Controller\\SubcasesController::createAction',  0 =>   array (  ),  1 =>   array (    'report_id' => '\\d+',  ),  2 => '',  3 =>   array (  ),  4 =>   array (    0 => 'GET',    1 => 'POST',  ),));
                    }

                    // troubleticket_bi_subcase_materials
                    if (0 === strpos($pathinfo, '/bi/subcaso/listamateriais') && preg_match('#^/bi/subcaso/listamateriais/(?P<subcaseId>[^/]++)$#s', $pathinfo, $matches)) {
                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'troubleticket_bi_subcase_materials')), array (  '_controller' => 'TroubleticketBundle\\Controller\\SubcasesController::listOfMaterialsPrintAction',  0 =>   array (  ),  1 =>   array (    'subcaseId' => '\\d+',  ),  2 => '',  3 =>   array (  ),));
                    }

                }

            }

            if (0 === strpos($pathinfo, '/ba/subcaso')) {
                // troubleticket_ba_subcase_materials
                if (0 === strpos($pathinfo, '/ba/subcaso/listamateriais') && preg_match('#^/ba/subcaso/listamateriais/(?P<subcaseId>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'troubleticket_ba_subcase_materials')), array (  '_controller' => 'TroubleticketBundle\\Controller\\SubcasesController::listOfMaterialsPrintAction',  0 =>   array (  ),  1 =>   array (    'subcaseId' => '\\d+',  ),  2 => '',  3 =>   array (  ),));
                }

                // troubleticket_ba_subcase_pause
                if (0 === strpos($pathinfo, '/ba/subcaso/pausar') && preg_match('#^/ba/subcaso/pausar/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'troubleticket_ba_subcase_pause')), array (  '_controller' => 'TroubleticketBundle\\Controller\\SubcasesController::pauseAction',));
                }

                // troubleticket_ba_subcase_main
                if (preg_match('#^/ba/subcaso/(?P<subcaseId>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'troubleticket_ba_subcase_main')), array (  '_controller' => 'TroubleticketBundle\\Controller\\SubcasesController::mainAction',  0 =>   array (  ),  1 =>   array (    'subcaseId' => '\\d+',  ),  2 => '',  3 =>   array (  ),  4 =>   array (    0 => 'GET',  ),));
                }

                // troubleticket_ba_subcase_create
                if (0 === strpos($pathinfo, '/ba/subcaso/criar') && preg_match('#^/ba/subcaso/criar/(?P<report_id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'troubleticket_ba_subcase_create')), array (  '_controller' => 'TroubleticketBundle\\Controller\\SubcasesController::createAction',  0 =>   array (  ),  1 =>   array (    'report_id' => '\\d+',  ),  2 => '',  3 =>   array (  ),  4 =>   array (    0 => 'POST',  ),));
                }

                // troubleticket_ba_subcase_restart
                if (0 === strpos($pathinfo, '/ba/subcaso/reiniciar') && preg_match('#^/ba/subcaso/reiniciar/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'troubleticket_ba_subcase_restart')), array (  '_controller' => 'TroubleticketBundle\\Controller\\SubcasesController::restartAction',));
                }

                // troubleticket_ba_subcase_close
                if (0 === strpos($pathinfo, '/ba/subcaso/fechar') && preg_match('#^/ba/subcaso/fechar/(?P<subcaseId>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'troubleticket_ba_subcase_close')), array (  '_controller' => 'TroubleticketBundle\\Controller\\SubcasesController::closeAction',  0 =>   array (  ),  1 =>   array (    'subcaseId' => '\\d+',  ),  2 => '',  3 =>   array (  ),  4 =>   array (    0 => 'POST',  ),));
                }

                // troubleticket_ba_subcase_update
                if (0 === strpos($pathinfo, '/ba/subcaso/atualizar') && preg_match('#^/ba/subcaso/atualizar/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'troubleticket_ba_subcase_update')), array (  '_controller' => 'TroubleticketBundle\\Controller\\SubcasesController::updateAction',));
                }

            }

            if (0 === strpos($pathinfo, '/bs')) {
                // troubleticket_bs_new
                if ($pathinfo === '/bs/novo') {
                    if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                        goto not_troubleticket_bs_new;
                    }

                    return array (  '_controller' => 'TroubleticketBundle\\Controller\\BSController::newAction',  '_route' => 'troubleticket_bs_new',);
                }
                not_troubleticket_bs_new:

                if (0 === strpos($pathinfo, '/bs/criar')) {
                    // troubleticket_bs_create_preview
                    if ($pathinfo === '/bs/criar') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_troubleticket_bs_create_preview;
                        }

                        return array (  '_controller' => 'TroubleticketBundle\\Controller\\BSController::createPreviewAction',  '_route' => 'troubleticket_bs_create_preview',);
                    }
                    not_troubleticket_bs_create_preview:

                    // troubleticket_bs_create
                    if (preg_match('#^/bs/criar/(?P<report_id>[^/]++)$#s', $pathinfo, $matches)) {
                        if (!in_array($this->context->getMethod(), array('GET', 'POST', 'HEAD'))) {
                            $allow = array_merge($allow, array('GET', 'POST', 'HEAD'));
                            goto not_troubleticket_bs_create;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'troubleticket_bs_create')), array (  '_controller' => 'TroubleticketBundle\\Controller\\BSController::createAction',));
                    }
                    not_troubleticket_bs_create:

                    // troubleticket_bs_create_post
                    if (preg_match('#^/bs/criar/(?P<report_id>[^/]++)$#s', $pathinfo, $matches)) {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_troubleticket_bs_create_post;
                        }

                        return $this->mergeDefaults(array_replace($matches, array('_route' => 'troubleticket_bs_create_post')), array (  '_controller' => 'TroubleticketBundle\\Controller\\BSController::createPostAction',));
                    }
                    not_troubleticket_bs_create_post:

                }

            }

        }

        // troubleticket_circuit_bs_request
        if ($pathinfo === '/circuito-bs-request') {
            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                $allow = array_merge($allow, array('GET', 'HEAD'));
                goto not_troubleticket_circuit_bs_request;
            }

            return array (  '_controller' => 'TroubleticketBundle\\Controller\\BSController::circuitRequestAction',  '_route' => 'troubleticket_circuit_bs_request',);
        }
        not_troubleticket_circuit_bs_request:

        if (0 === strpos($pathinfo, '/bs')) {
            // troubleticket_bs_config
            if ($pathinfo === '/bs/configuracao') {
                return array (  '_controller' => 'TroubleticketBundle\\Controller\\BSController::configAction',  0 =>   array (  ),  1 =>   array (    'id' => '\\d+',  ),  2 => '',  3 =>   array (  ),  4 =>   array (    0 => 'GET',  ),  '_route' => 'troubleticket_bs_config',);
            }

            // troubleticket_bs_stack
            if ($pathinfo === '/bs/fila') {
                return array (  '_controller' => 'TroubleticketBundle\\Controller\\BSController::stackAction',  '_route' => 'troubleticket_bs_stack',);
            }

            // troubleticket_bs_stack_request
            if ($pathinfo === '/bs/stack-request') {
                return array (  '_controller' => 'TroubleticketBundle\\Controller\\BSController::stackRequestAction',  '_route' => 'troubleticket_bs_stack_request',);
            }

            // troubleticket_bs_main
            if (0 === strpos($pathinfo, '/bs/editar') && preg_match('#^/bs/editar/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'troubleticket_bs_main')), array (  '_controller' => 'TroubleticketBundle\\Controller\\BSController::mainAction',));
            }

            // troubleticket_bs_take_on
            if (0 === strpos($pathinfo, '/bs/assumir') && preg_match('#^/bs/assumir/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'troubleticket_bs_take_on')), array (  '_controller' => 'TroubleticketBundle\\Controller\\BSController::takeOnAction',));
            }

            // troubleticket_bs_send_to_user
            if (0 === strpos($pathinfo, '/bs/enviar-para-usuario') && preg_match('#^/bs/enviar\\-para\\-usuario/(?P<report_id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'troubleticket_bs_send_to_user')), array (  '_controller' => 'TroubleticketBundle\\Controller\\BSController::sendToUserAction',  0 =>   array (  ),  1 =>   array (    'report_id' => '\\d+',  ),  2 => '',  3 =>   array (  ),  4 =>   array (    0 => 'POST',  ),));
            }

            // troubleticket_bs_comment
            if (0 === strpos($pathinfo, '/bs/comentar') && preg_match('#^/bs/comentar/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'troubleticket_bs_comment')), array (  '_controller' => 'TroubleticketBundle\\Controller\\BSController::commentAction',));
            }

            // troubleticket_bs_close
            if (0 === strpos($pathinfo, '/bs/fechar') && preg_match('#^/bs/fechar/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
                return $this->mergeDefaults(array_replace($matches, array('_route' => 'troubleticket_bs_close')), array (  '_controller' => 'TroubleticketBundle\\Controller\\BSController::closeAction',));
            }

        }

        // troubleticket_history
        if (0 === strpos($pathinfo, '/historico') && preg_match('#^/historico/(?P<id>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'troubleticket_history')), array (  '_controller' => 'TroubleticketBundle\\Controller\\HistoryController::mainAction',  0 =>   array (  ),  1 =>   array (    'id' => '\\d+',  ),  2 => '',  3 =>   array (  ),  4 =>   array (    0 => 'GET',  ),));
        }

        // troubleticket_tip
        if ($pathinfo === '/ba/tip') {
            return array (  '_controller' => 'TroubleticketBundle\\Controller\\BAController::previewTipAction',  0 =>   array (  ),  1 =>   array (  ),  2 => '',  3 =>   array (  ),  4 =>   array (    0 => 'GET',  ),  '_route' => 'troubleticket_tip',);
        }

        if (0 === strpos($pathinfo, '/troubleticket/api')) {
            // troubleticket_api_login
            if ($pathinfo === '/troubleticket/api/login') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_troubleticket_api_login;
                }

                return array (  '_controller' => 'TroubleticketBundle\\Controller\\APIController::loginAction',  '_route' => 'troubleticket_api_login',);
            }
            not_troubleticket_api_login:

            // troubleticket_is_logged
            if ($pathinfo === '/troubleticket/api/is-logged') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_troubleticket_is_logged;
                }

                return array (  '_controller' => 'TroubleticketBundle\\Controller\\APIController::isLoggedAction',  '_route' => 'troubleticket_is_logged',);
            }
            not_troubleticket_is_logged:

            // troubleticket_api_logout
            if ($pathinfo === '/troubleticket/api/logout') {
                if ($this->context->getMethod() != 'POST') {
                    $allow[] = 'POST';
                    goto not_troubleticket_api_logout;
                }

                return array (  '_controller' => 'TroubleticketBundle\\Controller\\APIController::logoutAction',  '_route' => 'troubleticket_api_logout',);
            }
            not_troubleticket_api_logout:

            if (0 === strpos($pathinfo, '/troubleticket/api/c')) {
                // troubleticket_api_circuits
                if ($pathinfo === '/troubleticket/api/circuitos') {
                    if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                        $allow = array_merge($allow, array('GET', 'HEAD'));
                        goto not_troubleticket_api_circuits;
                    }

                    return array (  '_controller' => 'TroubleticketBundle\\Controller\\APIController::circuitsAction',  '_route' => 'troubleticket_api_circuits',);
                }
                not_troubleticket_api_circuits:

                if (0 === strpos($pathinfo, '/troubleticket/api/cha')) {
                    if (0 === strpos($pathinfo, '/troubleticket/api/chamado')) {
                        // troubleticket_api_report
                        if ($pathinfo === '/troubleticket/api/chamado') {
                            if ($this->context->getMethod() != 'POST') {
                                $allow[] = 'POST';
                                goto not_troubleticket_api_report;
                            }

                            return array (  '_controller' => 'TroubleticketBundle\\Controller\\APIController::reportAction',  '_route' => 'troubleticket_api_report',);
                        }
                        not_troubleticket_api_report:

                        // troubleticket_api_report_bs
                        if ($pathinfo === '/troubleticket/api/chamado-bs') {
                            if ($this->context->getMethod() != 'POST') {
                                $allow[] = 'POST';
                                goto not_troubleticket_api_report_bs;
                            }

                            return array (  '_controller' => 'TroubleticketBundle\\Controller\\APIController::reportBSAction',  '_route' => 'troubleticket_api_report_bs',);
                        }
                        not_troubleticket_api_report_bs:

                        // troubleticket_api_report_list
                        if ($pathinfo === '/troubleticket/api/chamado') {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_troubleticket_api_report_list;
                            }

                            return array (  '_controller' => 'TroubleticketBundle\\Controller\\APIController::reportListAction',  '_route' => 'troubleticket_api_report_list',);
                        }
                        not_troubleticket_api_report_list:

                        // troubleticket_api_report_detail
                        if (preg_match('#^/troubleticket/api/chamado/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_troubleticket_api_report_detail;
                            }

                            return $this->mergeDefaults(array_replace($matches, array('_route' => 'troubleticket_api_report_detail')), array (  '_controller' => 'TroubleticketBundle\\Controller\\APIController::reportDetailAction',));
                        }
                        not_troubleticket_api_report_detail:

                        // troubleticket_api_report_detail_lot
                        if ($pathinfo === '/troubleticket/api/chamados') {
                            if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                                $allow = array_merge($allow, array('GET', 'HEAD'));
                                goto not_troubleticket_api_report_detail_lot;
                            }

                            return array (  '_controller' => 'TroubleticketBundle\\Controller\\APIController::reportLotDetailAction',  '_route' => 'troubleticket_api_report_detail_lot',);
                        }
                        not_troubleticket_api_report_detail_lot:

                    }

                    // troubleticket_api_chat
                    if ($pathinfo === '/troubleticket/api/chat') {
                        if ($this->context->getMethod() != 'POST') {
                            $allow[] = 'POST';
                            goto not_troubleticket_api_chat;
                        }

                        return array (  '_controller' => 'TroubleticketBundle\\Controller\\APIController::chatAction',  '_route' => 'troubleticket_api_chat',);
                    }
                    not_troubleticket_api_chat:

                }

            }

        }

        if (0 === strpos($pathinfo, '/p')) {
            // troubleticket_pop_request
            if ($pathinfo === '/pop-request') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_troubleticket_pop_request;
                }

                return array (  '_controller' => 'TroubleticketBundle\\Controller\\PopController::mainRequestAction',  '_route' => 'troubleticket_pop_request',);
            }
            not_troubleticket_pop_request:

            // troubleticket_provider_request
            if ($pathinfo === '/provider-request') {
                if (!in_array($this->context->getMethod(), array('GET', 'HEAD'))) {
                    $allow = array_merge($allow, array('GET', 'HEAD'));
                    goto not_troubleticket_provider_request;
                }

                return array (  '_controller' => 'TroubleticketBundle\\Controller\\ProviderController::mainRequestAction',  '_route' => 'troubleticket_provider_request',);
            }
            not_troubleticket_provider_request:

        }

        if (0 === strpos($pathinfo, '/troubleticket')) {
            if (0 === strpos($pathinfo, '/troubleticket/api')) {
                // troubleticket_api_report_close
                if (0 === strpos($pathinfo, '/troubleticket/api/chamado/fechar') && preg_match('#^/troubleticket/api/chamado/fechar/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_troubleticket_api_report_close;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'troubleticket_api_report_close')), array (  '_controller' => 'TroubleticketBundle\\Controller\\APIController::reportCloseAction',));
                }
                not_troubleticket_api_report_close:

                // troubleticket_api_ba_un_resolved
                if (0 === strpos($pathinfo, '/troubleticket/api/ba/nao/resolvido') && preg_match('#^/troubleticket/api/ba/nao/resolvido/(?P<id>\\d+)$#s', $pathinfo, $matches)) {
                    if ($this->context->getMethod() != 'PUT') {
                        $allow[] = 'PUT';
                        goto not_troubleticket_api_ba_un_resolved;
                    }

                    return $this->mergeDefaults(array_replace($matches, array('_route' => 'troubleticket_api_ba_un_resolved')), array (  '_controller' => 'TroubleticketBundle\\Controller\\APIController::baUnsolvedAction',));
                }
                not_troubleticket_api_ba_un_resolved:

            }

            if (0 === strpos($pathinfo, '/troubleticket/subcases')) {
                // troubleticket_subcases_start_activity
                if ($pathinfo === '/troubleticket/subcases/start') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_troubleticket_subcases_start_activity;
                    }

                    return array (  '_controller' => 'TroubleticketBundle\\Controller\\SubcasesController::startActivityAction',  '_route' => 'troubleticket_subcases_start_activity',);
                }
                not_troubleticket_subcases_start_activity:

                // troubleticket_subcases_comment_activity
                if ($pathinfo === '/troubleticket/subcases/comment') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_troubleticket_subcases_comment_activity;
                    }

                    return array (  '_controller' => 'TroubleticketBundle\\Controller\\SubcasesController::commentActivityAction',  '_route' => 'troubleticket_subcases_comment_activity',);
                }
                not_troubleticket_subcases_comment_activity:

                // troubleticket_subcases_vinculate_user_activity
                if ($pathinfo === '/troubleticket/subcases/vinculate') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_troubleticket_subcases_vinculate_user_activity;
                    }

                    return array (  '_controller' => 'TroubleticketBundle\\Controller\\SubcasesController::vinculateUserToActivityAction',  '_route' => 'troubleticket_subcases_vinculate_user_activity',);
                }
                not_troubleticket_subcases_vinculate_user_activity:

                // troubleticket_subcases_finish_activity
                if ($pathinfo === '/troubleticket/subcases/finish') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_troubleticket_subcases_finish_activity;
                    }

                    return array (  '_controller' => 'TroubleticketBundle\\Controller\\SubcasesController::finishActivityAction',  '_route' => 'troubleticket_subcases_finish_activity',);
                }
                not_troubleticket_subcases_finish_activity:

                // troubleticket_subcases_cancel_activity
                if ($pathinfo === '/troubleticket/subcases/cancel') {
                    if ($this->context->getMethod() != 'POST') {
                        $allow[] = 'POST';
                        goto not_troubleticket_subcases_cancel_activity;
                    }

                    return array (  '_controller' => 'TroubleticketBundle\\Controller\\SubcasesController::cancelActivityAction',  '_route' => 'troubleticket_subcases_cancel_activity',);
                }
                not_troubleticket_subcases_cancel_activity:

            }

        }

        // troubleticket_subcase_daily_extract
        if (0 === strpos($pathinfo, '/ba/daily') && preg_match('#^/ba/daily/(?P<reportId>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'troubleticket_subcase_daily_extract')), array (  '_controller' => 'TroubleticketBundle\\Controller\\SubcasesController::dailyAction',  0 =>   array (  ),  1 =>   array (    'reportId' => '\\d+',  ),  2 => '',  3 =>   array (  ),  4 =>   array (    0 => 'GET',    1 => 'POST',  ),));
        }

        // troubleticket_subcase_view_report
        if (0 === strpos($pathinfo, '/subcase') && preg_match('#^/subcase/(?P<subcaseId>[^/]++)/(?P<type>[^/]++)$#s', $pathinfo, $matches)) {
            return $this->mergeDefaults(array_replace($matches, array('_route' => 'troubleticket_subcase_view_report')), array (  '_controller' => 'TroubleticketBundle\\Controller\\SubcasesController::viewReportAction',  0 =>   array (  ),  1 =>   array (    'subcaseId' => '\\d+',  ),  2 => '',  3 =>   array (  ),  4 =>   array (    0 => 'GET',  ),));
        }

        throw 0 < count($allow) ? new MethodNotAllowedException(array_unique($allow)) : new ResourceNotFoundException();
    }
}
