<?php
/**
 * Created by PhpStorm.
 * User: rpires
 * Date: 25/05/16
 * Time: 09:42
 */

namespace Servicos\RhBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Response;

class BaseController extends Controller
{

    /**
     *
     * @param array $data
     * @param int $code
     * @param array $headers
     * @return \Symfony\Component\HttpFoundation\Response
     */

    protected function createJsonResponse(array $data, $code = 200, array $headers = array())
    {
        $response = new Response(json_encode($data), $code, $headers);
        $response->headers->set('Content-type', 'application/json');

        return $response;
    }

    protected function createCsvResponse(array $data, $code = 200, array $headers = array())
    {
        $filename = "relatorio.csv";
        $output = fopen('php://temp', 'r+');
        foreach ($data as $row) {
            fputcsv($output, $row, ";");
        }
        rewind($output);
        $rows = '';
        while ($line = fgets($output)) {
            $rows .= $line;
        }
        $rows .= fgets($output);

        $response = new Response('', $code, $headers);
        $response->headers->set('Content-Disposition', sprintf('attachment; filename="%s"', $filename));
        $response->headers->set('Content-Type', 'text/csv');
        return $response->setContent($rows);
    }

}


