<?php include VIEW_PATH . 'layouts/_header.php'; ?>

    <form action="register/add" method="post">
        <div class="form-group">
            <label for="email">邮箱</label>
            <input type="email" class="form-control" id="email" name="email">
        </div>
        <div class="form-group">
            <label for="password">密码</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <button type="submit" class="btn btn-primary">注册</button>
    </form>
<?php include VIEW_PATH . 'layouts/_footer.php'; ?>