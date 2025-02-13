<?php

namespace Drupal\hello_world\Plugin\Block;

use Drupal\Core\Block\BlockBase;

/**
 * Provides a 'Hello World' Block.
 *
 * @Block(
 *   id = "hello_world_block",
 *   admin_label = @Translation("Hello World Block"),
 * )
 */
class HelloWorldBlock extends BlockBase {

  /**
   * {@inheritdoc}
   */
  public function build() {
    return [
      '#markup' => $this->t('Hello Shayaan, World!'),
    ];
  }

}
