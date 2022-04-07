"use strict";

/**
 *
 * Script : JavaScript
 * Ausführung am Ende 'defer'
 *
 *
 */

function init() {
  /**
   *
   * Funktion : getOnTouch
   * Fügt dem <body> Tag eine Klasse
   * für die Art der Klicks
   * Hover oder Touch
   *
   */
  getOnTouch();

  /**
   *
   * Selektiere alle <pre>
   *
   */
  const allPre = document.querySelectorAll("pre");

  for (const element of allPre) {
    /**
     *
     * Funktion : addButtonToPre
     * Fügt allen <pre> Tags einen <button> hinzu
     *
     */
    addButtonToPre(element);

    /**
     *
     * Funktion : clickButton
     * Klick-Event auf <button> im <pre> Bereich
     *
     */
    clickButton(element);
  }

  /**
   *
   * Funktion : addIconToLink
   * Fügt allen <p><a> Tags ein <i> hinzu
   *
   */
  const allP = document.querySelectorAll("p");

  for (const elemente of allP) {
    addIconToLink(elemente);
  }

  /**
   *
   * Funktion : openMenu(e)
   *
   */
  openMenu();

  /**
   *
   * Funktion : displaySearch(e)
   *
   */
  displaySearch();

  //cords();
}

/**
 *
 * Funktion : displaySearch
 * Klick-Event auf <i cass="search-icon">
 *
 */
function displaySearch() {
  /**
   *
   * Click-Event
   * Funktion : displaySearchBox
   *
   */
  const searchIcon = document.querySelector(".search-link");
  if (searchIcon) {
    searchIcon.addEventListener("click", displaySearchBox);
  }
}

/**
 *
 * Display
 * Funktion : displaySearchBox
 *
 */
function displaySearchBox(e) {
  const clickedButton = e.target;
  const clickedElement = clickedButton.closest(".search-link");

  if (clickedElement) {
    console.log(clickedElement);

    clickedElement.innerHTML = `<span class="icon-search"><i class="search-icon fas fa-search-minus"></i></span>`;

    const header = document.querySelector("header");
    const main = document.querySelector("main");
    const footer = document.querySelector("footer");
    const subMainNav = document.querySelector(".sub-main-nav");
    const subMainExtern = document.querySelector(".sub-main-extern");

    //main.style.setProperty("display", "none");
    /*main.style.setProperty("display", "none");
    header.style.setProperty("display", "none");*/

    main.style.setProperty("opacity", "0");
    if (subMainNav) {
      subMainNav.style.setProperty("opacity", "0");
    }
    footer.style.setProperty("opacity", "0");
    subMainExtern.style.setProperty("opacity", "0");

    clickedElement.classList.add("search-active");
    const searchBox = document.querySelector(".search-box");
    searchBox.classList.add("display-search");
  }
}

/**
 *
 * Funktion : openMenu
 * Klick-Event auf <i cass="bars-icon">
 *
 */
function openMenu() {
  /**
   *
   * Click-Event
   * Funktion : displayMenu
   *
   */
  const barsIcon = document.querySelector(".bars-link");
  if (barsIcon) {
    barsIcon.addEventListener("click", displayMenu);
  }
}

/**
 *
 * Display
 * Funktion : displayMenu
 *
 */
function displayMenu(e) {
  const clickedButton = e.target;
  const clickedElement = clickedButton.closest("span");

  if (clickedElement) {
    console.log(clickedElement);
    const nav_main = document.querySelector(".main-nav-full");
    nav_main.classList.add("display-main-nav-full");
  }
}

init();

function getOnTouch() {
  const bodyClass = document.querySelector("body");
  if ("ontouchstart" in window) {
    console.log("Browser mit touch-support");
    if (bodyClass.classList.contains("touch-support") === false) {
      bodyClass.classList.add("touch-support");
    }
    if (bodyClass.classList.contains("hover-support") === true) {
      bodyClass.classList.remove("hover-support");
    }
  } else {
    console.log("Browser ohne touch-support");
    if (bodyClass.classList.contains("touch-support") === true) {
      bodyClass.classList.remove("touch-support");
    }
    if (bodyClass.classList.contains("hover-support") === false) {
      bodyClass.classList.add("hover-support");
    }
  }
}

/**
 *
 * Funktion : addButtonToPre
 * Fügt allen <pre> Tags einen <button> hinzu
 *
 */
function addButtonToPre(element) {
  const new_button = document.createElement("button");
  new_button.classList.add("fas", "fa-copy");
  element.append(new_button);
  //element.appendChild(new_button);
}

/**
 *
 * Funktion : addIconToLink
 * Fügt allen <p><a> Tags ein <i> hinzu
 *
 */
function addIconToLink(elemente) {
  //console.log(elemente.childNodes[0]);
  //console.log(elemente.childNodes[0].nodeName);

  if (elemente.childNodes[0].nodeName === "A") {
    console.log("Link vorhanden");
    //elemente.childNodes[0].classList.add("fas", "fa-external-link-square-alt");
    // <i class="fas fa-desktop"></i><i class="fas fa-directions"></i><i class="fas fa-hands-helping"></i>
    elemente.childNodes[0].innerHTML = `<i class="link-icon fas fa-link"></i>${elemente.childNodes[0]}`;
  }

  /*const new_icon = document.querySelector(`${elemente} a`);

  if (new_icon) {
    console.log(elemente);
  }*/

  //new_icon.classList.add("fas", "fa-copy");
  //element.append(new_icon);
  //element.appendChild(new_button);
}

/**
 *
 * Funktion : clickButton
 * Klick-Event auf <button> im <pre> Bereich
 *
 */
function clickButton(element) {
  /**
   * Click-Event
   * Funktion : copyContentCode
   *
   */
  element.addEventListener("click", copyContentCode);
}

/**
 *
 * Funktion : copyContentCode
 * Kopiert aus <code> den Inhalt und kopiert ihm in das Clipboard
 *
 */
function copyContentCode(e) {
  const clickedButton = e.target;
  const clickedElement = clickedButton.closest("button");

  /**
   * if clicked <button>
   */
  if (clickedElement) {
    /**
     * Inhalt aus dem vorrangegangenen <code> Bereich
     * NACH : clipboard
     * previousElementSibling
     */

    navigator.clipboard.writeText(
      clickedElement.previousElementSibling.textContent
    );

    /**
     *
     * Füge dem <button> Bereich die Klasse 'clicked-button-ani' hinzu
     *
     */
    clickedElement.classList.add("clicked-button-ani");

    /**
     *
     * Füge dem <code> Bereich die Klasse 'copy-code-ani' hinzu
     * Oder wechselt zum Neustart zur Klasse 'copy-code-ani-reverse'
     *
     */

    const code = clickedElement.previousElementSibling.classList;

    if (code.contains("copy-code-ani") === true) {
      code.remove("copy-code-ani");
      code.add("copy-code-ani-reverse");
    } else {
      code.remove("copy-code-ani-reverse");
      code.add("copy-code-ani");
    }
  }
}

// https://www.delftstack.com/de/howto/javascript/javascript-copy-to-clipboard/

/**
 *
 * Entferne die Klasse 'clicked-button' vom aktiven <button> Bereich
 *
 */
function remove_clicked_button() {
  const activ_button = document.querySelectorAll(".clicked-button");

  activ_button.forEach(function (button) {
    //if (button.contains("clicked") === true) {
    //button.classList.remove("clicked-button");
    //}
  });
}

/**
 *
 * Entferne die Klasse 'clicked' vom aktiven <code> Bereich
 *
 */
function remove_clicked() {
  const activ = document.querySelectorAll(".clicked");

  activ.forEach(function (check) {
    //if (check.contains("clicked") === true) {
    //check.classList.remove("clicked");
    //}
  });
}

/**
 *
 * Funktion : DisplayIconNav
 *
 */
function DisplayIconNav() {
  const container = document.querySelector(".main-nav");
  const subNav = document.querySelector(".sub-main-nav");

  const containerHeight = container.offsetHeight;
  const subNavHeight = subNav.offsetHeight;
  const totalHeight = containerHeight + subNavHeight + 20;

  const main = document.querySelector("main");

  const divTop = `top-link`;
  const divBars = `bars-link`;
  const divSearch = `search-link`;
  //const divSearchBox = `search-box`;
  const displaySearchBox = `display-search`;

  if (window.scrollY >= screen.height - (screen.height / 100) * 80) {
    // bars
    if (!document.querySelector(`div.${divBars}`)) {
      const addBars = document.createElement("div");
      addBars.classList.add(divBars);

      console.log(totalHeight);

      addBars.style.setProperty("top", `${totalHeight}px`);

      addBars.innerHTML = `<span class="icon-bars"><i class="bars-icon fas fa-bars"></i></span>`;

      container.parentNode.appendChild(addBars);
    }

    // search
    if (!document.querySelector(`div.${divSearch}`)) {
      const addSearch = document.createElement(`div`);
      addSearch.classList.add(divSearch);
      addSearch.innerHTML = `<span class="icon-search"><i class="search-icon fas fa-search"></i></span>`;

      container.parentNode.appendChild(addSearch);
    }

    // to top
    if (!document.querySelector(`div.${divTop}`)) {
      const addToTop = document.createElement(`div`);
      addToTop.classList.add(`${divTop}`);
      addToTop.innerHTML = `<a href="#top"><i class="top-icon fas fa-angle-up"></i></a>`;

      container.parentNode.appendChild(addToTop);
    }
  } else {
    // search
    if (document.querySelector(`div.${divSearch}`)) {
      document.querySelector(`div.${divSearch}`).remove();
    }

    // search-form
    if (document.querySelector(`div.${displaySearchBox}`)) {
      document
        .querySelector(`div.${displaySearchBox}`)
        .classList.toggle("display-search");
      //document.querySelector(`div.${displaySearchBox}`).remove();
    }

    // bars
    if (document.querySelector(`div.${divBars}`)) {
      document.querySelector(`div.${divBars}`).remove();
    }

    // to top
    if (document.querySelector(`div.${divTop}`)) {
      document.querySelector(`div.${divTop}`).remove();
    }

    // main
    main.style.setProperty("opacity", "1");
  }
}

function changeNav() {
  const nav = document.querySelector(".main-nav");
  const sub_nav = document.querySelector(".sub-main-nav");
  if (sub_nav) {
    const rect = sub_nav.getBoundingClientRect();

    if (rect.top <= 0) {
      sub_nav.classList.add("sub-main-nav-top");
    } else {
      if (rect.top <= 100) {
        nav.classList.add("main-nav-hidden");
      } else {
        nav.classList.remove("main-nav-hidden");
      }
      sub_nav.classList.remove("sub-main-nav-top");
    }
  }
}

function changeSubNav() {
  const sub_nav = document.querySelector(".sub-main-nav");

  if (sub_nav) {
    const rect = sub_nav.getBoundingClientRect();

    const nav_main = document.querySelector(".main-nav");
    const nav_main_height = nav_main.offsetHeight;

    if (sub_nav.style.getPropertyValue("top") != nav_main_height + "px") {
      sub_nav.style.setProperty("top", "" + nav_main_height + "px");
      //sub_nav.style.setProperty("max-width", "100%");
    } else {
      //sub_nav.style.setProperty("max-width", "var(--wrapper-max-width)");
    }

    if (rect.top <= nav_main_height) {
      if (sub_nav.classList.contains("sub-main-nav-top") === false) {
        sub_nav.classList.add("sub-main-nav-top");
      }
    } else {
      if (sub_nav.classList.contains("sub-main-nav-top") === true) {
        sub_nav.classList.toggle("sub-main-nav-top");
      }
    }
  }
}

/**
 *
 * SCROLL EVENT
 *
 *
 */
function onScroll() {
  DisplayIconNav();
  changeNav();
  changeSubNav();
  openMenu();
  displaySearch();
}

window.addEventListener("scroll", onScroll, false);
