<?php

function subtitle($str, $length = 50)
{
    return substr(strip_tags($str), 0, $length) . '...';
}
