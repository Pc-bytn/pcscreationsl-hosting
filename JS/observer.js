
const animation_elements = document.querySelectorAll('.animate-on-scroll');

const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
        // If the entry is intersecting (visible in viewport), add 'animate' class
        if (entry.isIntersecting) {
            entry.target.classList.add('animate');
        } else {
            // Otherwise, remove 'animate' class
            entry.target.classList.remove('animate');
        }
    });
}, {
    // Set the threshold for triggering the observer callback
    threshold: 0.5
});

// Observe each element in the NodeList
animation_elements.forEach((el) => {
    observer.observe(el);
});
