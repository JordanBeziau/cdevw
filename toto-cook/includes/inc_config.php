<?php

# Connexion logs
  define("DSN", "mysql:host=127.0.0.1;port=8889;dbname=marmito");
  define("USER", "root");
  define("PASSWORD", "root");

# get visitor ip address
function getIP() {
  # share ip address
  if (isset($_SERVER["HTTP_CLIENT_IP"])) return $_SERVER["HTTP_CLIENT_IP"];
  # Proxy ip address
  if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])) return $_SERVER["HTTP_X_FORWARDED_FOR"];
  # classic ip address
  return isset($_SERVER["REMOTE_ADDR"]) ? $_SERVER["REMOTE_ADDR"] : "IP not found";
}