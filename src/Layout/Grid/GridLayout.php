<?php
namespace PackagedUi\Elegance\Layout\Grid;

use Packaged\Glimpse\Core\HtmlTag;
use Packaged\Glimpse\Tags\Div;

class GridLayout extends Div
{
  protected function _prepareForProduce(): HtmlTag
  {
    $ele = parent::_prepareForProduce();
    $ele->addClass('layout-grid');
    return $ele;
  }
}
