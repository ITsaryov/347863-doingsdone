<?php
//функция-шаблонизатор
function renderTemplate($file, $vars=[])
{
    if (file_exists('templates/'.$file.'.php')) {
        ob_start();
        extract($vars);
        require_once 'templates/'.$file.'.php';
        return ob_get_clean();
    } else {
        return "";
    }
};
// функция подсчёта задач в массиве
function Count_Tasks($tasks, $cat)
{
    $counter = 0;
    if ($cat == "Все") {
        $counter = count($tasks);
        }
    foreach ($tasks as $key => $val) {
    if ($val['cat'] == $cat) {
                $counter++;
        } 
    }
    return $counter;
};
