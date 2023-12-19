<?php

use classes\Session;

Session::destroy();

header('Location: /');
exit();