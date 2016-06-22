<?php
/*
 * This file is part of the Netmon package.
 *
 * (c) Chris Abernethy
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace netmon;

include 'vendor/autoload.php';

$pingHosts = [
    '8.8.8.8'
];

$ping_ttl     = 128;
$ping_timeout = 5;

foreach ($pingHosts as $host) {
    $ping = new \JJG\Ping($host, $ping_ttl, $ping_timeout);
    if (false !== ($latency = $ping->ping())) {
        \Datadogstatsd::timing('ping.latency', $latency, 1, [
            'rhost' => $host
        ]);
        \Datadogstatsd::increment('ping.success', 1, [
            'rhost' => $host
        ]);
    } else {
        \Datadogstatsd::increment('ping.failure', 1, [
            'rhost' => $host
        ]);
    }
}
