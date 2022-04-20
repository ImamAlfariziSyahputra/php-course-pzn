<?php
require_once __DIR__ . '/../Model/TodoList.php';
require_once __DIR__ . '/../BusinessLogic/AddTodoList.php';
require_once __DIR__ . '/../BusinessLogic/ShowTodoList.php';

addTodoList('Belajar React JS');
addTodoList('Belajar Next JS');
addTodoList('Belajar Vue JS');

showTodoList();
