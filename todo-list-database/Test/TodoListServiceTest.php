<?php

require_once __DIR__ . '/../Config/Database.php';
require_once __DIR__ . '/../Entity/TodoList.php';
require_once __DIR__ . '/../Repository/TodoListRepository.php';
require_once __DIR__ . '/../Service/TodoListService.php';

use Config\Database;
use Entity\TodoList;
use Repository\TodoListRepositoryImpl;
use Service\TodoListServiceImpl;

function testShowTodoList()
{
  $connection = Database::getConnection();
  $todoListRepository = new TodoListRepositoryImpl($connection);
  $todoListService = new TodoListServiceImpl($todoListRepository);

  $todoListService->showTodoList();
}

function testAddTodoList()
{
  $connection = Database::getConnection();
  $todoListRepository = new TodoListRepositoryImpl($connection);

  $todoListService = new TodoListServiceImpl($todoListRepository);
  $todoListService->addTodoList('Belajar PHP');
  $todoListService->addTodoList('Belajar Java');
  $todoListService->addTodoList('Belajar Javascript');

  // $todoListService->showTodoList();
}

function testDeleteTodoList()
{
  $connection = Database::getConnection();
  $todoListRepository = new TodoListRepositoryImpl($connection);

  $todoListService = new TodoListServiceImpl($todoListRepository);
  $todoListService->deleteTodoList(5);

  // $todoListService->showTodoList();
}

testShowTodoList();
