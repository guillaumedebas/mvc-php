<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Le blog de l'AVBN</title>
    <link href="style.css" rel="stylesheet" />
</head>

<body>
    <h1>Le super blog de l'AVBN !</h1>
    <p>Derniers billets du blog :</p>


    <div class="news">
        <h3>
            <?= htmlspecialchars($post['title']); ?>
            <em>le <?= $post['french_creation_date']; ?></em>
        </h3>
        <p>
            <?= nl2br(htmlspecialchars($post['content']));
            ?>
            <br />
            <em>
                Commentaires
            </em>

            <?php
            foreach ($comments as $comment) {
            ?>

        <h4>
            <?= htmlspecialchars($comment['author']); ?>
            <em>le <?= $comment['french_creation_date']; ?></em>
        </h4>
        <p>
            <?= nl2br(htmlspecialchars($comment['comment']));
            ?>
            <br />

        </p>

    <?php
            } // The end of the posts loop.
    ?>
    <h2>Commentaires</h2>
    <form action="index.php?action=addComment&id=<?= $post['identifier'] ?>" method="post">
        <div>
            <label for="author">Auteur</label><br />
            <input type="text" id="author" name="author" />
        </div>
        <div>
            <label for="comment">Commentaire</label><br />
            <textarea id="comment" name="comment"></textarea>
        </div>
        <div>
            <input type="submit" />
        </div>
    </form>
    </p>
    </div>
</body>

</html>