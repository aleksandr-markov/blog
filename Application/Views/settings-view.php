<form action="/user/changeUserPhoto" method="post" enctype="multipart/form-data">
    <div class="py-5 text-center">
        <h2>user settings</h2>
    </div>
    <div class="row g-3">
        <div class="col-md-5 col-lg-4 order-md-last">
            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Animi consequatur deserunt doloribus eum
            exercitationem expedita fuga fugit illum laborum minus modi, nisi provident quis reprehenderit soluta totam
            unde vitae. Nemo.
        </div>

        <div class="col-md-7 col-lg-8">
            <h4 class="mb-3">add profile photo
            </h4>

            <div class="row g-3">
                                <div class="col-sm-12">
                <!--                    <label for="title" class="form-label">Название статьи</label>-->
                <!--                    <input name="title" type="text" class="form-control title" required>-->
                <!---->
                <!--                    <label for="article" class="form-label">Текст статьи</label>-->
                <!--                    <textarea name="text" id="article" class="form-control text"-->
                <!--                              placeholder="Текст статьи..."-->
                <!--                              required></textarea>-->

                <div class="mb-3">
                    <label for="formFile" class="form-label">Preview</label>
                    <input class="form-control" name="userFile" type="file" id="formFile">
                </div>
            </div>
        </div>
        <hr class="my-4">
        <button class="w-100 btn btn-primary btn-lg submit create" id="createPost" type="submit">
            submit
        </button>
</form>