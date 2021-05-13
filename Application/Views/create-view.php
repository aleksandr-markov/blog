<div class="container">
    <main>
        <div class="create">
            <form id="create" action="/posts/store" method="post" enctype="multipart/form-data">
                <div class="py-5 text-center">
                    <h2>Добавить статью</h2>
                </div>
                <div class="row g-3">
                    <div class="col-md-5 col-lg-4 order-md-last">
                        <h4 class="d-flex justify-content-between align-items-center mb-3">
                            <span class="text-muted">Выбор категорий</span>
                        </h4>
                        <?php foreach ($data as $datum) : ?>
                            <div class="form-check">
                                <input name="category[]" class="form-check-input" type="checkbox"
                                       value="<?= $datum['id'] ?>" id="flexCheckDefault">
                                <label class="form-check-label" for="flexCheckDefault">
                                    <?= $datum['title'] ?>
                                </label>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="col-md-7 col-lg-8">
                        <h4 class="mb-3">Заполните поля ниже чтобы добавить статью</h4>

                        <div class="row g-3">
                            <div class="col-sm-12">
                                <label for="title" class="form-label">Название статьи</label>
                                <input name="title" type="text" class="form-control title" required>

                                <label for="article" class="form-label">Текст статьи</label>
                                <textarea name="text" id="article" class="form-control text"
                                          placeholder="Текст статьи..."
                                          required></textarea>


                                <div class="mb-3">
                                    <label for="formFile" class="form-label">Preview</label>
                                    <input class="form-control" name="userFile" type="file" id="formFile">
                                </div>
                            </div>
                        </div>
                        <hr class="my-4">
                        <button class="w-100 btn btn-primary btn-lg submit create" id="createPost" type="submit">
                            Добавить статью
                        </button>
            </form>
        </div>
</div>
</main>
</div>
