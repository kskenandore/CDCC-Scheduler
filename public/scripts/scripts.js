function dividerColor() {
    divider = document.getElementById('nav-divider');
    page = document.title;

    if (page == 'Reservations') {
        divider.style.background = "rgb(137, 213, 255)";
    }
    else if (page == 'Customers') {
        divider.style.background = "rgb(134, 252, 123)";
    }
    else if (page == 'Organizations') {
        divider.style.background = "rgb(210, 127, 255)";
    }
    else if (page == 'Venues') {
        divider.style.background = "rgb(255, 93, 91)";
    }
    else if (page == 'Caterers') {
        divider.style.background = "rgb(255, 170, 91)"
    }
}
dividerColor();