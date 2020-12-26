function loadFile(className, url) {
    $.ajax({
        url: url,
        type: "GET",
        dataType: "html",
        success: function (strData) {
            var x = document.getElementsByClassName(className);
            x[0].innerHTML = strData;
        }
    });
};


function enableEdit(name) {
    var input_info_disabled_remove = document.getElementsByClassName(name);
    for (var i = 0; i < input_info_disabled_remove.length; i++) {
        input_info_disabled_remove[i].removeAttribute("disabled");
    }
    var input_save_remove = document.getElementById('save');
    input_save_remove.removeAttribute("disabled");
    input_save_remove.style.backgroundColor = "#198754";
}


function saveInfo() {

    $('.show-message').removeClass('has-error');
    $('.help-block').remove();

    var avatar_image = "";
    var profile_image = "";
    var info = "";
    var experience = "";

    const urlParams = new URLSearchParams(window.location.search);
    const user_id = urlParams.get('user_id');
    // var id = event.target.name;

    var check = document.getElementById("avatar_image");
    if (check) {
        if ($('#avatar_image').val() != "") {
            avatar_image = $('#avatar_image').val().split("\\").pop();
            // profile_image = "../../resource/img_profile/" + $('#profile_image').val().split("\\").pop();
        } else {
            // profile_image = document.getElementById("profile_image_1").src;
            // profile_image = "../../" + profile_image.substr(60);
            avatar_image = document.getElementById("avatar_image_1").src.split("/").pop();
            // avatar_image = "../../" + avatar_image.substr(60);
        }

        if ($('#profile_image').val() != "") {
            profile_image = $('#profile_image').val().split("\\").pop();
        } else {
            profile_image = document.getElementById("profile_image_1").src.split("/").pop();
            // avatar_image = document.getElementById("avatar_image_1").src;
            // avatar_image = "../../" + avatar_image.substr(60);
        }
        info = $('.info').val();
        experience = $('.experience').val();
    }

    var formData = {
        'username': $('input[name=username]').val(),
        'email': $('input[name=email]').val(),
        'user_type': $('select.user_type-class').val(),
        'fname': $('input[name=fname]').val(),
        'lname': $('input[name=lname]').val(),
        'gender': $('select.gender-class').val(),
        'phone_number': $('input[name=phone_number]').val(),
        'address_1': $('input[name=address_1]').val(),
        'address_2': $('input[name=address_2]').val(),
        'district': $('input[name=district]').val(),
        'city': $('input[name=city]').val(),
        'post_code': $('input[name=post_code]').val(),
        'info': info,
        'experience': experience,
        'avatar_image': avatar_image,
        'profile_image': profile_image,
    };

    // process the ajax
    $.ajax({
        type: 'POST',
        url: './ajax/edit_info.php?user_id=' + user_id,
        data: formData,
        dataType: 'json',
        encode: true
    })
        .done(function (data) {
            console.log(data);
            if (!data.success) {
                // show error
                if (data.errors.username) {
                    $('.show-message').addClass('has-error'); // add the error class to show red input
                    $('.show-message').append('<div class="help-block" style="color: red;">' + data.errors.username + '</div>'); // add the actual error message under our input
                }
                if (data.errors.email) {
                    $('.show-message').addClass('has-error'); // add the error class to show red input
                    $('.show-message').append('<div class="help-block" style="color: red;">' + data.errors.email + '</div>'); // add the actual error message under our input
                }

            } else {
                setTimeout(loadFile('user-info', '../admin/show_user_info.php?user_id=' + user_id), 3000);
            }
        })
}

function createUser() {

    $('.show-message').removeClass('has-error');
    $('.help-block').remove();

    const urlParams = new URLSearchParams(window.location.search);
    // var id = event.target.name;

    var formData = {
        'username': $('input[name=username]').val(),
        'email': $('input[name=email]').val(),
        'user_type': $('select.user_type-class').val(),
        'password_1': $('input[name=password_1]').val(),
        'password_2': $('input[name=password_2]').val(),
    };
    // process the ajax
    $.ajax({
        type: 'POST',
        url: './ajax/create_user.php',
        data: formData,
        dataType: 'json',
        encode: true
    })
        .done(function (data) {
            console.log(data);
            if (!data.success) {
                // show error
                if (data.errors.username) {
                    $('.show-message').addClass('has-error'); // add the error class to show red input
                    $('.show-message').append('<div class="help-block" style="color: red;">' + data.errors.username + '</div>'); // add the actual error message under our input
                }
                if (data.errors.email) {
                    $('.show-message').addClass('has-error'); // add the error class to show red input
                    $('.show-message').append('<div class="help-block" style="color: red;">' + data.errors.email + '</div>'); // add the actual error message under our input
                }
                if (data.errors.password) {
                    $('.show-message').addClass('has-error'); // add the error class to show red input
                    $('.show-message').append('<div class="help-block" style="color: red;">' + data.errors.password + '</div>'); // add the actual error message under our input
                }

            } else {
                $('.add-new-user').html('<div class="add-new-user">' + data.message + '</div>');
                setTimeout(loadFile('data-table', '../admin/user_info.php'), 2000);
            }
        })
}

function createPassword() {
    // $('.show-message-pass').removeClass('has-error');
    // $('.help-block').remove();
    document.getElementsByClassName('show-message-pass')[0].innerHTML = "";
    const urlParams = new URLSearchParams(window.location.search);
    const user_id = urlParams.get('user_id');

    var formData = {
        'password': $('input[name=password]').val(),
        'confirm_password': $('input[name=confirm_password]').val(),
    };


    // process the ajax
    $.ajax({
        type: 'POST',
        url: './ajax/create_password.php?user_id=' + user_id,
        data: formData,
        dataType: 'json',
        encode: true
    })
        .done(function (data) {
            console.log(data)
            if (!data.success) {
                // show error
                if (data.errors.password) {
                    $('.show-message-pass').addClass('has-error'); // add the error class to show red input
                    $('.show-message-pass').append('<div class="help-block" style="color: red;">' + data.errors.password + '</div>'); // add the actual error message under our input
                }

            } else {
                $('.show-success').html('<div class="new-password form-group row">' + data.message + '</div>');
                $('#new_password').removeAttr("disabled");
                // setTimeout(loadFile('user-info', '../admin/show_user_info.php?user_id=' + user_id), 3000);
            }
        })
    //stop submit
}

function deleteFunction(event) {
    var ajaxRequest;
    try {
        ajaxRequest = new XMLHttpRequest();
    } catch (e) {
        try {
            ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
        } catch (e) {

            try {
                ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
            } catch (e) {
                alert("Co loi xay ra voi trinh duyet cua ban!");
                return false;
            }
        }
    }
    var id = parseInt(event.target.name);
    ajaxRequest.open("GET", "../admin/ajax/delete_user.php?id=" + id, true);
    ajaxRequest.send(null);
}

function confirmSubmit(message) {
    return confirm(message);
}
function confirmSaveInfo() {
    if (confirmSubmit('Bạn đồng ý với những thay đổi?')) {
        saveInfo();
    }
}

function confirmDelete(event) {
    if (confirmSubmit('Bạn có muốn xoá user này?')) {
        deleteFunction(event);
    }
}

function changeUserTypeShow() {
    var user_type = document.getElementsByClassName("user_type-class")[0];
    var user_id = document.getElementsByClassName("user_type-class")[0].id;
    if (user_type.value == "tutor") {
        loadFile("show_profile", "../admin/change_user_type_edit.php?user_id=" + user_id);
    } else {
        document.getElementsByClassName("show_profile")[0].innerHTML = ' ';
    }
}

function showFileName(id) {
    // Add the following code if you want the name of the file appear on select
    var fileName = $('#' + id).val().split("\\").pop();
    $('#' + id).siblings(".custom-file-label").addClass("selected").html(fileName);
}

function userSaveInfo() {

    $('.show-message').removeClass('has-error');
    $('.help-block').remove();

    var avatar_image = "";
    var profile_image = "";
    var info = "";
    var experience = "";

    const urlParams = new URLSearchParams(window.location.search);
    const user_id = urlParams.get('user_id');
    // var id = event.target.name;

    var check = document.getElementById("avatar_image");
    if (check) {
        if ($('#avatar_image').val() != "") {
            avatar_image = $('#avatar_image').val().split("\\").pop();
        } else {
            avatar_image = document.getElementById("avatar_image_1").src.split("/").pop();
        }

        if ($('#profile_image').val() != "") {
            profile_image = $('#profile_image').val().split("\\").pop();
        } else {
            profile_image = document.getElementById("profile_image_1").src.split("/").pop();
        }
        info = $('.info').val();
        experience = $('.experience').val();
    }

    var formData = {
        'email': $('input[name=email]').val(),
        'fname': $('input[name=fname]').val(),
        'lname': $('input[name=lname]').val(),
        'gender': $('select.gender-class').val(),
        'phone_number': $('input[name=phone_number]').val(),
        'address_1': $('input[name=address_1]').val(),
        'address_2': $('input[name=address_2]').val(),
        'district': $('input[name=district]').val(),
        'city': $('input[name=city]').val(),
        'post_code': $('input[name=post_code]').val(),
        'info': info,
        'experience': experience,
        'avatar_image': avatar_image,
        'profile_image': profile_image,
    };

    // process the ajax
    $.ajax({
        type: 'POST',
        url: '../server/multi_login/admin/ajax/edit_info_user.php?user_id=' + user_id,
        data: formData,
        dataType: 'json',
        encode: true
    })
        .done(function (data) {
            console.log(data);
            if (!data.success) {
                // show error
                document.getElementsByClassName("show-message")[0].innerHTML = '<div class="alert alert-danger alert-top" role="alert"><strong>' + data.errors[0] + '</strong><button type="button" class="close" data-dismiss="alert">×</button></div>';
                window.setTimeout(function () { $(".alert").fadeTo(500, 0).slideUp(500, function () { $(this).remove(); }); }, 2000);
            } else {
                disableEdit('input-info');
            }
        })
}

function disableEdit(name) {
    var input_info_disabled_remove = document.getElementsByClassName(name);
    for (var i = 0; i < input_info_disabled_remove.length; i++) {
        input_info_disabled_remove[i].setAttribute("disabled", true);
    }
    var input_save_remove = document.getElementById('save');
    input_save_remove.setAttribute("disabled", true);
    input_save_remove.style.backgroundColor = "#ccc";
}

function changePassword() {
    // $('.show-message-pass').removeClass('has-error');
    // $('.help-block').remove();
    const urlParams = new URLSearchParams(window.location.search);
    const user_id = urlParams.get('user_id');

    var formData = {
        'current_password': $('input[name=current_password]').val(),
        'password': $('input[name=password]').val(),
        'confirm_password': $('input[name=confirm_password]').val(),
    };


    // process the ajax
    $.ajax({
        type: 'POST',
        url: '../server/multi_login/admin/ajax/change_password.php?user_id=' + user_id,
        data: formData,
        dataType: 'json',
        encode: true
    })
        .done(function (data) {
            console.log(data)
            if (!data.success) {
                // show error
                document.getElementsByClassName("show-message")[0].innerHTML = '<div class="alert alert-danger alert-top" role="alert"><strong>' + data.errors[0] + '</strong><button type="button" class="close" data-dismiss="alert">×</button></div>';
                window.setTimeout(function () { $(".alert").fadeTo(500, 0).slideUp(500, function () { $(this).remove(); }); }, 2000);
            } else {
                document.getElementsByClassName("show-message")[0].innerHTML = '<div class="alert alert-success alert-top" role="alert"><strong>' + data.message + '</strong><button type="button" class="close" data-dismiss="alert">×</button></div>';
                window.setTimeout(function () { $(".alert").fadeTo(500, 0).slideUp(500, function () { $(this).remove(); }); }, 2000);
            }
        })
    //stop submit
}