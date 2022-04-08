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


function reverseNestedPath($string, $seperator = '/'){

    $items = explode($seperator, $string);

    return array_reverse($items);
}

function nestedPathPrint($string,  $remove_last = false, $seperator = '/')
{
    $items = explode($seperator, $string);

    if($remove_last){
        array_pop($items);
    }

    $formatedString = '';

    for($i = 0; $i < count($items); $i++){
        if($i % 2 == 0){
            $formatedString.= sprintf('<span class="badge %s">%s</span>',  'badge-success', $items[$i]);
        }else {
            $formatedString.= sprintf('<span class="badge %s">%s</span>', 'badge-info', $items[$i]);
        }
    }

    $formatedString = ltrim($formatedString, $seperator);

    return $formatedString;

}

function nestedPathRemoveLast($string, $seperator = '/'){
    $items = explode($seperator, $string);

    array_pop($items);

    return implode($seperator, $items);
}
