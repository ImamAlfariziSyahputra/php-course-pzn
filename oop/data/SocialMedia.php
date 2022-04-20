<?php

class SocialMedia
{
  public string $name;
}

class Facebook extends SocialMedia
{
  public function login(string $username, string $pasword)
  {
    return true;
  }
}

class FakeFacebook extends Facebook
{
  public function login(string $username, string $pasword)
  {
    return false;
  }
}
