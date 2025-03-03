<style>

    /* Common styles for the navigation menu */
    .menu {
        background-color: royalblue; /* King blue background */
        color: white;
    }

    /* Mobile styles: hamburger style with fixed nav */
    .menu {
        display: none; /* Hidden by default on mobile */
        position: fixed; /* Fixed on top */
        top: 50px; /* Adjust based on your header height or hamburger button height */
        right: 0;
        width: 200px;
        padding: 10px 0;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        z-index: 1000;
    }

    /* When the menu is active, show it */
    .menu.active {
        display: block;
    }

    /* Style for the links inside the mobile menu */
    .menu a {
        display: block;
        padding: 10px 20px;
        color: white;
        text-decoration: none;
        transition: background-color 0.3s ease;
    }

    /* Hover effect for mobile links */
    .menu a:hover {
        background-color: darkblue;
    }

    /* Hamburger button styling */
    .menu-toggle {
        background: none;
        border: none;
        font-size: 28px;
        cursor: pointer;
        color: royalblue;
        padding: 10px;
        position: fixed;
        top: 0;
        right: 0;
        z-index: 1001; /* ensure button is above menu */
    }

    /* Desktop (non-hamburger) nav style */
    @media (min-width: 768px) {
        .menu-toggle {
            display: none; /* Hide hamburger button on larger screens */
        }
        .menu {
            display: flex;       /* Show menu as a horizontal bar */
            position: fixed;     /* Fixed at the top */
            top: 0;
            left: 0;
            right: 0;
            width: 100%;
            padding: 0;
            box-shadow: none;
            justify-content: center;  /* Center links horizontally */
            z-index: 1000;
        }
        .menu a {
            display: inline-block;
            padding: 15px 20px;
            color: white;
        }
        .menu a:hover {
            background-color: darkblue;
        }
    }


</style>