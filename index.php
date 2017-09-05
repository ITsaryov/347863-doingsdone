<?php
require ('functions.php');
// показывать или нет выполненные задачи
$show_complete_tasks = rand(0, 1);
// устанавливаем часовой пояс в Московское время
date_default_timezone_set('Europe/Moscow');
$days = rand(-3, 3);
$task_deadline_ts = strtotime("+" . $days . " day midnight"); // метка времени даты выполнения задачи
$current_ts = strtotime('now midnight'); // текущая метка времени
$current_date = date("d.m.Y", $current_ts);
// запишите сюда дату выполнения задачи в формате дд.мм.гггг
$date_deadline = date("d.m.Y", $task_deadline_ts);
// в эту переменную запишите кол-во дней до даты задачи
$days_until_deadline = floor(($task_deadline_ts - $current_ts)/(24*60*60));
$categories = ["Все","Входящие","Учеба","Работа","Домашние дела","Авто"];
$tasks = [
0 => [
   'task'  => 'Собеседование в IT компании',
   'date' => '01.06.2018',
   'cat' => 'Работа',
   'is_done' => false
],
1 => [
   'task'  => 'Выполнить тестовое задание',
   'date' => '25.05.2018',
   'cat' => 'Работа',
   'is_done' => false
],
2 => [
   'task'  => 'Сделать задание первого раздела',
   'date' => '21.04.2018',
   'cat' => 'Учеба',
   'is_done' => true
],
3 => [
   'task'  => 'Встреча с другом',
   'date' => '22.04.2018',
   'cat' => 'Входящие',
   'is_done' => false
],
4 => [
   'task'  => 'Купить корм для кота',
   'date' => 'нет',
   'cat' => 'Домашние дела',
   'is_done' => false
],
5 => [
   'task'  => 'Заказать пиццу',
   'date' => 'нет',
   'cat' => 'Домашние дела',
   'is_done' => false
],
];
$content = renderTemplate('index', ['show_complete_tasks'=>$show_complete_tasks, 'tasks'=>$tasks]);
$layout_content = renderTemplate('layout', ['title'=>'Дела в Порядке!', 'username'=>'Put name here', 'tasks'=>$tasks, 'categories'=>$categories, 'content'=>$content]);
print($layout_content);
?>
