<?php

use App\Providers\Session;

Session::destroy();

header('Location: /');
exit();