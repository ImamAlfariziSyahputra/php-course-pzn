<?php
require_once __DIR__ . "/../Views/ViewShowTodoList.php";
require_once __DIR__ . "/../BusinessLogic/AddTodoList.php";

addTodoList('Belajar React');
addTodoList('Belajar Vue');
addTodoList('Belajar Angular');

viewShowTodoList();
