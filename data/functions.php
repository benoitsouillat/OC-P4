<?php

function set_path_url($url)
{
    if (str_starts_with($url, 'http')) {
        return $url;
    } else {
        return "img/" . $url;
    }
}