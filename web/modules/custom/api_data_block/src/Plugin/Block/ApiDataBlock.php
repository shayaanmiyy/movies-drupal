<?php

namespace Drupal\api_data_block\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use GuzzleHttp\ClientInterface;
use GuzzleHttp\Exception\RequestException;


/**
 * Provides a block that fetches data from an external API.
 *
 * @Block(
 *   id = "api_data_block",
 *   admin_label = @Translation("API Data Block"),
 *   category = @Translation("Custom")
 * )
 */
class ApiDataBlock extends BlockBase implements ContainerFactoryPluginInterface
{

  /**
   * The HTTP client service.
   *
   * @var \GuzzleHttp\ClientInterface
   */
  protected $httpClient;

  /**
   * Constructs an ApiDataBlock object.
   *
   * @param array $configuration
   *   A configuration array containing information about the plugin instance.
   * @param string $plugin_id
   *   The plugin ID for the block.
   * @param mixed $plugin_definition
   *   The plugin implementation definition.
   * @param \GuzzleHttp\ClientInterface $http_client
   *   The HTTP client service.
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, ClientInterface $http_client)
  {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->httpClient = $http_client;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition)
  {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('http_client')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function build()
  {
    $output = [
      '#type' => 'markup',
      '#markup' => $this->t('No data available.'),
    ];
    // Example API
    $url = 'https://jsonplaceholder.typicode.com/users';
    try {
      $response = $this->httpClient->request('GET', $url, ['timeout' => 5]);
      $data = json_decode($response->getBody(), TRUE);
      if (!empty($data)) {
        $items = [];
        foreach ($data as $user) {
          $items[] = $this->t('@name (@email)', [
            '@name' => $user['name'],
            '@email' => $user['email'],
          ]);
        }
        $output = [
          '#theme' => 'item_list',
          '#items' => $items,
          '#title' => $this->t('User List from API'),
        ];
      }
    } catch (RequestException $e) {
      $this->messenger->addError($this->t('Failed to fetch data from API.'));
    }
    return $output;
  }

}
