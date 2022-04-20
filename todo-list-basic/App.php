<?php

require_once __DIR__ . '/Model/TodoList.php';
require_once __DIR__ . '/BusinessLogic/ShowTodoList.php';
require_once __DIR__ . '/BusinessLogic/AddTodoList.php';
require_once __DIR__ . '/BusinessLogic/RemoveTodoList.php';
require_once __DIR__ . '/Views/ViewShowTodoList.php';
require_once __DIR__ . '/Views/ViewAddTodo.php';
require_once __DIR__ . '/Views/ViewRemoveTodo.php';
require_once __DIR__ . '/Helper/Input.php';

echo 'Aplikasi Todo List' . PHP_EOL;

viewShowTodoList();
