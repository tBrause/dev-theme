function getOnTouch() {
  if ("ontouchstart" in window) {
    console.log("Browser mit touch-support");
    if (bodyClass.classList.contains("touch-support") === false) {
      bodyClass.classList.add("touch-support");
    }
    if (bodyClass.classList.contains("hover-support") === true) {
      bodyClass.classList.remove("hover-support");
    }
  } else {
    if (bodyClass.classList.contains("touch-support") === true) {
      bodyClass.classList.remove("touch-support");
    }
    if (bodyClass.classList.contains("hover-support") === false) {
      bodyClass.classList.add("hover-support");
    }
  }
}
