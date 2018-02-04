<?php
/**
 * @file
 * lagoon Drupal 8 production environment configuration file.
 *
 * This file will only be included on production environments.
 *
 * It contains some defaults that the lagoon team suggests, please edit them as required.
 */

// Don't show any error messages on the site (will still be shown in watchdog)
$config['system.logging']['error_level'] = 'hide';

// Expiration of cached pages on Varnish to 15 min
$config['system.performance']['cache']['page']['max_age'] = 900;

// Aggregate CSS files on
$config['system.performance']['css']['preprocess'] = 1;

// Aggregate JavaScript files on
$config['system.performance']['js']['preprocess'] = 1;

// Disabling stage file proxy on production, with that the module can be enabled even on production
$config['stage_file_proxy.settings']['origin'] = false;

// Shield config.
$config['shield.settings']['user'] = 'dpc';
$config['shield.settings']['pass'] = 'sdp';

$config['config_split.config_split.stage']['status'] = TRUE;

// Environment indicator color override.
$config['environment_indicator.indicator']['name'] = 'STAGE';
