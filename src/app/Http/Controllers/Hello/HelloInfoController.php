<?php

namespace App\Http\Controllers\Hello;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Controllers\Controller;

class HelloInfoController extends Controller
{
    public function __invoke(Request $request, Response $response) {
        $html = <<<EOF
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset='utf-8'>
            <meta http-equiv='X-UA-Compatible' content='IE=edge'>
            <title>Hello/Index</title>
            <meta name='viewport' content='width=device-width, initial-scale=1'>
            <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
        
            <style>
                body {
                    font-size: 16pt;
                    color: #999;
                }
        
                h1 {
                    font-size: 1000pt;
                    text-align: right;
                    color: #eee;
                    margin: -40px 0 -50px 0;
                }
            </style>
        </head>
        <body>
            <h1>Index</h1>
            <h3>Request</h3>
            <pre>{$request}</pre>
            <h3>Response</h3>
            <pre>{$response}</pre>
            <p>url: {$request->url()}</p>
            <p>fullUrl: {$request->fullUrl()}</p>
            <p>path: {$request->path()}</p>
            <p>status: {$response->status()}</p>
            <p>content: {$response->content()}</p>
        </body>
        </html>
        EOF;

        $response->setContent($html);

        return $response;
    }
}
