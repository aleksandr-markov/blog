<div class="container">
<div class="dropdown">
    <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"
            aria-expanded="false">
        Категории
    </button>
    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
        <?php foreach ($otherData as $item): ?>
            <li><a class="dropdown-item" href="/category/<?= $item['id'] ?>"
                   class="badge badge-dark"><?= $item['title'] ?></a></li>
        <?php endforeach; ?>
    </ul>
</div>

<?php foreach ($data as $key): ?>
    <a class="link" href="/posts/<?= $key['id'] ?>/show"><?= $key['title'] ?></a>
    <p class="media-text"><?= $key['text'] ?></p>
<?php endforeach; ?>
</div>




