<?php

namespace Drupal\api_data_block\Plugin\Block;
// Core BlockBase class to define a custom block.
use Drupal\Core\Block\BlockBase;
// Required for Dependency Injection.
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
// Symfony service container for Dependency Injection.
use Symfony\Component\DependencyInjection\ContainerInterface;
// Guzzle HTTP client for making external API requests.
use GuzzleHttp\ClientInterface;
// Exception handling for HTTP requests.
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
class ApiDataBlock extends BlockBase implements ContainerFactoryPluginInterface {

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
  public function __construct(array $configuration, $plugin_id, $plugin_definition, ClientInterface $http_client) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->httpClient = $http_client;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
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
  public function build() {
    $output = '<p>No data available.</p>';
    // Example API
    $url = 'https://jsonplaceholder.typicode.com/users';
    try {
      $response = $this->httpClient->request('GET', $url, ['timeout' => 5]);
      $data = json_decode($response->getBody(), TRUE);
      if (!empty($data)) {
        $output = '<ul>';
        foreach ($data as $user) {
          $output .= '<li>' . htmlspecialchars($user['name']) . ' (' . htmlspecialchars($user['email']) . ')</li>';
        }
        $output .= '</ul>';
      }
    }
    catch (RequestException $e) {
      $output = '<p>Failed to fetch data.</p>';
    }
    return [
      '#markup' => $output,
      // Ensures fresh data on every request.
      '#cache' => ['max-age' => 0],
    ];
  }

}
