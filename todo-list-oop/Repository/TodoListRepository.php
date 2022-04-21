<?php

namespace Repository {

  use Entity\TodoList;

  interface TodoListRepository
  {
    function add(TodoList $todoList): void;

    function delete(int $number): bool;

    function getAll(): array;
  }

  class TodoListRepositoryImpl implements TodoListRepository
  {
    public array $todoList = [];

    function add(TodoList $todoList): void
    {
      $number = sizeof($this->todoList) + 1;

      $this->todoList[$number] = $todoList;
    }

    function delete(int $number): bool
    {
      //! if Todo Not Found return "false"
      if ($number > sizeof($this->todoList)) {
        return false;
      }

      //! Di replace ke atas, data yg ingin dihapus di turunkan ke bawah
      for ($i = $number; $i < sizeof($this->todoList); $i++) {
        $this->todoList[$i] = $this->todoList[$i + 1];
      }

      //! Lalu Hapus data terakhir
      unset($this->todoList[sizeof($this->todoList)]);

      //! if Success return "true"
      return true;
    }

    function getAll(): array
    {
      return $this->todoList;
    }
  }
}
