<?php
  View::make('partials/header');
?>
<div class="container">
  <?php
    View::make('auth/partials/errors');
  ?>
  <form action="index.php?page=login" method="post">
      <fieldset>
          <label>Username
            <input type="text" name="username" value=""/>
          </label>
          <label>Password
            <input type="password" name="password" value=""/>
          </label>
          <div class="inline-content padding-space">
            <div class="left"><input type="submit" value="Login" /></div>
            <div class="right"><a class="small" href="index.php?page=register">Don't have an account? <b>Register</b></a></div>
          </div> 
      </fieldset>
  </form>
</div>
<?php
  View::make('partials/footer');
?>