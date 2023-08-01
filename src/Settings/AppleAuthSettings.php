<?php

namespace Drupal\social_auth_apple\Settings;

use Drupal\social_auth\Settings\SettingsBase;

/**
 * Returns the client information.
 *
 * This is the class defined in the settings handler of the Network Plugin
 * definition. The immutable configuration used by this class is also declared
 * in the definition.
 *
 * @see \Drupal\social_auth_apple\Plugin\Network\AppleAuth
 */
class AppleAuthSettings extends SettingsBase implements AppleAuthSettingsInterface {

  /**
   * Client ID.
   *
   * @var string|null
   */
  protected ?string $clientId = NULL;

  /**
   * Team ID.
   *
   * @var string|null
   */
  protected ?string $teamId = NULL;

  /**
   * Key File ID.
   *
   * @var string|null
   */
  protected ?string $keyFileId = NULL;

  /**
   * Key File Path.
   *
   * @var string|null
   */
  protected ?string $keyFilePath = NULL;

  /**
   * {@inheritdoc}
   */
  public function getClientId(): string|null {
    if (!$this->clientId) {
      $this->clientId = $this->config->get('client_id');
    }
    return $this->clientId;
  }

  /**
   * {@inheritdoc}
   */
  public function getTeamId(): string|null {
    if (!$this->teamId) {
      $this->teamId = $this->config->get('team_id');
    }
    return $this->teamId;
  }

  /**
   * GetKeyFileId.
   */
  public function getKeyFileId(): string|null {
    if (!$this->keyFileId) {
      $this->keyFileId = $this->config->get('key_file_id');
    }
    return $this->keyFileId;
  }

  /**
   * GetKeyFilePath.
   */
  public function getKeyFilePath(): string|null {
    if (!$this->keyFilePath) {
      $this->keyFilePath = $this->config->get('key_file_path');
    }
    return $this->keyFilePath;
  }

}
