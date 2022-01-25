<?php

use App\Models\Setting;
use Modules\Language\Entities\Language;

function setting()
{
    return Setting::first();
}

function languages()
{
    return Language::all();
}
