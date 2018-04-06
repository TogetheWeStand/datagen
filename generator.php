<?php

/**
 * This start file for test data generator.
 * Envisaged two modes for start this script - cli and fpm.
 *
 * For start in cli mode type in command line - php generator.php 'n',
 * where 'n' it is a number of sets of test data need to be generate.
 *
 * For start in fpm mode type in request string of browser -
 * <host domain>/generator.php/?count='n', where 'n' it is a number
 * of sets of test data need to be generate.
 *
 * Schema must be saved in schema.json file in root directory of
 * application.
 *
 * Generated data will be located in
 * <schema name in lower case without underscores and spaces>.json
 * in root directory of application.
 */

declare(strict_types = 1);

namespace Esizov\Datagen;

use Esizov\Datagen\base\Process;

include_once('includes.php');

(new Process())->gen((int)$argv['1'], 'schema.json');