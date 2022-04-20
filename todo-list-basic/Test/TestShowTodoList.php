<?php

require_once __DIR__ . '/../Model/TodoList.php';
require_once __DIR__ . '/../BusinessLogic/ShowTodoList.php';

$todoList[1] = "Belajar PHP";
$todoList[2] = "Belajar Javascript";
$todoList[3] = "Belajar CSS";

showTodoList();
