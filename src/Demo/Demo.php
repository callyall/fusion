<?php
namespace PackagedUi\Fusion\Demo;

use Cubex\Context\ContextAware;
use Cubex\Context\ContextAwareTrait;
use Packaged\Dispatch\Component\DispatchableComponent;
use Packaged\Dispatch\Dispatch;
use Packaged\Dispatch\ResourceManager;
use Packaged\Dispatch\ResourceStore;
use Packaged\Http\Response;
use PackagedUi\Fusion\Fusion;

class Demo implements ContextAware, DispatchableComponent
{
  use ContextAwareTrait;

  public function render()
  {
    Fusion::includeGoogleFont();
    $rm = ResourceManager::component(new Fusion());
    $rm->requireCss(Fusion::FILE_BASE_CSS);
    $rm->requireJs(Fusion::FILE_BASE_JS);

    $rendered = '';

    $elements = [];
    $elements['typography'] = new TypographyDemo();
    $elements['layout'] = new LayoutDemo();
    $elements['theme'] = new ThemeDemo();
    $elements['button'] = new ButtonDemo();
    $elements['badge'] = new BadgeDemo();
    $elements['grid'] = new GridDemo();
    $elements['table'] = new TableDemo();
    $elements['card'] = new CardDemo();
    $elements['progress'] = new ProgressDemo();
    $elements['drawer'] = new DrawerDemo();
    $elements['list'] = new ListDemo();
    $elements['menu'] = new MenuDemo();
    $elements['tile'] = new TileDemo();

    $exclude = ['drawer'];

    $path = ltrim($this->getContext()->request()->path(1), '/');
    switch($path)
    {
      case "":
        foreach($elements as $k => $class)
        {
          if(!in_array($k, $exclude))
          {
            $rendered .= $class->produceSafeHTML()->getContent();
            $rendered .= '<br/>';
          }
        }
        break;
      default:
        if(isset($elements[$path]))
        {
          $rendered .= $elements[$path]->produceSafeHTML()->getContent();
        }
        break;
    }

    $content = '<!doctype html> <html> <head>'
      . '<meta charset="UTF-8"> <meta name="viewport" content="width=device-width, initial-scale=1"> '
      . Dispatch::instance()->store()->generateHtmlIncludes(ResourceStore::TYPE_CSS)
      . ' </head> <body class="demo-page"> '
      . $rendered
      . Dispatch::instance()->store()->generateHtmlIncludes(ResourceStore::TYPE_JS)
      . ' </body></html>';
    return Response::create($content);
  }

  public function getResourceDirectory()
  {
    return __DIR__;
  }
}
