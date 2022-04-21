<?php

require_once __DIR__ . '/../Entity/TodoList.php';
require_once __DIR__ . '/../Repository/TodoListRepository.php';
require_once __DIR__ . '/../Service/TodoListService.php';

use Entity\TodoList;
use Repository\TodoListRepositoryImpl;
use Service\TodoListServiceImpl;

function testShowTodoList()
{
  $todoListRepository = new TodoListRepositoryImpl();
  $todoListRepository->todoList[1] = new TodoList('Belajar PHP');
  $todoListRepository->todoList[2] = new TodoList('Belajar Java');
  $todoListRepository->todoList[3] = new TodoList('Belajar Kotlin');

  $todoListService = new TodoListServiceImpl($todoListRepository);

  $todoListService->showTodoList();
}

function testAddTodoList()
{
  $todoListRepository = new TodoListRepositoryImpl();

  $todoListService = new TodoListServiceImpl($todoListRepository);
  $todoListService->addTodoList('Belajar PHP');
  $todoListService->addTodoList('Belajar Java');
  $todoListService->addTodoList('Belajar Javascript');

  $todoListService->showTodoList();
}

function testDeleteTodoList()
{
  $todoListRepository = new TodoListRepositoryImpl();

  $todoListService = new TodoListServiceImpl($todoListRepository);
  $todoListService->addTodoList('Belajar PHP');
  $todoListService->addTodoList('Belajar Java');
  $todoListService->addTodoList('Belajar Javascript');

  $todoListService->showTodoList();

  $todoListService->deleteTodoList(1);
  $todoListService->showTodoList();

  $todoListService->deleteTodoList(5);
  $todoListService->showTodoList();

  $todoListService->deleteTodoList(2);
  $todoListService->showTodoList();

  $todoListService->deleteTodoList(1);
  $todoListService->showTodoList();
}

testDeleteTodoList();
