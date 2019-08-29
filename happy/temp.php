<?php

    $pwd = 'admin';

    echo substr(sha1(md5($pwd)),3,25);

?>