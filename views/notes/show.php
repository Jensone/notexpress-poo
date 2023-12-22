<h1><?= !empty($pageTitle) ? $pageTitle : '' ?></h1>


<a href="/note/edit?slug=<?= $note->getSlug();  ?>" class="btn btn-secondary">Modifier</a>