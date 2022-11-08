<?php

require 'src/util/getConfig.php';
require 'src/util/renderTemplate.php';
require 'src/util/resizeImage.php';

require 'src/db/dbConnect.php';
require 'src/db/findUserByLogin.php';
require 'src/db/findUserByRememberToken.php';
require 'src/db/setUserRememberToken.php';
require 'src/db/deleteUserRememberToken.php';

require 'src/model/buildGallery.php';

require 'src/form/uploadImage.php';

require 'src/auth/isGranted.php';
require 'src/auth/checkUser.php';
require 'src/auth/authenticateUser.php';
require 'src/auth/rememberUser.php';
require 'src/auth/denyAccessUnlessGranted.php';
require 'src/auth/getCsrfToken.php';
require 'src/auth/checkCsrfToken.php';

require 'src/session/startSession.php';
require 'src/session/setUserSession.php';
require 'src/session/destroySession.php';
