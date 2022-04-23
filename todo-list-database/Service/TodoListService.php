<?php

namespace Service {

  use Entity\TodoList;
  use Repository\TodoListRepository;

  interface TodoListService
  {
    function showTodoList(): void;

    function addTodoList(string $todo): void;

    function deleteTodoList(int $number): void;
  }

  class TodoListServiceImpl implements TodoListService
  {
    private TodoListRepository $todoListRepository;

    public function __construct(TodoListRepository $todoListRepository)
    {
      $this->todoListRepository = $todoListRepository;
    }

    function showTodoList(): void
    {
      echo 'TODOLIST' . PHP_EOL;

      $todoList = $this->todoListRepository->getAll();

      // var_dump($todoList);
      foreach ($todoList as $key => $value) {
        echo "{$value->getId()}. {$value->getTodo()}" . PHP_EOL;
      }
    }

    function addTodoList(string $todo): void
    {
      $todoList = new TodoList($todo);
      $this->todoListRepository->add($todoList);

      echo "ADDING TODOLIST SUCCESS!" . PHP_EOL;
    }

    function deleteTodoList(int $number): void
    {
      if ($this->todoListRepository->delete($number)) {
        echo "REMOVE TODOLIST SUCCESS!" . PHP_EOL;
      } else {
        echo "REMOVE TODOLIST FAILED." . PHP_EOL;
      }
    }
  }
}
