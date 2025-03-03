<script>
    document.addEventListener('DOMContentLoaded', function () {
        const menuToggle = document.querySelector('.menu-toggle');
        const menu = document.querySelector('.menu');

        // Toggle the menu when the hamburger button is clicked
        menuToggle.addEventListener('click', function(e) {
            menu.classList.toggle('active');
            // Prevent the click event from bubbling up to the document
            e.stopPropagation();
        });

        // Close the menu if click occurs outside of the menu or toggle button
        document.addEventListener('click', function(e) {
            if (menu.classList.contains('active')) {
                if (!menu.contains(e.target) && !menuToggle.contains(e.target)) {
                    menu.classList.remove('active');
                }
            }
        });
    });


</script>