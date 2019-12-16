window.FusionUi = window.FusionUi || {};

(function (window, document, FusionUi) {

  FusionUi.on(
    document, 'click', '.drawer__toggle',
    function (e) {
      toggleDrawer(getDrawerContainer(e.target));
      e.stopPropagation();
      e.stopImmediatePropagation();
    }
  );
  FusionUi.on(
    document, 'click', 'a', function () {
      // if drawer reveal is modal, close drawer
      var drawers = document.querySelectorAll('.drawer');
      for(var i = 0; i < drawers.length; i++)
      {
        if(drawers.hasOwnProperty(i))
        {
          var drawer = drawers[i];
          if(drawer.getAttribute('reveal') === 'modal' // if drawer is modal
            || document.body.clientWidth < 600) // or client width less than 600px
          {
            closeDrawer(drawers[i].parentNode);
          }
        }
      }
    }
  );

  FusionUi.on(
    document, 'click', '.drawer-container.drawer--open > .drawer-app-content',
    function (e) {
      if(e.target.matches('.drawer-app-content'))
      {
        var style = window.getComputedStyle(e.target, "::before");
        if(style.getPropertyValue('opacity') === '1')
        {
          var container = FusionUi.closest(e.target, '.drawer-container');
          var drawer = container.querySelector('.drawer');
          var storageKey = 'drawer--open-' + drawer.getAttribute('position');

          container.classList.remove('drawer--open');
          localStorage.setItem(storageKey, '0');
        }
      }
    }
  );

  function getDrawerContainer(target) {
    var container = FusionUi.closest(target, '.drawer-container');
    if(!container)
    {
      // button not inside a drawer, get first drawer
      container = document.querySelector('.drawer-container');
    }
    return container;
  }

  function toggleDrawer(container) {
    // find parent
    if(container)
    {
      if(container.classList.contains('drawer--open'))
      {
        closeDrawer(container);
      }
      else
      {
        openDrawer(container);
      }
    }
  }

  function openDrawer(container) {
    var drawer = container.querySelector('.drawer');
    var storageKey = 'drawer--open-' + drawer.getAttribute('position');
    container.classList.add('drawer--open');
    localStorage.setItem(storageKey, '1');
  }

  function closeDrawer(container) {
    var drawer = container.querySelector('.drawer');
    var storageKey = 'drawer--open-' + drawer.getAttribute('position');
    container.classList.remove('drawer--open');
    localStorage.setItem(storageKey, '0');
  }

}(window, document, window.FusionUi));
