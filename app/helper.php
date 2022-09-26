<?php

if (!function_exists('info')) {
    function info(...$data)
    {
        foreach($data as $out){
            file_put_contents(BP . "/var/log/log.txt", var_export($out, 1) . "\n", FILE_APPEND);
        }
    }
}

if (!function_exists('mbacktrace')) {
    function mbacktrace()
    {
        $d = debug_backtrace();
        $out = '';

        foreach ($d as $i => $r) {
// sometimes there is undefined index 'file'
            @$out .= "[$i] {$r['file']}:{$r['line']}\n";
        }
        info($out);
    }
}
