# tshock-cards-for-pebble
Display the status of your [TShock](https://tshock.co/xf/index.php) server on [Cards for Pebble](https://keanulee.com/pebblecards)! 


## Card Format
>World Name<br/>
>Players: 1/8<br/>
>
>Players Online<br>
>CreativeUsername
>
>MOTD
>
>Welcome to the great server! It's quite great, isn't it?

*Players online can be disabled. When enabled it only displays if any players are presently in-game. MOTD can be disabled as well.* 

## Requirements
### TShock
Built and tested with TShock v1.3.0.8

Read this guide for help enabling TShock's REST API and creating an auth token.

## Installation
Clone the repo and run `composer install`.

Copy config-example.php to config.php and edit the values within.

