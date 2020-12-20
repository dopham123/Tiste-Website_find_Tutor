<?php
include('./functions/functions.php');
if (!isLoggedIn()) {
    $_SESSION['msg'] = "You must log in first";
    header('location: login.php');
}

if (isLoggedIn() && isAdmin()) {
    header('location: ./admin/homepage_admin.php');
} 
?>
<!DOCTYPE html>
<html>

<head>
    <title>Home</title>
    <link rel="stylesheet" type="text/css" href="./style/style.css">
    <script src="//ajax.googleapis.com/ajax/libs/jquery/2.0.3/jquery.min.js"></script> <!-- load jquery via CDN -->
</head>

<body>
    <div class="header">
        <h2>Home Page</h2>
    </div>
    <div class="content">
        <!-- notification message -->
        <?php if (isset($_SESSION['success'])) { ?>
            <div class="error success">
                <h3>
                    <?php
                    echo $_SESSION['success'];
                    unset($_SESSION['success']);
                    ?>
                </h3>
            </div>
        <?php } ?>
        <!-- logged in user information -->
        <div class="profile_info">
            <img src="images/user_profile.png">

            <div>
                <?php if (isset($_SESSION['user'])) { ?>
                    <strong><?php echo $_SESSION['user']['username']; ?></strong>

                    <small>
                        <i style="color: #888;">(<?php echo ucfirst($_SESSION['user']['user_type']); ?>)</i>
                        <br>
                        <a href="index.php?logout='1'" style="color: red;">logout</a>
                    </small>
                <?php } ?>
            </div>
        </div>
    </div>
    
        <div class="comment-show-area" style="text-align: center;">
            <button id="get-tutor" type="submit" name="get-tutor">Get tutor</button>
            <div id="show-tutor"></div>
            <div id="show-comment"></div>
            <div id="show-error"></div>
        </div>
        
        <script>
            function addComment(id){
                let formData = {
                    newComment: $("input[name=new-comment]").val(),
                    commentatorID: <?php echo ($_SESSION['user']['id']); ?>
                }
                
                $.ajax({
                    type: "POST",
                    url: "./functions/addComment.php?id=" + id,
                    data: formData,
                    dataType: "json",
                    encode: true,
                    beforeSend: function () {
                        $("#submit-comment").attr("disabled", true);
                    }
                }).done(function (data){
                    if (!data.success) {
                        $("#show-error").append(`
                            <div id='error' class="error">${data.error}</div>
                        `);
                    } else {
                        alert("successfull");
                        getComment(id);
                    }
                });
            }


            function getComment(id){
                $('#show-comment').html('');
                $.ajax({
                    type: "GET",
                    url: "../multi_login/functions/comment.php?id=" +id,
                    dataType: "json",
                    success: (data) => {
                        if (!data.success) {
                            $('#show-comment').html(`<div>${data["error"]}</div>`);
                        } else {
                            for (let i = 0; i < data.comment.length; i++) {
                                $('#show-comment').append(`
                                    <div id='comment-${data.comment[i].id}' class="comment">${data.comment[i].comment}</div>
                                `);
                            }
                            <?php if ($_SESSION['user']['user_type'] == 'user') { ?>
                                $('#show-comment').append(`
                                        <div id='add-comment' class="comment">
                                            <label for="new-comment">Viết bình luận:</label>
                                            <input type="text" id="new-comment" name="new-comment">
                                            <button id="submit-comment" onclick='addComment(${id})'>Thêm</button>
                                        </div>
                                `);
                            <?php } ?>
                        }
                    }
                });
            }
            $(document).ready( () => {
                $('#get-tutor').on("click", () =>{
                    $('#show-tutor').html('');
                    $('#show-comment').html('');
                    $.ajax({
                        type: "GET",
                        url: "../multi_login/functions/tutor.php",
                        dataType: "json",
                        success: (data) =>{
                            if (data.length == 0) {
                                $('#show-tutor').html('<div>No tutor here</div>');
                            } else {
                                for (let i = 0; i < data.length; i++) {
                                    $('#show-tutor').append(`
                                        <a href="#" id="tutor-"${data[i].id} onclick='getComment(${data[i].id});'>${data[i].username}</a>
                                    `);
                                }
                            }
                        }
                    });
                });
            });
        </script>
   
    
</body>

</html>