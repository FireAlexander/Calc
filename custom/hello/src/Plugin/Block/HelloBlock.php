<?php
/**
 * @file
 * Contains \Drupal\hello\Plugin\Block\CustomBlock.
 */
namespace Drupal\hello\Plugin\Block;

use Drupal\Core\Block\BlockBase;
/**
 * Provides a hello_block.
 *
 * @Block(
 *   id = "hello_block",
 *   admin_label = @Translation("Hello block"),
 *   category = @Translation("Hello block example")
 * )
 */

class HelloBlock extends BlockBase {
  /**
   * {@inheritdoc}
   */
  public function build () {
    return [
      '#theme' => 'hello_block',
      '#data' => ['age' => '31', 'DOB' => '10 March 1984'],
    ];
  }
}
