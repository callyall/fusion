<?php
namespace PackagedUi\FusionDemo\Elements;

use Packaged\Dispatch\ResourceManager;
use Packaged\Glimpse\Tags\LineBreak;
use Packaged\Glimpse\Tags\Text\HeadingTwo;
use PackagedUi\FontAwesome\FaIcon;
use PackagedUi\Fusion\Layout\Grid\GridCell;
use PackagedUi\Fusion\Layout\Grid\GridInner;
use PackagedUi\Fusion\Layout\Grid\GridLayout;
use PackagedUi\FusionDemo\AbstractDemoPage;

class GridDemo extends AbstractDemoPage
{
  public function getName(): string
  {
    return 'Grid';
  }

  protected function _getFaIcon()
  {
    return FaIcon::GRIP_HORIZONTAL;
  }

  public function __construct()
  {

    ResourceManager::inline()->requireCss(
      "
    .grid{
      background: rgba(0,0,0,.2);
      min-width: 360px;
    }
    
    .grid__cell{
      background: rgba(0,0,0,.2);
      min-height: 20px;
    }
    
    .alignment-demo, .alignment-demo .grid__inner{
      min-height: 20px;
    }
    
    .alignment-demo .grid__cell{
      min-height: 20px;
      max-height: 50px;
    }
    "
    );
  }

  protected function _content(): array
  {
    $return = [];

    $twelve = [
      GridCell::create("ONE"),
      GridCell::create("TWO"),
      GridCell::create("THREE"),
      GridCell::create("FOUR"),
      GridCell::create("FIVE"),
      GridCell::create("SIX"),
      GridCell::create("SEVEN"),
      GridCell::create("EIGHT"),
      GridCell::create("NINE"),
      GridCell::create("TEN"),
      GridCell::create("ELEVEN"),
      GridCell::create("TWELVE"),
    ];
    $return[] = LineBreak::create();
    $return[] = HeadingTwo::create("Default Grid");
    $return[] = GridLayout::createWithInner(...$twelve);

    $return[] = LineBreak::create();
    $return[] = HeadingTwo::create("Default Grid Span Columns");
    $return[] = GridLayout::createWithInner(
      GridCell::create("ONE")->span(1),
      GridCell::create("TWO")->span(2),
      GridCell::create("ONE")->span(1),
      GridCell::create("TWO")->span(2),
      GridCell::create("ONE")->span(1),
      GridCell::create("TWO")->span(2),
      GridCell::create("THREE")->span(3),
      GridCell::create("ONE")->span(1),
      GridCell::create("TWO")->span(2),
      GridCell::create("THREE")->span(3)
    );

    $return[] = LineBreak::create();
    $return[] = HeadingTwo::create("Fixed Grid");
    $return[] = GridLayout::createWithInner(...$twelve)->setFixed();

    $return[] = LineBreak::create();
    $return[] = HeadingTwo::create("Fixed Grid 4");
    $return[] = GridLayout::createWithInner(...$twelve)->setFixed(4);

    $return[] = LineBreak::create();
    $return[] = HeadingTwo::create("Fixed Grid 6");
    $return[] = GridLayout::createWithInner(...$twelve)->setFixed(6);

    $return[] = LineBreak::create();
    $return[] = HeadingTwo::create("Fixed Grid 8");
    $return[] = GridLayout::createWithInner(...$twelve)->setFixed(8);

    $return[] = LineBreak::create();
    $return[] = HeadingTwo::create("Fixed Grid 12");
    $return[] = GridLayout::createWithInner(...$twelve)->setFixed(12);

    $return[] = LineBreak::create();
    $return[] = HeadingTwo::create("Fixed Grid Span Columns");
    $return[] = GridLayout::createWithInner(
      GridCell::create("ONE")->span(1),
      GridCell::create("TWO")->span(2),
      GridCell::create("THREE")->span(3),
      GridCell::create("FOUR")->span(4)
    )->setFixed();
    $return[] = LineBreak::create();
    $return[] = GridLayout::createWithInner(
      GridCell::create("ONE")->span(1),
      GridCell::create("TWO")->span(2),
      GridCell::create("ONE")->span(1),
      GridCell::create("TWO")->span(2),
      GridCell::create("ONE")->span(1),
      GridCell::create("TWO")->span(2),
      GridCell::create("THREE")->span(3),
      GridCell::create("ONE")->span(1),
      GridCell::create("TWO")->span(2),
      GridCell::create("THREE")->span(3)
    )->setFixed();

    $return[] = LineBreak::create();
    $return[] = GridLayout::createWithInner(
      GridCell::create("ONE"),
      GridCell::create("TWO")
    );

    $return[] = LineBreak::create();

    $return[] = GridLayout::createWithCells(
      "ONE",
      "TWO"
    )->autoFit();

    $return[] = LineBreak::create();

    $return[] = GridLayout::createWithInner(
      GridCell::create(""),
      GridCell::create(""),
      GridCell::create(""),
      GridCell::create(""),
      GridCell::create(""),
      GridCell::create(""),
      GridCell::create("")
    );

    $return[] = LineBreak::create();

    $return[] = GridLayout::createWithInner(
      GridCell::create("")->alignTop(),
      GridCell::create("")->alignMiddle(),
      GridCell::create("")->alignBottom()
    )->autoFit()->addClass('alignment-demo');

    $return[] = LineBreak::create();

    $return[] = GridLayout::create(
      GridInner::create(
        GridCell::create(
          GridInner::create(
            GridCell::create("Second Level"),
            GridCell::create("Second Level")
          )
        ),
        GridCell::create("First Level"),
        GridCell::create("First Level")
      )
    );

    $return[] = LineBreak::create();

    $return[] = GridLayout::createWithInner(
      GridCell::create(""),
      GridCell::create("")
    );

    $return[] = LineBreak::create();

    $return[] = GridLayout::create(
      GridInner::create(
        GridCell::create(""),
        GridCell::create(""),
        GridCell::create("")
      )->bordered()
    );

    return $return;
  }
}
