<?php

namespace Drupal\Tests\quicktabs\Kernel;

use Drupal\quicktabs\Entity\QuickTabsInstance;
use Drupal\Tests\SchemaCheckTestTrait;
use Drupal\KernelTests\KernelTestBase;

/**
 * Tests the quicktabs config schema.
 *
 * @group quicktabs
 */
class QuicktabsConfigSchemaTest extends KernelTestBase {

  use SchemaCheckTestTrait;

  /**
   * {@inheritdoc}
   */
  protected static $modules = [
    'quicktabs',
  ];

  /**
   * Tests the block config schema for block plugins.
   */
  public function testBlockConfigSchema() {
    $typedConfig = \Drupal::service('config.typed');
    $tabTypeManager = \Drupal::service('plugin.manager.tab_type');

    foreach ($tabTypeManager->getDefinitions() as $ignored) {
      $id = strtolower($this->randomMachineName());
      $quicktabs = QuickTabsInstance::create([
        'id' => $id,
        'langcode' => 'es',
        'status' => TRUE,
        'dependencies' => [],
        'label' => 'test',
        'renderer' => 'quick_tabs',
        'options' => [
          'accordion_tabs' => [
            'jquery_ui' => [
              'collapsible' => FALSE,
              'heightStyle' => 'auto',
            ],
          ],
          'quick_tabs' => [
            'ajax' => FALSE,
          ],
        ],
        'hide_empty_tabs' => TRUE,
        'default_tab' => 1,
        'configuration_data' => [
          [
            'title' => 'tab 1',
            'weight' => 0,
            'type' => 'block_content',
            'content' => [
              'view_content' => [
                'options' => [
                  'vid' => 'block_content',
                  'display' => 'default',
                  'args' => '',
                ],
              ],
              'node_content' => [
                'options' => [
                  'nid' => '',
                  'view_mode' => 'full',
                  'hide_title' => TRUE,
                ],
              ],
              'block_content' => [
                'options' => [
                  'bid' => 'some_block_here',
                  'block_title' => 'abc',
                  'display_title' => TRUE,
                ],
              ],
              'qtabs_content' => [
                'options' => [
                  'machine_name' => '',
                ],
              ],
            ],
          ],
          [
            'title' => 'tab 2',
            'weight' => 0,
            'type' => 'node_content',
            'content' => [
              'view_content' => [
                'options' => [
                  'vid' => 'block_content',
                  'display' => 'default',
                  'args' => '',
                ],
              ],
              'node_content' => [
                'options' => [
                  'nid' => '1',
                  'view_mode' => 'full',
                  'hide_title' => FALSE,
                ],
              ],
              'block_content' => [
                'options' => [
                  'bid' => 'some_block_here',
                  'block_title' => 'abc',
                  'display_title' => TRUE,
                ],
              ],
              'qtabs_content' => [
                'options' => [
                  'machine_name' => '',
                ],
              ],
            ],
          ],
        ],
      ]);
      $quicktabs->save();
      $config = $this->config("quicktabs.quicktabs_instance.$id");
      $this->assertEquals($config->get('id'), $id);
      $this->assertConfigSchema($typedConfig, $config->getName(), $config->get());
    }
  }

}
