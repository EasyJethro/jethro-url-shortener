#!/usr/bin/env php
<?php
// SPDX-License-Identifier: Apache-2.0
require_once __DIR__ . '/UrlShortener.php';
define('URLSHORTENER', getenv('URLSHORTENER') ?: 'jethroau');
define('URLSHORTENER_API_KEY', getenv('URLSHORTENER_API_KEY') ?: '');

if ($argc < 2) { fprintf(STDERR, "Usage: php src/php/shorten.php <url> [campaign]\n"); exit(1); }
$url = $argv[1];
$campaign = $argv[2] ?? 'general';
try { echo getUrlShortener()->shorten($url, $campaign) . "\n"; }
catch (\RuntimeException $e) { fprintf(STDERR, "Error: %s\n", $e->getMessage()); exit(1); }
