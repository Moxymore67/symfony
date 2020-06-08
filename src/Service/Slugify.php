<?php

namespace App\Service;

class Slugify
{
    public function generate(string $input) : string
    {
        $slug = strtolower(trim(strip_tags($input)));
        $slug = str_replace(' ', '-', $slug); // Replaces all spaces with hyphens.
        $slug = preg_replace('/[^a-z0-9\-]/', '', $slug); // Removes special chars.

        return preg_replace('/-+/', '-', $slug); // Replaces multiple hyphens with single one.
    }
}