<?php
/**
 * Created by PhpStorm.
 * User: Ruslan Sazonov
 * Date: 18/12/2015
 * Time: 10:48
 */

namespace Sample\Controller\Api\v01;

use Silex\Application;
use Symfony\Component\HttpFoundation\Request;
use Sample\Model\Thing;
use Sample\Controller\BaseController;

class ThingController extends BaseController
{
    public function index(Request $request, Application $app)
    {
        $sampleResp = [
            'success' => true
        ];

        if (true) {
            return $this->sendJson($sampleResp, 200);
        } else {
            $sampleResp['success'] = false;
            return $this->sendJson($sampleResp, 404);
        }
    }

    public function remove(Request $request, Application $app, $thing_id)
    {
        return $this->sendJson(['success' => true], 200);
    }
}