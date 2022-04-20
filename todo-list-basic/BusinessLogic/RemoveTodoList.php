<?php

//! Remove Todo List
function removeTodoList(int $todoNumber): bool
{
  global $todoList;

  //! if Todo Not Found return "false"
  if ($todoNumber > sizeof($todoList)) {
    return false;
  }

  // 1. Eko
  // 2. Ahok
  // 3. Jarot

  //! Di replace ke atas, data yg ingin dihapus di turunkan ke bawah
  for ($i = $todoNumber; $i < sizeof($todoList); $i++) {
    $todoList[$i] = $todoList[$i + 1];
  }

  //! Lalu Hapus data terakhir
  unset($todoList[sizeof($todoList)]);

  //! if Success return "true"
  return true;
}
