<?php

namespace Drupal\vicgovau_demo\Plugin\ConfigFilter;

use Drupal\config_ignore\Plugin\ConfigFilter\IgnoreFilter;
use Drupal\Core\Config\StorageInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;

/**
 * Ignore all demo config.
 *
 * @ConfigFilter(
 *   id = "vicgovau_demo_config_ignore",
 *   label = "VicGovAu Demo Config Ignore",
 *   weight = 100
 * )
 */
class VicgovauDemoIgnoreFilter extends IgnoreFilter implements ContainerFactoryPluginInterface {

  /**
   * {@inheritdoc}
   */
  public function __construct(array $configuration, $plugin_id, array $plugin_definition, StorageInterface $active) {
    $configuration['ignored'] = ['*vicgovau_demo*'];
    parent::__construct($configuration, $plugin_id, $plugin_definition, $active);
  }

  /**
   * {@inheritdoc}
   */
  public function filterWrite($name, array $data) {
    if ($name === 'core.extension') {
      $excluded_modules = ['vicgovau_demo' => 'vicgovau_demo'];
      $data['module'] = array_diff_key($data['module'], $excluded_modules);
    }
    elseif ($this->matchConfigName($name)) {
      return NULL;
    }
    return $data;
  }

}
