<?php

function printRequired($text = '*', $title = 'Required'){
    return "<small class='text-danger' title='".$title."' data-toggle='tooltip' data-placement='top'>".$text."</small>";
}