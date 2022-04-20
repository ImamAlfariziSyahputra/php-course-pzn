<?php

var_dump(str_contains('Hello World', 'World')); //! true
var_dump(str_contains('Hello World', 'Hola')); //! false

var_dump(str_starts_with('Happy Birthday', 'Happy')); //! true
var_dump(str_starts_with('Happy Birthday', 'Birth')); //! false

var_dump(str_ends_with('Welcome Bro', 'ro')); //! true
var_dump(str_ends_with('Welcome Bro', 'Wel')); //! false