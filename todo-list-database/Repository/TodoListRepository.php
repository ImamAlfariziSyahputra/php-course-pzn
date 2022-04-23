<?php

namespace Repository {

  use Entity\TodoList;
  use PDO;

  interface TodoListRepository
  {
    function add(TodoList $todoList): void;

    function delete(int $number): bool;

    function getAll(): array;
  }

  class TodoListRepositoryImpl implements TodoListRepository
  {
    public array $todoList = [];

    public function __construct(private PDO $connection)
    {
    }

    function add(TodoList $todoList): void
    {
      $sql = "INSERT INTO todos(todo) VALUES(?)";
      $statement = $this->connection->prepare($sql);
      $statement->execute([$todoList->getTodo()]);
    }

    function delete(int $id): bool
    {
      //! Checking is todo available?
      $sql = "SELECT id FROM todos WHERE id = ?";
      $statement = $this->connection->prepare($sql);
      $statement->execute([$id]);

      if ($statement->fetch()) {
        $sql = "DELETE FROM todos WHERE id = ?";
        $statement = $this->connection->prepare($sql);
        $statement->execute([$id]);

        return true;
      } else {
        return false;
      }
    }

    function getAll(): array
    {
      $sql = "SELECT * FROM todos";
      $statement = $this->connection->prepare($sql);
      $statement->execute();

      $result = [];

      foreach ($statement as $row) {
        $todo = new TodoList();
        $todo->setId($row['id']);
        $todo->setTodo($row['todo']);

        $result[] = $todo; //! push each todo to "result" array
      }

      return $result;
    }
  }
}
