<?php

class Address
{
  public ?string $country;
}

class User
{
  public ?Address $address;
}

//! Checking Null with Old Way (deprecated)
// function getCountry(?User $user): ?string
// {
//   if ($user != null) {
//     if ($user->address != null) {
//       return $user->address->country;
//     }
//   }

//   return null;
// }

function getCountry(?User $user): ?string
{
  //! it will return null if "$user" or "$address" is null
  return $user?->address?->country;
}



var_dump(getCountry(null));
