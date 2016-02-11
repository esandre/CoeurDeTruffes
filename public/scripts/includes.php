<?php
return array_merge(
        include(SCRIPT_PATH . "/models/includes.php"),
        include(SCRIPT_PATH . "/controllers/includes.php"),
        include(SCRIPT_PATH . "/ajax/includes.php"),
        include(SCRIPT_PATH . "/library/includes.php"),
        include(SCRIPT_PATH . "/views/includes.php")
        );
