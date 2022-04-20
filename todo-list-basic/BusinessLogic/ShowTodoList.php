<?php

//! Show Todo List
function showTodoList()
{
  global $todoList;

  echo 'TODOLIST' . PHP_EOL;

  foreach ($todoList as $key => $value) {
    echo "$key. $value" . PHP_EOL;
  }
}
