<?php require("partials/head.php") ?>
<?php require("partials/nav.php") ?>
<?php require("partials/banner.php") ?>


<main>
    <div>
        Notes page
    </div>

    <ul class="my-10">
        <?php foreach($notes as $note) : ?>
            <li class=""> 
                <a class="underline text-blue-500" href="/note?id=<?= $note['id']; ?>" >
                    <?= $note['id'] ?>) <?= $note['body'] ?>
                </a>
            </li>
        <?php endforeach; ?>
    </ul>
</main>

<?php require("partials/footer.php") ?>