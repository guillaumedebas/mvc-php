<?php

class Post
{
    public string $title;
    public string $frenchCreationDate;
    public string $content;
    public string $identifier;
}

function getPosts(): array
{
    // We connect to database
    try {
        $database = new PDO('mysql:host=localhost;dbname=oldblog;charset=utf8', 'root', '');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    // We retrieve the 5 last blog posts.
    $statement = $database->query(
        "SELECT id, title, content, DATE_FORMAT(creation_date, '%d/%m/%Y à %Hh%imin%ss') AS 
   french_creation_date FROM posts ORDER BY creation_date DESC LIMIT 0, 5"
    );

    $post = [];
    while ($row = $statement->fetch()) {
        $post = new Post();
        $post->title = $row['title'];
        $post->frenchCreationDate = $row['french_creation_date'];
        $post->content = $row['content'];
        $post->identifier = $row['id'];

        $posts[] = $post;
    }
    return $posts;
}


function getPost($identifier): Post
{
    try {
        $database = new PDO('mysql:host=localhost;dbname=oldblog;charset=utf8', 'root', '');
    } catch (Exception $e) {
        die('Erreur : ' . $e->getMessage());
    }

    $statement = $database->prepare(
        "SELECT id, title, content, DATE_FORMAT(creation_date, '%d/%m/%Y à %Hh%imin%ss') AS french_creation_date FROM posts WHERE id = ?"
    );
    $statement->execute([$identifier]);

    $row = $statement->fetch();
    $post = new Post();
    $post->title = $row['title'];
    $post->frenchCreationDate = $row['french_creation_date'];
    $post->content = $row['content'];
    $post->identifier = $row['id'];

    return $post;
}
