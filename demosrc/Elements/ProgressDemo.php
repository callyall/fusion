<?php
namespace PackagedUi\FusionDemo\Elements;

use PackagedUi\Fusion\Progress\ProgressBar;
use PackagedUi\FusionDemo\DemoSection;

class ProgressDemo extends DemoSection
{
  protected function _content(): array
  {
    $return = [];
    $return[] = ProgressBar::create(50);
    return $return;
  }
}