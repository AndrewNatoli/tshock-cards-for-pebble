<?php
require_once "config.php";
require_once "vendor/autoload.php";

use Guzzle\Http\Client;


function doRequest($endpoint) {
    $client = new Client(API_URL);

    if(API_USE_TOKEN_AUTH) {
        $endpoint .= "?token=".API_TOKEN;
    }

    try {
        $resp = $client->get($endpoint)->send()->getBody();
        return json_decode($resp);
    } catch (Exception $e) {
        return null;
    }

}

$resp = doRequest("v2/server/status");

if($resp != null && $resp->status == 200) {
    echo json_encode(array(
        "content" => "{$resp->world}\nPlayers Online: {$resp->playercount}",
        "refresh_frequency" => API_REFRESH_FREQUENCY
    ));
}