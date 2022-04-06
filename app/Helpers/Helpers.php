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


function nestedCategories($step = 0, $category, $old_value = null, $seperator = '|---')
{
    $html = '';
    for($i = 0; $i < $step; $i++){
        $html .= $seperator;
    }
    printf('<option value="%d" %s>%s</option>',$category->id, $old_value == $category->id ? 'selected': '' ,   $html . $category->name);

    foreach($category->children as $nested){
        nestedCategories($step + 1, $nested, $old_value, $seperator);
    }
}
