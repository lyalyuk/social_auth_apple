<?php

namespace Drupal\social_auth_apple\Controller;

use Drupal\Component\Plugin\Exception\PluginException;
use Drupal\social_auth\Controller\OAuth2ControllerBase;
use Drupal\social_auth\Plugin\Network\NetworkInterface;
use Firebase\JWT\JWT;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Response;

JWT::$leeway = 300;

/**
 * Manages requests to Apple API.
 */
class AppleAuthController extends OAuth2ControllerBase {

  /**
   * {@inheritdoc}
   */
  public function callback(NetworkInterface $network): RedirectResponse {
    $plugin_id = $this->dataHandler->get('plugin_id');
    try {
      /** @var \Drupal\social_auth\Plugin\Network\NetworkInterface $network */
      $network = $this->networkManager->createInstance($plugin_id);
    }
    catch (PluginException) {
      $this->messenger->addError($this->t('Log in failed. Please try again or contact site administrator.'));
      $this->loggerFactory->get('social_auth_pbs')->error("Log in failed. <br><br>Values to debug: %value", [
        '%value' => serialize($this->dataHandler->getSession()->all()),
      ]);
      return $this->redirect('user.login');
    }
    return parent::callback($network);
  }

  /**
   * {@inheritdoc}
   */
  public function redirectToProvider(NetworkInterface $network): Response {
    /** @var \Drupal\social_auth\Plugin\Network\NetworkInterface $network */
    $network = $this->networkManager->createInstance('social_auth_apple');
    $this->dataHandler->set('plugin_id', $network->getId());
    return parent::redirectToProvider($network);
  }

}
