<?php

namespace App\Http\Controllers\Hello;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

class SingleHelloController extends Controller
{
    public function __invoke() {
        return <<<EOF
        <!DOCTYPE html>
        <html>
        <head>
            <meta charset='utf-8'>
            <meta http-equiv='X-UA-Compatible' content='IE=edge'>
            <title>Hello/Single</title>
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
            <h1>Single</h1>
            <p>This is `__invoke` action in `SingleHelloController`</p>
        </body>
        </html>
        EOF;
    }
}
