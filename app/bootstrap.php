<?php

require 'core/RouteHelper.php';
require 'core/ViewHelper.php';
require 'core/Route.php';
require 'core/Model.php';
require 'core/View.php';
require 'core/Controller.php';
require 'core/Validation.php';
require 'core/Auth.php';

require 'app/configs/database.php';

require 'app/models/UserModel.php';
require 'app/models/UserAuthModel.php';

require 'app/controllers/IndexController.php';
require 'app/controllers/auth/RegistrationController.php';
require 'app/controllers/auth/LoginController.php';

?>