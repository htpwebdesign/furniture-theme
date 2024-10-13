
//JS for accordions on faq page
document.addEventListener("DOMContentLoaded", function(event) { 

    const accordions = document.querySelectorAll('.accordion');

    accordions.forEach(accordion => {
        accordion.addEventListener('click', function() {
            // Toggle the active state for the clicked accordion
            this.classList.toggle('active');

            // Get the next element (the content div) and toggle its visibility
            const content = this.nextElementSibling;
            
            if (content.classList.contains('show')) {
                content.classList.remove('show');
                content.style.maxHeight = null;
            } else {
                content.classList.add('show');
                content.style.maxHeight = content.scrollHeight + "px"; // Dynamically set height
            }
        });
    });
});