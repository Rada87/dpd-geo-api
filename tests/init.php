<?php
include "../vendor/autoload.php";
if (file_exists('../config.php')) include "../config.php";

if (!defined('DPD_API_KEY')) define('DPD_API_KEY', '#YOUR_API_KEY_HERE#');

function removeNullValues($data) {
    if (is_array($data)) {
        return array_filter(array_map('removeNullValues', $data), function($value) {
            return !is_null($value);
        });
    } elseif (is_object($data)) {
        foreach ($data as $key => $value) {
            if (is_null($value)) {
                unset($data->$key);
            } elseif (is_array($value) || is_object($value)) {
                $data->$key = removeNullValues($value);
            }
        }
        return $data;
    }
    return $data;
}