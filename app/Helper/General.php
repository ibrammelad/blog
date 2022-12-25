<?php

use App\Models\Language;
use Illuminate\Support\Facades\Config;

function get_languages()
{
   return Language::Active()->Selection()->get();
}

function get_default_lang()
{
    return Config::get('app.locale');
}
function uploadImage($image)
{
    $new_name = \Illuminate\Support\Str::random(10).'.'.$image->getClientOriginalExtension();
    $image->move(public_path("images/blog"), $new_name);
    return $new_name;
}

