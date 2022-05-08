<?php

namespace Mamlzy\PhpAuth\Repository;

use Mamlzy\PhpAuth\Domain\User;
use PDO;

class UserRepository
{
  public function __construct(private PDO $connection)
  {
  }

  public function save(User $user): User
  {
    $sql = "INSERT INTO users(id, name, password) VALUES (?, ?, ?)";
    $statement = $this->connection->prepare($sql);
    $statement->execute([
      $user->id,
      $user->name,
      $user->password
    ]);

    return $user;
  }

  public function findById(string $id): ?User
  {
    $statement = $this->connection->prepare("SELECT id, name, password FROM users WHERE id = ?");
    $statement->execute([$id]);

    try {
      if ($row = $statement->fetch()) {
        $user = new User();
        $user->id = $row['id'];
        $user->name = $row['name'];
        $user->password = $row['password'];

        return $user;
      } else {
        return null;
      }
    } finally {
      $statement->closeCursor();
    }
  }

  public function deleteAll(): void
  {
    $this->connection->exec('DELETE from users');
  }
}
