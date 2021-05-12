<!---->
<!--<div class="dropdown">-->
<!--    <button class="btn btn-dark dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown"-->
<!--            aria-expanded="false">-->
<!--        Категории-->
<!--    </button>-->
<!--    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">-->
<!--        --><?php //foreach ($otherData as $item): ?>
<!--            <li><a class="dropdown-item" href="/category/--><? //= $item['id'] ?><!--"-->
<!--                   class="badge badge-dark">--><? //= $item['title'] ?><!--</a></li>-->
<!--        --><?php //endforeach; ?>
<!--    </ul>-->
<!--</div>-->
<?php //var_dump($otherData);?>
<div class="row mb-2">
    <h2 class="text-center">Top posts</h2>
    <?php foreach ($otherData['topPost'] as $item):?>
    <div class="col-md-12">
        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
            <div class="col p-4 d-flex flex-column position-static">
<!--                <strong class="d-inline-block mb-2 text-primary">World</strong>-->
                <h3 class="mb-0"><?=$item['title']?></h3>
                <div class="mb-1 text-muted"><?=$item['date_create']?></div>
                <p class="card-text mb-auto"><?= substr($item['text'], 0, 100)?>...</p>
                <a href="/posts/<?= $item['id'] ?>/show" class="stretched-link">Continue reading</a>
            </div>
            <div class="col-auto d-none d-lg-block">
            </div>
        </div>
    </div>
    <?php endforeach;?>
</div>

<?php foreach ($data as $key): ?>
    <a class="link" href="/posts/<?= $key['id'] ?>/show"><?= $key['title'] ?></a>
    <p class="media-text"><?= $key['text'] ?></p>
<?php endforeach; ?>




