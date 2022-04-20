<?php
require_once __DIR__ . "/../Views/ViewAddTodo.php";
require_once __DIR__ . "/../BusinessLogic/ShowTodoList.php";
require_once __DIR__ . "/../BusinessLogic/AddTodoList.php";

addTodoList('Belajar React');
addTodoList('Belajar Next');

viewAddTodo();

showTodoList();
