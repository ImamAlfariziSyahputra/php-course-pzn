<?php

require_once __DIR__ . '/GetConnection.php';
require_once __DIR__ . '/Model/Comment.php';
require_once __DIR__ . '/Repository/CommentRepository.php';

use Model\Comment;
use Repository\CommentRepositoryImpl;

$connection = getConnection();
$repository = new CommentRepositoryImpl($connection);

//! START add()
// $comment = new Comment(email: 'tony@gmail.com', comment: 'whats up!');

// $newComment = $repository->add($comment);

// var_dump($newComment->getId());
//! END add()

//! START getById()
// $comment = $repository->getById(20);

// var_dump($comment);
//! END getById()

//! START getAll()
$comments = $repository->getAll();

var_dump($comments);
//! END getAll()


$connection = null;
