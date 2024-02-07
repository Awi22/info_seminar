<?php

use Illuminate\Database\Capsule\Manager as DB;
use Illuminate\Http\Request;

defined('BASEPATH') or exit('No direct script access allowed');


function response($content = '', $status = 200, array $headers = [])
{
    // $content = json_encode($content);
    (new \Illuminate\Http\Response($content, $status, $headers))->send();
}

// function responseJson($data = null, $status = 200, $headers = [], $options = 0)
// {
//     (new \Illuminate\Http\JsonResponse($data, $status, $headers, $options))->send();
// }

if (!function_exists('responseJson')) {
    function responseJson($data, $status = 200)
    {
        $CI = &get_instance();
        $CI->output
            ->set_content_type('application/json')
            ->set_status_header($status)
            ->set_output(json_encode($data));
    }
}
