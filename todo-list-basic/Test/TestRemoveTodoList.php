<?php
require_once __DIR__ . '/../Model/TodoList.php';
require_once __DIR__ . '/../BusinessLogic/AddTodoList.php';
require_once __DIR__ . '/../BusinessLogic/ShowTodoList.php';
require_once __DIR__ . '/../BusinessLogic/RemoveTodoList.php';

addTodoList('Belajar React JS');
addTodoList('Belajar Next JS');
addTodoList('Belajar Vue JS');

showTodoList();

echo '======= Removed ======' . PHP_EOL;

removeTodoList(2);
showTodoList();

$success = removeTodoList(10);
var_dump($success);
showTodoList();
