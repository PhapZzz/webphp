<div id="content">
    <div id="background_regis">

        <!-- <?php
        // Hiển thị thông báo nếu có
        if (isset($_GET['existingAccount'])) {
            echo '<div class="alert alert-danger" role="alert">Đang đăng nhập, vui lòng đăng xuất!</div>';
        }elseif (isset($_GET['passwordMismatch'])) {
            echo '<div class="alert alert-danger" role="alert">Hai mật khẩu không trùng khớp!</div>';
        }
        ?> -->
        <div id="message" class="alert alert-danger" role="alert" style="display: none;"></div>';
        <div id="register">
            <h2 id="title_register">Đăng ký</h2>
            <!-- Form đăng ký -->
            <form id="register_form" method="post">
                <input id="phone_number" name="phone_number" type="text" placeholder="Số điện thoại" required>
                <input id="name" name="name" type="text" placeholder="Tên" required>
                <input id="passwd" name="password" type="password" placeholder="Mật khẩu" required>
                <input id="re_passwd" name="re_passwd" type="password" placeholder="Nhập lại mật khẩu" required>
                <button id="btn_register" type="submit">Đăng ký</button>
            </form>
        </div>
    </div>
</div>
