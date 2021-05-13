<!---->
<!--<ul class="nav nav-tabs">-->
<!--    <li class="nav-item">-->
<!--        <a class="nav-link active" aria-current="page" href="#">Active</a>-->
<!--    </li>-->
<!--    <li class="nav-item">-->
<!--        <a class="nav-link" href="#">Link</a>-->
<!--    </li>-->
<!--    <li class="nav-item">-->
<!--        <a class="nav-link" href="#">Link</a>-->
<!--    </li>-->
<!--    <li class="nav-item">-->
<!--        <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>-->
<!--    </li>-->
<!--</ul>-->
<p class="display-3 ">
    search results for the query: <?=$_GET['text']?>
</p>
<?php foreach ($data as $item):?>
    <div class="card text-center" style="margin-top: 20px">
        <div class="card-header">
            Search output
        </div>
        <div class="card-body">
            <h5 class="card-title"><?=$item['title']?></h5>
            <p class="card-text"><?= substr($item['text'], 0, 100)?>...</p>
            <a href="#" class="btn btn-primary">Go to</a>
        </div>
    </div>
<?php endforeach;?>
