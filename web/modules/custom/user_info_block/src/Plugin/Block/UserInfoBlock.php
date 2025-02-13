<?php

namespace Drupal\user_info_block\Plugin\Block;

use Drupal\Core\Block\BlockBase;
use Drupal\Core\Session\AccountInterface;
use Drupal\user\Entity\User;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Datetime\DateFormatterInterface;

/**
 * Provides a 'User Info' block.
 *
 * @Block(
 *   id = "user_info_block",
 *   admin_label = @Translation("User Info Block"),
 *   category = @Translation("Custom")
 * )
 */
class UserInfoBlock extends BlockBase implements ContainerFactoryPluginInterface {

  /**
   * The current user.
   *
   * @var \Drupal\Core\Session\AccountInterface
   */
  protected $currentUser;

  /**
   * The date formatter service.
   *
   * @var \Drupal\Core\Datetime\DateFormatterInterface
   */
  protected $dateFormatter;

  /**
   * Constructs a new UserInfoBlock instance.
   *
   * @param array $configuration
   *   A configuration array containing information about the plugin instance.
   * @param string $plugin_id
   *   The plugin ID for the block.
   * @param mixed $plugin_definition
   *   The plugin implementation definition.
   * @param \Drupal\Core\Session\AccountInterface $current_user
   *   The current user service.
   * @param \Drupal\Core\Datetime\DateFormatterInterface $date_formatter
   *   The date formatter service.
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, AccountInterface $current_user, DateFormatterInterface $date_formatter) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->currentUser = $current_user;
    $this->dateFormatter = $date_formatter;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('current_user'),
      $container->get('date.formatter')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function build() {
    $user = User::load($this->currentUser->id());
    if ($user) {
      $username = $user->getDisplayName();
      $created_time = $user->getCreatedTime();
      $formatted_date = $this->dateFormatter->format($created_time, 'custom', 'Y-m-d H:i:s');
      return [
        '#markup' => $this->t('Username: @username<br>Account Created: @date', [
          '@username' => $username,
          '@date' => $formatted_date,
        ]),
        // Ensures the block always updates dynamically.
        '#cache' => ['max-age' => 0],
      ];
    }
    return ['#markup' => $this->t('No user information available.')];
  }

}
