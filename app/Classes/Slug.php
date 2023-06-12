<?php

namespace App\Classes;

class Slug {
    public static function create($title, $id) {
        $name = preg_replace("/[^A-Za-z0-9 ]/", '', $title);
        $name = str_replace(' ', '_', $name);

        return "{$name}_{$id}";
    }
}