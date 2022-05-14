<?php

use App\Models\Setting;
use Illuminate\Support\Str;
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

function nestedPathPrintWithLink($string,  $seperator = '/')
{
    // $names = explode($seperator, $string);
    // $total = count($names);
    // $links = sprintf('<span><a href="%s">%s</a></span>', route('index'), 'Home');
    // for($i=0; $i < $total; $i++){
    //     if($i == ($total - 1)){
    //         $links .= sprintf(' › <span><strong><a href="%s">%s</a></strong></span>', route('category.product', Str::slug($names[$i])), $names[$i]);
    //     }else {
    //         $links .= sprintf(' › <span><a href="%s">%s</a></span>', route('category.product', Str::slug($names[$i])), $names[$i]);
    //     }
    // }

    // $links = rtrim($links, ' ›');

    // return $links;

    //"gallery/alisha-pollich/terrance-spencer/magali-schiller"

    $names = explode($seperator, $string);
    $total = count($names);
    $links = '';
    for($i=count($names) -1; $i >= 0; $i--){
        $slug=  join('/', $names);
        $slug_name = ucwords(str_replace('-', ' ', $names[$i]));
        if($i == ($total - 1)){
            $links = sprintf(' › <span><strong><a href="%s">%s</a></strong></span>', route('slug.view', $slug), $slug_name).$links;
        }else {
            $links = sprintf(' › <span><a href="%s">%s</a></span>', route('slug.view', $slug), $slug_name).$links;
        }
        array_pop($names);
    }

    $links = sprintf('<span><a href="%s">%s</a></span>', route('index'), 'Home').$links;

    $links = rtrim($links, ' ›');

    return $links;
}

function nestedPathRemoveLast($string, $seperator = '/'){
    $items = explode($seperator, $string);

    array_pop($items);

    return implode($seperator, $items);
}
