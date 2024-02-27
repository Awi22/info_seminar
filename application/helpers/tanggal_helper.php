<?php

function tgl_sql($date)
{
    $exp = explode('-', $date);
    if (count($exp) == 3) {
        $date = $exp[2] . '-' . $exp[1] . '-' . $exp[0];
    }
    return $date;
}

function time_sql($time)
{
    $replace = str_replace(' ', '', $time);
    $exp = explode(':', $replace);
    if (count($exp) == 2) {
        $time = $exp[0] . ':' . $exp[1] . ':00';
    }
    return $time;
}

function jam_menit($time)
{
    $replace = str_replace(' ', '', $time);
    $exp = explode(':', $replace);
    if (count($exp) == 3) {
        $time = $exp[0] . ' : ' . $exp[1];
    }
    return $time;
}

function tgl_bln_thn($date)
{
    $exp = explode('-', $date);
    if (count($exp) == 3) {
        $date = $exp[2] . '-' . $exp[1] . '-' . $exp[0];
    }
    return $date;
}
