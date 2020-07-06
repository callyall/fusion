<?php
namespace PackagedUi\Fusion\Layout\Grid;

use Packaged\Glimpse\Tags\Div;
use Packaged\Ui\Html\HtmlElement;
use PackagedUi\BemComponent\BemComponentTrait;
use PackagedUi\Fusion\Component;
use PackagedUi\Fusion\ComponentTrait;

class GridCell extends Div implements Component
{
  use BemComponentTrait;
  use ComponentTrait;

  public function __construct(...$content)
  {
    parent::__construct(...$content);
    $this->_constructComponent();
    $this->_construct(...$content);
  }

  public function getBlockName(): string
  {
    return 'grid__cell';
  }

  const ALIGN_TOP = 'align-top';
  const ALIGN_MIDDLE = 'align-middle';
  const ALIGN_BOTTOM = 'align-bottom';

  protected $_sizes = [];

  protected function _prepareForProduce(): HtmlElement
  {
    $ele = parent::_prepareForProduce();

    foreach($this->_sizes as $device => $span)
    {
      $ele->addClass($this->getModifier('span-' . $span . (empty($device) ? '' : '-' . $device)));
    }

    return $ele;
  }

  public function alignTop()
  {
    return $this->addModifier(self::ALIGN_TOP);
  }

  public function alignMiddle()
  {
    return $this->addModifier(self::ALIGN_MIDDLE);
  }

  public function alignBottom()
  {
    return $this->addModifier(self::ALIGN_BOTTOM);
  }

  public function span(int $columns)
  {
    return $this->addModifier($columns);
  }
}
