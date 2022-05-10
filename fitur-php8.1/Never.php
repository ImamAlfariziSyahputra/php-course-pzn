<?php

function stop(): never
{
  echo "Stop!" . PHP_EOL;
  exit();
}

stop();

echo 'echo ini gak bakal jalan..';
