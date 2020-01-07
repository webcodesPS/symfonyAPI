<?php

namespace App\Entity;

use Symfony\Component\Security\Core\User\UserInterface;

class User implements UserInterface
{
  const ROLE_DEFAULT = 'ROLE_USER';

  const ROLE_SUPER_ADMIN = 'ROLE_SUPER_ADMIN';

  protected $id;

  protected $username;

  protected $usernameCanonical;

  protected $email;

  protected $emailCanonical;

  protected $enabled;

  protected $salt;

  protected $password;

  protected $plainPassword;

  protected $lastLogin;

  protected $confirmationToken;

  protected $passwordRequestedAt;

  protected $roles;

  public function __construct()
  {
    $this->enabled = false;
    $this->roles = array();
  }

  public function __toString()
  {
    return (string)$this->getUsername();
  }

  public function addRole($role)
  {
    $role = strtoupper($role);
    if ($role === static::ROLE_DEFAULT) {
      return $this;
    }

    if (!in_array($role, $this->roles, true)) {
      $this->roles[] = $role;
    }

    return $this;
  }

  public function serialize()
  {
    return serialize(array(
      $this->password,
      $this->salt,
      $this->usernameCanonical,
      $this->username,
      $this->enabled,
      $this->id,
      $this->email,
      $this->emailCanonical,
    ));
  }

  public function unserialize($serialized)
  {
    $data = unserialize($serialized);

    if (13 === count($data)) {
      // Unserializing a User object from 1.3.x
      unset($data[4], $data[5], $data[6], $data[9], $data[10]);
      $data = array_values($data);
    } elseif (11 === count($data)) {
      // Unserializing a User from a dev version somewhere between 2.0-alpha3 and 2.0-beta1
      unset($data[4], $data[7], $data[8]);
      $data = array_values($data);
    }

    list(
      $this->password,
      $this->salt,
      $this->usernameCanonical,
      $this->username,
      $this->enabled,
      $this->id,
      $this->email,
      $this->emailCanonical
      ) = $data;
  }

  public function eraseCredentials()
  {
    // If you store any temporary, sensitive data on the user, clear it here
    // $this->plainPassword = null;
  }

  public function getId()
  {
    return $this->id;
  }

  public function getUsername()
  {
    return (string) $this->email;
  }

  public function getUsernameCanonical()
  {
    return $this->usernameCanonical;
  }

  public function getSalt()
  {
    // not needed when using the "bcrypt" algorithm in security.yaml
  }

  public function getEmail()
  {
    return $this->email;
  }

  public function getEmailCanonical()
  {
    return $this->emailCanonical;
  }

  public function getPassword()
  {
    return $this->password;
  }

  public function getPlainPassword()
  {
    return $this->plainPassword;
  }

  public function getLastLogin()
  {
    return $this->lastLogin;
  }

  public function getConfirmationToken()
  {
    return $this->confirmationToken;
  }

  public function isAccountNonExpired()
  {
    return true;
  }

  public function isAccountNonLocked()
  {
    return true;
  }

  public function isCredentialsNonExpired()
  {
    return true;
  }

  public function isEnabled()
  {
    return $this->enabled;
  }

  public function isSuperAdmin()
  {
    return $this->hasRole(static::ROLE_SUPER_ADMIN);
  }

  public function hasRole($role)
  {
    return in_array(strtoupper($role), $this->getRoles(), true);
  }

  public function removeRole($role)
  {
    if (false !== $key = array_search(strtoupper($role), $this->roles, true)) {
      unset($this->roles[$key]);
      $this->roles = array_values($this->roles);
    }

    return $this;
  }

  public function setUsername($username)
  {
    $this->username = $username;

    return $this;
  }

  public function setUsernameCanonical($usernameCanonical)
  {
    $this->usernameCanonical = $usernameCanonical;

    return $this;
  }

  public function setSalt($salt)
  {
    $this->salt = $salt;

    return $this;
  }

  public function setEmail($email)
  {
    $this->email = $email;

    return $this;
  }

  public function setEmailCanonical($emailCanonical)
  {
    $this->emailCanonical = $emailCanonical;

    return $this;
  }

  public function setEnabled($boolean)
  {
    $this->enabled = (bool)$boolean;

    return $this;
  }

  public function setPassword($password)
  {
    $this->password = $password;

    return $this;
  }

  public function setSuperAdmin($boolean)
  {
    if (true === $boolean) {
      $this->addRole(static::ROLE_SUPER_ADMIN);
    } else {
      $this->removeRole(static::ROLE_SUPER_ADMIN);
    }

    return $this;
  }

  public function setPlainPassword($password)
  {
    $this->plainPassword = $password;

    return $this;
  }

  public function setLastLogin(\DateTime $time = null)
  {
    $this->lastLogin = $time;

    return $this;
  }

  public function setConfirmationToken($confirmationToken)
  {
    $this->confirmationToken = $confirmationToken;

    return $this;
  }

  public function setPasswordRequestedAt(\DateTime $date = null)
  {
    $this->passwordRequestedAt = $date;

    return $this;
  }

  public function getPasswordRequestedAt()
  {
    return $this->passwordRequestedAt;
  }

  public function isPasswordRequestNonExpired($ttl)
  {
    return $this->getPasswordRequestedAt() instanceof \DateTime &&
      $this->getPasswordRequestedAt()->getTimestamp() + $ttl > time();
  }

  public function setRoles(array $roles)
  {
    $this->roles = array();

    foreach ($roles as $role) {
      $this->addRole($role);
    }

    return $this;
  }

  public function getRoles()
  {
    $roles = $this->roles;

    // we need to make sure to have at least one role
    $roles[] = static::ROLE_DEFAULT;

    return array_unique($roles);
  }
}
