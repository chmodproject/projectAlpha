<?php
// cli-config.php
require_once "bootstrap.php";

return \Doctrine\ORM\Tools\Console\ConsoleRunner::createHelperSet($entityManager);

# vendor/bin/doctrine orm:schema-tool:drop --force
# vendor/bin/doctrine orm:schema-tool:create
# vendor/bin/doctrine orm:schema-tool:create --dump-sql
# vendor/bin/doctrine orm:schema-tool:update
# vendor/bin/doctrine orm:generate:entities src
# vendor/bin/doctrine orm:generate:entities --generate-annotations=1 src
# vendor/bin/doctrine orm:generate:entities /var/www/html/projectx/src
