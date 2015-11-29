<?php
require_once "config.php";
require_once "vendor/autoload.php";

use Guzzle\Http\Client;


function doRequest($endpoint, $extra_params = "") {
    $client = new Client(API_URL);

    if(API_USE_TOKEN_AUTH) {
        $endpoint .= "?token=".API_TOKEN."&{$extra_params}";
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

    $content = "{$resp->world}\nPlayers: {$resp->playercount}/{$resp->maxplayers}";

    # Append the player list if there's anyone online and we have that option enabled
    if(API_GET_PLAYER_LIST && $resp->playercount > 0) {

        $playerList = doRequest("v2/players/list");

        if($playerList != null && $playerList->status == 200 && count($playerList->players) > 0) {

            $content .= "\n\nPlayers Online\n";

            foreach ($playerList->players as $player) {
                $content .= "{$player->nickname}\n";
            }

        }

    }

    # Append the MOTD if we want it
    if(API_GET_MOTD) {
        $motd = doRequest("v2/server/rawcmd", "cmd=/motd");

        if($motd != null && $motd->status == 200) {
            $content .= "\n\nMOTD\n{$motd->response}";
        }
    }

    echo json_encode(array(
        "content" => $content,
        "refresh_frequency" => API_REFRESH_FREQUENCY
    ));
}