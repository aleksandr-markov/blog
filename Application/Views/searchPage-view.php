
<form id="searchFilter" action="/search/info">
    <h3 class="display-5">search filters:</h3>

    <div class="input-group mb-3">
        <input type="text" name="text" id="searchByText" class="form-control" placeholder="search text" aria-label="Recipient's username"
               aria-describedby="basic-addon2">
    </div>


    <div class="form-floating">
        <select class="form-select" name="category" id="searchByCategory" aria-label="Floating label select example">
            <option selected>Open this select menu</option>
            <option value="1">One</option>
            <option value="2">Two</option>
            <option value="3">Three</option>
        </select>
        <label for="floatingSelect">Category</label>
    </div>

    <button type="submit" class="btn btn-primary">submit</button>
    <button type="reset" class="btn btn-primary">reset</button>
  
</form>

<p class="display-5">
    search results for the query: <?= $_GET['text'] ?>
</p>

<?php //var_dump($data);?>
<table class="table">
    <thead>
    <tr>
        <th scope="col">#</th>
        <th scope="col">Title</th>
        <th scope="col">Date</th>
        <th scope="col">Author</th>
    </tr>
    </thead>
    <tbody>

    <?php foreach ($data

    as $key => $item): ?>
    <tbody>
    <tr>
        <th scope="row"><?= $key ?></th>
        <td id="title"><?= $item['title'] ?> </td>
        <td id="date_create"><?= $item['date_create'] ?></td>
        <td>@author</td>
    </tr>

    <?php endforeach; ?>
    </tbody>
</table>


<!--    <div class="card text-center" style="margin-top: 20px">-->
<!--        <div class="card-header">-->
<!--            Search output-->
<!--     </div>-->
<!--        <div class="card-body">-->
<!--            <h5 class="card-title">--><? //=$item['title']?><!--</h5>-->
<!--            <p class="card-text">--><? //= substr($item['text'], 0, 100)?><!--...</p>-->
<!--            <a href="#" class="btn btn-primary">Go to</a>-->
<!--        </div>-->
<!--    </div>-->
