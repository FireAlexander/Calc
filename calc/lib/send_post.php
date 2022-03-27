<?php

namespace lib;

function send_post (string $sUrl, string $parameters) {

    $params = array('http' => array(
        'method' => 'POST',
        'content' => $parameters
    ));

    $ctx = stream_context_create($params);
    $fp = @fopen($sUrl, 'rb', false, $ctx);
    echo $fp;

}