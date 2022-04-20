<?php

function viewRemoveTodo()
{
  echo 'Menghapus Todo' . PHP_EOL;

  $pilihan = input('Nomor Todo (x untuk batal) : ');

  if ($pilihan == 'x') {
    echo "== Batal menambah Todo ==" . PHP_EOL;
  } else {
    $success = removeTodoList($pilihan);

    if ($success) {
      echo "== Sukses menghapus Todo nomor : $pilihan ==" . PHP_EOL;
    } else {
      echo "== Todo tidak ditemukan! ==" . PHP_EOL;
    }
  }
}
