<?php
require_once __DIR__ . "/../Model/TodoList.php";
require_once __DIR__ . "/../Views/ViewRemoveTodo.php";
require_once __DIR__ . "/../BusinessLogic/AddTodoList.php";
require_once __DIR__ . "/../BusinessLogic/ShowTodoList.php";

addTodoList('Belajar PHP');
addTodoList('Belajar JS');
addTodoList('Belajar Java');

showTodoList();

viewRemoveTodo();

showTodoList();
