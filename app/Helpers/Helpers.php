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



/**
 * user permission check
 *
 * @param string $permission
 * @return boolean
 */
function userCan($permission)
{
    return auth('admin')->user()->can($permission);
}
