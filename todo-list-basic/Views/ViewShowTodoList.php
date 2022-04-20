<?php
require_once __DIR__ . "/../Model/TodoList.php";
require_once __DIR__ . "/../BusinessLogic/ShowTodoList.php";
require_once __DIR__ . "/../Views/ViewAddTodo.php";
require_once __DIR__ . "/../Views/ViewRemoveTodo.php";
require_once __DIR__ . "/../Helper/Input.php";

function viewShowTodoList()
{
  while (true) {
    showTodoList();

    echo "==== Menu ====" . PHP_EOL;
    echo "1. Tambah Todo" . PHP_EOL;
    echo "2. Hapus Todo" . PHP_EOL;
    echo "x. Untuk Keluar" . PHP_EOL;

    $pilihan = input('Pilih : ');

    if ($pilihan == '1') {
      viewAddTodo();
    } else if ($pilihan == '2') {
      viewRemoveTodo();
    } else if ($pilihan == 'x') {
      //! Break While Loop
      break;
    } else {
      echo "Pilihan tidak dimengerti" . PHP_EOL;
    }
  }

  echo "Sampai jumpa lagi..." . PHP_EOL;
}
