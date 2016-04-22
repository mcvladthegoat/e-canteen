      <form method="post" class="form-signin">
        <h2 class="form-signin-heading">Вход для администратора</h2>
        <label for="inputEmail" class="sr-only">Логин</label>
        <input type="text" id="inputEmail" name="login" class="form-control" placeholder="Логин" required autofocus>
        <label for="inputPassword" class="sr-only">Пароль</label>
        <input type="password" name="pwd" id="inputPassword" class="form-control" placeholder="Пароль" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Войти</button>
      </form>
<?php if(isset($info)) echo $info; ?>