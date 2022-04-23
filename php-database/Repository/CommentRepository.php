<?php

namespace Repository {

  use Model\Comment;
  use PDO;

  interface CommentRepository
  {
    function add(Comment $comment): Comment; //! return "last insert Id"

    function getById(int $id): ?Comment; //! return null jika id gak ditemukan

    function getAll(): array;
  }

  class CommentRepositoryImpl implements CommentRepository
  {

    public function __construct(private PDO $connection) //! db Connection
    {
    }

    function add(Comment $comment): Comment
    {
      $sql = "INSERT INTO comments(email,comment) VALUES(?, ?)";

      $statement = $this->connection->prepare($sql);
      $statement->execute([
        $comment->getEmail(),
        $comment->getComment()
      ]);

      $id = $this->connection->lastInsertId();
      $comment->setId($id);

      return $comment;
    }

    function getById(int $id): ?Comment
    {
      $sql = "SELECT * FROM comments WHERE id = ?";

      $statement = $this->connection->prepare($sql);
      $statement->execute([$id]);

      if ($row = $statement->fetch()) {
        return new Comment(
          id: $row['id'],
          email: $row['email'],
          comment: $row['comment']
        );
      } else {
        return null;
      }
    }

    function getAll(): array
    {
      $sql = "SELECT * FROM comments";
      $statement = $this->connection->query($sql);

      $comments = [];

      while ($row = $statement->fetch()) {
        //! Push Every Single Comment to "$comments" Array
        $comments[] = new Comment(
          id: $row['id'],
          email: $row['email'],
          comment: $row['comment'],
        );
      }

      return $comments;
    }
  }
}
