<?php include('../functions/functions.php')?>

<div class="container-1">
    <label for="password">Mật khẩu mới:</label>
    <input name="password" id="password" class="input-password" type="password" value="">
    <label for="confirm_password">Nhập lại mật khẩu mới:</label>
    <input name="confirm_password" id="confirm_password" class="input-password" type="password" value="">
    <div></div>
    <div>
        <button type="submit" name="submit" id="submit">Tạo</button>
        <button name="cancel" onclick=
        "
            $('.form-password').html('');
            $('#new_password').removeAttr('disabled');
        ">Huỷ</button>
    </div>
</div>