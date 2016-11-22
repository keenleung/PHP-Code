<?php
/*
*   公共样式和 jQuery.min.js
*/

$js_css = <<<"JS_CSS"

<script type="text/javascript" src="./other/jquery.min.js"></script>
    <style type="text/css">
        table {
            font-family: verdana,arial,sans-serif;
            font-size:11px;
            color:#333333;
            border-width: 1px;
            border-color: #666666;
            border-collapse: collapse;
        }
        table th {
            border-width: 1px;
            padding: 8px;
            border-style: solid;
            border-color: #666666;
            background-color: #dedede;
        }
        table td {
            border-width: 1px;
            padding: 8px;
            border-style: solid;
            border-color: #666666;
            background-color: #ffffff;
        }
    </style>

JS_CSS;

echo $js_css;

?>