<?php
http_response_code(404);
set_include_path(get_include_path() . PATH_SEPARATOR . 'path/to/your/includes');
// provide your own HTML for the error page
die();
