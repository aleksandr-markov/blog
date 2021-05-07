$(function () {
    // checkNameEmpty('#login')
    // let login = $("#login").val();
    // let email = $("#email").val();
    // let password = $("#password").val();
    signupConfirm();
    loginConfirm()

    // let isReply = false;
    let id = $(".articleId").attr('id');
    let commentId;
    let comment;
    let countComment = $('#countComment').val();

    $('.reply').on('click', function () {
        console.log('1');
        // reply(this);
        // commentId = ;
        commentId = $(this).attr('id');
    })
    // console.log(commentId)
    // sendCommentOrReply(id, commentId, comment, countComment);
    console.log(commentId)


    // sendCommentOrReply(id, commentId, comment, countComment);
    fetchComment(id)
    // setInterval(function (){
    //     fetchComment();
    // },3000);


    createPost();


})

let isReply = false;

function reply(caller) {
    $('.rowReply').insertAfter($(caller))
    $('.rowReply').show();
}

function createPost() {
    $('#create').on('submit', function (e) {
        e.preventDefault();
        $.ajax({
            type: "POST",
            url: "/posts/store",
            data: $(this).serialize(),
            success: function (result) {
                let response = JSON.parse(result);
                $('.count').html(response['count']);
                console.log(response)
            }
        });
        $('.title').val('');
        $('.text').val('');
    })
}

function fetchComment(id) {
    $.ajax({
        url: '/posts/' + id + '/comments',
        method: 'GET',
        dataType: 'html',
        success: function (response) {
            // console.log(response);
            $('.comment').html(response);

        }
    })
}

function sendCommentOrReply(id, commentId, comment, countComment) {
    $("#addComment, #addReply").on('click', function () {
        console.log(1);
        if (!isReply) {
            comment = $("#commentField").val();
        } else {
            comment = $("#replyComment").val();
        }
        $.ajax({
            url: "/posts/comments",
            method: "POST",
            dataType: 'text',
            data: {
                comment_content: comment,
                articleId: id,
                parentId: commentId
            },
            success: function (response) {
                let json = JSON.parse(response)
                $("#countComment").html(json['count']);
                if (!isReply) {
                    $("#commentField").val('');
                    successFetchComment(json['comments']);
                } else {
                    $('.rowReply').hide();
                    $('.rowReply').val('');
                    $('.replies').append(` <div class="comment">
                            <div class="user"><b>${json['login']}</b> <span class="time">2019-07-15</span></div>
                            <div class="userComment"></div>
                        </div>`)
                }
            }
        })
    })
}

function loginConfirm() {
    $('#loginSubmit').on('click', function () {
        let email = $('#loginEmail').val();
        let password = $('#loginPassword').val();
        $.ajax({
            url: '/user/authorize',
            method: 'POST',
            dataType: 'text',
            data: {email: email, password: password},
            success: function (response) {
                $('#msgbox').css('display', 'block').html(response);
                console.log(response)
                if (response === 'Добро пожаловать') {
                    $(location).attr('href', '/user/admin')
                }

            }
        })
    })
}

/*
Submitting and validating the registration form.
 */

function signupConfirm() {

    checkEmptyLogin('#login')
    // console.log(checkEmptyLogin('#login'));
    checkValidEmail('#email')
    checkLengthPassword('#password')


    $('#signupSubmit').on('click', function () {
            let login = $("#login").val();
            let email = $("#email").val();
            let password = $("#password").val();
            $.ajax({
                url: '/user/signup',
                method: 'POST',
                dataType: 'text',
                data: {
                    login: login,
                    email: email,
                    password: password
                },
                success: function (response) {
                    if (response === 'Поздравляю с успешной регистрацией') {
                        $(location).attr('href', '/user/login')
                    }
                    $('#msgbox').css('display', 'block').html(response);
                    // $('#password').val('');
                }
            })
        }
    )


}

/*
Checking the filling of the login field
 */
function checkEmptyLogin(loginInputId) {
    $(loginInputId).blur(function () {
        if ($(this).val().length < 5) {
            $(this).css('border', '1px solid red');
            $('#msgbox').css('display', 'block').html('Введите логин (Больше пяти символов)');
            return 0;
        } else {
            $(this).css('border', '1px solid green');
            $('#msgbox').css('display', 'none');
            return 1;
        }
    });
}

/*
Checking mail with regular expression
 */
function validateEmail(email) {
    let re = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
    return re.test(email);
}

function checkValidEmail(emailInputId) {
    $(emailInputId).blur(function () {
        let email = $(emailInputId).val();
        if (validateEmail(email)) {
            $(this).css('border', '1px solid green');
            $('#msgbox').css('display', 'none');
            return true;
        } else {
            $('#msgbox').css('display', 'block').html('Введите корректный email');
            $(this).css('border', '1px solid red');

            return false;
        }
    });


}

/*
Password length check
 */
function checkLengthPassword(passwordInputId) {
    $(passwordInputId).blur(function () {
        console.log()
        if ($(this).val().length < 8) {
            $(this).css('border', '1px solid red');
            $('#msgbox').css('display', 'block').html('Введите пароль (Больше восьми символов)');
            return false
        } else {
            $(this).css('border', '1px solid green');
            $('#msgbox').css('display', 'none');
            return true;
        }
    });
}

