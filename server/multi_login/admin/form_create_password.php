<?php include('../functions/functions.php') ?>

<div class="col-sm-6">
    <label for="password">Mật khẩu mới:</label>
    <input name="password" id="password" class="input-password form-control form-control-sm" type="password" value="">
</div>
<div class="col-sm-6">
    <label for="confirm_password">Nhập lại mật khẩu mới:</label>
    <input name="confirm_password" id="confirm_password" class="input-password form-control form-control-sm" type="password" value="">
</div>

<div class="col-sm-12 mt-2">
    <button class="btn btn-info" type="submit" name="submit" id="submit" onclick="createPassword();">Tạo</button>
    <button class="btn btn-danger" name="cancel" onclick="
            $('.new-password').html('');
            $('#new_password').removeAttr('disabled');
            $('.show-message-pass').removeClass('has-error');
    		$('.help-block').remove();
        ">Huỷ</button>
</div>