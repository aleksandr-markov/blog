<div class="container">
    <h1 style="text-align: center">Редактировать пост</h1>
    <h2 style="text-align: center"><?= $data['title'] ?></h2>
    <div class="col-md-12">
        <form method="post" action="/posts/update/<?= $data['id'] ?>" class="needs-validation" novalidate>
            <div class="row g-3">
                <div class="col-sm-12">
                    <label for="title" class="form-label">Название статьи</label>
                    <input name="title" type="text" value="<?= $data['title'] ?>" class="form-control" id="title"
                           required>
                    <div class="invalid-feedback">
                        Введите текст заголовка
                    </div>
                    <div class="col-12">
                        <label for="article" class="form-label">Текст статьи</label>
                        <textarea style="height: 200px" name="text" class="form-control" id="article"
                                  required> <?= $data['text'] ?> </textarea>
                        <div class="invalid-feedback">
                            Введите текст статьи
                        </div>
                        <hr class="my-4">
                        <button class="w-100 btn btn-primary btn-lg" type="submit">Редактировать</button>
        </form>
    </div>
</div>
