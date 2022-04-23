<?php

namespace View {

  use Service\TodoListService;
  use Helper\InputHelper;

  class TodoListView
  {
    private TodoListService $todoListService;

    public function __construct(TodoListService $todoListService)
    {
      $this->todoListService = $todoListService;
    }

    function showTodoList(): void
    {
      while (true) {
        $this->todoListService->showTodoList();

        echo "==== Menu ====" . PHP_EOL;
        echo "1. Tambah Todo" . PHP_EOL;
        echo "2. Hapus Todo" . PHP_EOL;
        echo "x. Untuk Keluar" . PHP_EOL;

        $pilihan = InputHelper::input('Pilih : ');

        if ($pilihan == '1') {
          $this->addTodoList();
        } else if ($pilihan == '2') {
          $this->deleteTodoList();
        } else if ($pilihan == 'x') {
          //! Break While Loop
          break;
        } else {
          echo "Pilihan tidak dimengerti" . PHP_EOL;
        }
      }

      echo "Sampai jumpa lagi..." . PHP_EOL;
    }

    function addTodoList(): void
    {
      echo "==== Menambah Todo ====" . PHP_EOL;

      $todo = InputHelper::input('Todo (x untuk batal) : ');

      if ($todo === 'x') {
        echo 'Batal menambah Todo' . PHP_EOL;
      } else {
        $this->todoListService->addTodoList($todo);
      }
    }

    function deleteTodoList(): void
    {
      echo '== Menghapus Todo ==' . PHP_EOL;

      $pilihan = InputHelper::input('Nomor Todo (x untuk batal) : ');

      if ($pilihan == 'x') {
        echo "== Batal menambah Todo ==" . PHP_EOL;
      } else {
        $this->todoListService->deleteTodoList($pilihan);
      }
    }
  }
}
