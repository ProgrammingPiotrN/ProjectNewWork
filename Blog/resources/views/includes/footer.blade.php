<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

<footer class="bg-white py-4 md:py-10">
    <div class="p-10 text-black">
        <div class="max-w-7xl mx-auto text-center">
            <div class="mb-5">
                {{ __('footer.copyright') }} <a href="https://github.com/ProgrammingPiotrN"><strong><span>Piotr Nawrocki</span></strong></a> {{ __('footer.reserved') }}
            </div>
        </div>
    </div>

    <button id="scrollToTopBtn" class="fixed bottom-10 right-10 bg-blue-500 hover:bg-blue-700 text-white font-bold py-4 px-6 rounded">
        <ion-icon name="arrow-up-outline"></ion-icon>
    </button>
</footer>

<script>
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
</script>
