<?php

namespace Drupal\social_auth_apple\Settings;

use Drupal\social_auth\Settings\SettingsInterface;

/**
 * Defines an interface for Social Auth Apple settings.
 */
interface AppleAuthSettingsInterface extends SettingsInterface {

  /**
   * Gets the team ID.
   *
   * @return string|null
   *   getTeamId.
   */
  public function getTeamId() : string|null;

  /**
   * Gets the Key File ID.
   *
   * @return string|null
   *   getKeyFileId.
   */
  public function getKeyFileId() : string|null;

  /**
   * Gets the Key File Path.
   *
   * @return string|null
   *   get getKeyFilePath.
   */
  public function getKeyFilePath() : string|null;

}
