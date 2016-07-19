<?php

namespace App\Helpers\Contracts;

Interface MessageContract {
  public function pushMessage($message, $level, $important);
}
