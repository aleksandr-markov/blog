$(function () {

    /*
    Create post.
     */
    $('#create').on('submit', function (e) {
        e.preventDefault()
        createPost();
    })

    /*
    Create comment.
     */
    $("#addComment").on('click', function () {
        sendComment(articleId, comment);
    })

    /*
    Login confirm
     */
    $('#loginSubmit').on('click', function () {
        loginConfirm()
    });


    /*
    Sign Up confirm
     */
    signupConfirm()


    /*
    Show all comments.
     */
    fetchComment(articleId);

    /*
    Show comments every 30 sec.
     */

    fetchComment(articleId);
    // setInterval(function () {
    // }, 3000)


    likePost();
})

let articleId = $(".articleId").attr('id');
let comment;
let isReply = false;

function replyComment(parent_id) {
    // clearInterval()
    $('.rowReply').insertAfter($('#' + parent_id))
    $('.rowReply').show();
    $("#addReply").on('click', function () {
        let comment = $("#replyComment").val();
        let articleId = $(".articleId").attr('id');

        $.ajax({
            url: "/posts/comments",
            method: "POST",
            dataType: 'text',
            data: {
                comment_content: comment,
                articleId: articleId,
                parentId: parent_id
            },
            success: function (response) {
                console.log(response)
                // $('')
                fetchComment(articleId);
                $('.rowReply').val('');
                $

            }
        })
    })
}

function createPost() {
    $.ajax({
        type: "POST",
        url: "/posts/store",
        data: $('#create').serialize(),
        success: function (response) {
            console.log(response)
        }
    });
    $('.title').val('');
    $('.text').val('');
}

function fetchComment(articleId) {
    $.ajax({
        url: '/posts/' + articleId + '/comments',
        method: 'GET',
        dataType: 'html',
        success: function (response) {
            // console.log(response);
            $('.comment').html(response);
            // fetchComment(articleId);
        }
    })
}

// function sendReply(article_id, comment, parent_id) {
//     $("#addReply").on('click', function () {
//         comment = $("#replyComment").val();
//
//         $.ajax({
//             url: "/posts/comments",
//             method: "POST",
//             dataType: 'text',
//             data: {
//                 comment_content: comment,
//                 articleId: article_id,
//                 parentId: parent_id
//             },
//             success: function (response) {
//                 console.log(response)
//             }
//         })
//     })
// }

function sendComment(articleId, comment) {
    comment = $("#commentField").val();
    $.ajax({
        url: "/posts/comments",
        method: "POST",
        dataType: 'text',
        data: {
            comment_content: comment,
            articleId: articleId,
        },
        success: function (response) {
            $("#commentField").val('')
        }
    })
}

function loginConfirm() {
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
            if (response === 'Welcome') {
                $(location).attr('href', '/user/admin')
            }
        }
    })
}

/*
Submitting and validating the registration form.
 */

function signupConfirm() {

    checkEmptyLogin('#login')
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

function likePost() {
    $('.like-btn').on('click', function () {
        let postId = $(this).data('id');
        let clicked = $(this);
        let action;

        // console.log(clicked)

        if (clicked.hasClass('fa-thumbs-o-up')) {
            action = 'like'
            //
        } else if (clicked.hasClass('fa-thumbs-up')) {
            action = 'unlike'
            //
        }

        $.ajax({
            url: "/posts/like",
            method: "POST",
            dataType: 'text',
            data: {
                action: action,
                postId: postId
            },
            success: function (response) {
                console.log(response)

                if (action === 'like') {
                    // alert('like')
                    $('.countLikes').html(response);
                    clicked.removeClass('fa-thumbs-o-up');
                    clicked.addClass('fa-thumbs-up');
                } else if (action === 'unlike') {
                    // alert('unlike')
                    $('.countLikes').html(response);
                    clicked.removeClass('fa-thumbs-up');
                    clicked.addClass('fa-thumbs-o-up');
                }
            }
        })

    })
}

