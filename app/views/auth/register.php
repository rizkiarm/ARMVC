<?php
  View::make('partials/header');
?>
<div class="container">
  <?php
    View::make('auth/partials/errors');
  ?>
  <form action="index.php?page=register" method="post">
    <fieldset>
        <label>Username
          <input type="text" name="username" value=""/>
        </label>
        <label>Password
          <input type="password" name="password" value=""/>
        </label>
        <label>Re-type password
          <input type="password" name="re_password" value=""/>
        </label>
        <label>Email
          <input type="text" name="email" value=""/>
        </label>
        
        <div class="inline-content padding-space">
          <div class="left"><input type="submit" value="Submit" /></div>
          <div class="right"><a class="small" href="index.php?page=login">Go back</a></div>
        </div>        
    </fieldset>
  </form>
</div>
<?php
  View::make('partials/footer');
?>