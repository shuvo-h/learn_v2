<?php require("partials/head.php") ?>
<?php require("partials/nav.php") ?>
<?php require("partials/banner.php") ?>


<main>
    <div>
        Notes page
    </div>

    <ul class="my-10">
        <p><?= $note['id'] ?>) <?= $note['body'] ?></p>
        
    </ul>
</main>

<?php require("partials/footer.php") ?>