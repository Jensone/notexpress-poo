<div class="p-5 text-center bg-body-tertiary rounded-3" style="background-image: url(/assets/images/uploads/<?= !empty($note->getImage()) ? $note->getImage() : 'default.png' ?>); background: cover; background-position: center center;)">
    <h1 class="text-body-emphasis"><?= !empty($pageTitle) ? $pageTitle : '' ?></h1>
</div>

<p class="border rounded p-3 m-3">
    <?= $note->getContent(); ?>
</p>

<a href="/note/edit?slug=<?= $note->getSlug();  ?>" class="btn btn-secondary">Modifier</a>