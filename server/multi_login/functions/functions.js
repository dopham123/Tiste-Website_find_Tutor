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

    const urlParams = new URLSearchParams(window.location.search);
    const user_id = urlParams.get('user_id');
    // var id = event.target.name;

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
        'info': $('.info').val(),
        'experience': $('.experience').val(),
        'avatar_image': "../../resource/img_avatar/" + $('#avatar_image').val().split("\\").pop(),
        'profile_image': "../../resource/img_profile/" + $('#profile_image').val().split("\\").pop(),
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
                setTimeout(loadFile('data-table', '../admin/user_info.php'), 2000);
            }
        })
}

$(document).ready(function () {

    $('.form-password').submit(function (event) {
        $('.show-message').removeClass('has-error');
        $('.help-block').remove();
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
                        $('.show-message').addClass('has-error'); // add the error class to show red input
                        $('.show-message').append('<div class="help-block" style="color: red;">' + data.errors.password + '</div>'); // add the actual error message under our input
                    }

                } else {
                    $('.form-password').html('<div class="">' + data.message + '</div>');
                    $('#new_password').removeAttr("disabled");
                    // setTimeout(loadFile('user-info', '../admin/show_user_info.php?user_id=' + user_id), 3000);
                }
            })
        //stop submit
    });
});

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

function confirmDelete(event){
    if (confirmSubmit('Bạn có muốn xoá user này?')) {
        deleteFunction(event);
    }
}