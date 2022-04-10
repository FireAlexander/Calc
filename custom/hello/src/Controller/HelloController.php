<?php

namespace Drupal\hello\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Returns responses for hello routes.
 */
class HelloController extends ControllerBase {

  /**
   * Builds the response.
   */
  public function build() {

    $build['content'] = [
      '#type' => 'markup',
      '#markup' => $this->t('Whats up!'),
    ];

    return $build;
  }

}
