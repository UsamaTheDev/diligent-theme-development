const hamburger = document.querySelector(".humberger-menu");
const menu = document.querySelector(".main-menu");
const rightMenu = document.querySelector(".right-menu");
const header = document.querySelector("header");

hamburger.addEventListener("click", () => {
	menu.classList.toggle("active");
	// menu.style.height = "100%";
	rightMenu.classList.toggle("active");
	// rightMenu.style.height = "50%";
	header.classList.toggle("full-screen-menu");
	hamburger.classList.toggle("humberger-menu-open");
});
