<?php

namespace App\Http\Controllers\Hello;

use Illuminate\Http\Request;

$head = '<html><head>';

$style = <<<EOF
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
EOF;

$body = '</head><body>';
$end = '</body></html>';

function tag($tag, $txt) {
    return "<{$tag}>" . $txt . "</{$tag}>";
}

use App\Http\Controllers\Controller;

class MultipleHelloController extends Controller
{
    public function index() {
        global $head, $style, $body, $end;

        return 
            $head.
            tag('title', 'MultipleHello/Index').
            $style.
            $body.
            tag('h1', 'Index').
            tag('p', 'This is Index page').
            '<a href="/multiple-hello/other">go to other page</a>'.
            $end;
    }

    public function other() {
        global $head, $style, $body, $end;

        return 
            $head.
            tag('title', 'MultipleHello/Other').
            $style.
            $body.
            tag('h1', 'Other').
            tag('p', 'This is Other page').
            $end;
    }
}
