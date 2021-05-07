<div class="container">
    <?php foreach ($data as $key): ?>
        <a class="link" href="/posts/<?= $key['id'] ?>/show"><?= $key['title'] ?></a>
        <p class="media-text"><?= $key['text'] ?></p>
    <?php endforeach; ?>
</div>




