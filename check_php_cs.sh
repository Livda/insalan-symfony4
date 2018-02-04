#!/bin/sh
vendor/bin/php-cs-fixer fix --config=.php_cs.dist --allow-risky yes --dry-run --diff --diff-format udiff
