<!--<span class="badge badge-secondary">asdsad</span>-->
<div class="container">
    <input type="hidden" class="articleId" name="articleId" id="<?= $data['id'] ?>">

    <h1 style="text-align: center"><?= $data['title'] ?></h1>
    <!--    <a href="" class="badge badge-dark">Dark</a>-->
    <div class="category">
        <?php foreach ($otherData as $value):?>
        <span class="badge badge-dark"><?=$value['title']?></span>
        <?php endforeach;?>
    </div>


    <p><?= $data['text'] ?></p>
    <!--    <input type="hidden" name="article_id" class="post_id" id="--><? //= $data['id'] ?><!--">-->


    <div class="row">
        <div class="col-md-12">
            <h2 style="margin-bottom:10px ">Комментарии </h2>
            <textarea class="form-control" name="comment" id="commentField" cols="30" rows="2"
                      placeholder="Ваш коментарий..."></textarea>
            <button class="btn btn-primary" style="float: right; margin-top: 10px" onclick="isReply = false"
                    id="addComment">
                Отправить
            </button>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="userComments">
                <div class="comment">

                </div>
            </div>
        </div>
        <div class="row rowReply" style="display: none">
            <div class="col-md-12">
                <textarea class="form-control" name="replyComment" id="replyComment" cols="30" rows="2"></textarea>
                <button class="btn btn-primary" id="addReply" onclick="isReply = true;">Ответить</button>
                <button class="btn btn-danger" onclick="$('.rowReply').hide()">Закрыть</button>
            </div>
        </div>
    </div>
</div>


<!--                    <div class="user"><b>jjj</b> <span class="time">jjj</span></div>-->
<!--                    <div class="userComment">hhh</div>-->
<!--                    <div class="reply" id=""><a href="javascript:void(0)">ответить</a></div>-->

