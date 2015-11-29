<?php
define("API_URL", "http://myserver.com:port/"); # Address of Tshock API with port and trailing slash
define("API_USE_TOKEN_AUTH", true);             # Whether or not to use token authentication
define("API_TOKEN", "Your-token-here");         # If using token auth, generate a token and put it here
define("API_REFRESH_FREQUENCY", 30);            # How often to refresh the card (in minutes)
define("API_GET_PLAYER_LIST", true);            # Fetch and display player list (if any are on)
define("API_GET_MOTD", true);                   # Fetch and display the server MOTD