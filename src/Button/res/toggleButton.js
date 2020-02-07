import {on} from '../../Foundation/res';
import './toggleButton.css';

on(
  document, 'click', '.toggle-button',
  function (e)
  {
    e.preventDefault();

    let button = e.delegateTarget;
    let checkedClasses = button.getAttribute('checked-class').split(' ');
    let checkEle = e.delegateTarget.querySelector('.toggle-button-checkbox');
    checkEle.checked = !checkEle.checked;
    if(checkEle.checked)
    {
      button.setAttribute('checked', '');
      if(checkedClasses.length)
      {
        button.classList.add.apply(button.classList, checkedClasses);
      }
    }
    else
    {
      button.removeAttribute('checked');
      if(checkedClasses.length)
      {
        button.classList.remove.apply(button.classList, checkedClasses);
      }
    }

    if('createEvent' in document)
    {
      let evt = document.createEvent('HTMLEvents');
      evt.initEvent('change', false, true);
      button.dispatchEvent(evt);
    }
  },
);
