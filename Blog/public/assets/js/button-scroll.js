const scrollToTopBtn = document.getElementById("scrollToTopBtn");

window.addEventListener("scroll", () => {
    // Show the button when scrolling down
    if (window.pageYOffset > 100) {
        scrollToTopBtn.classList.add("visible");
    } else {
        scrollToTopBtn.classList.remove("visible");
    }
});

scrollToTopBtn.addEventListener("click", () => {
    // Smooth scroll to the top of the page
    window.scrollTo({
        top: 0,
        behavior: "smooth"
    });
});
