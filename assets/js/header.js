document.addEventListener('DOMContentLoaded', () => {
    const controlsToggle = document.getElementById('controls-toggle');
    const controlsMenu = document.getElementById('controls-menu');
    const controlsUserMenu = document.getElementById('controls-user-menu');

    function closeControlsMenu() {
        controlsMenu.classList.remove('show');
    }

    function closeControlsUserMenu() {
        controlsUserMenu.classList.remove('show');
    }

    controlsToggle.addEventListener('click', (event) => {
        event.stopPropagation();

        const screenWidth = window.innerWidth;

        if (screenWidth > 670 && screenWidth <= 1150) {
            controlsMenu.classList.toggle('show');
            closeControlsUserMenu();
        } else if (screenWidth <= 670) {
            controlsUserMenu.classList.toggle('show');
            closeControlsMenu();
        }
    });

    document.addEventListener('click', (event) => {
        if (!controlsMenu.contains(event.target) && !controlsToggle.contains(event.target)) {
            closeControlsMenu();
        }
        if (!controlsUserMenu.contains(event.target) && !controlsToggle.contains(event.target)) {
            closeControlsUserMenu();
        }
    });

    window.addEventListener('resize', () => {
        if (window.innerWidth > 1150) {
            closeControlsMenu();
            closeControlsUserMenu();
        } else if (window.innerWidth > 670) {
            if (controlsUserMenu.classList.contains('show')) {
                controlsMenu.classList.add('show');
            }
            closeControlsUserMenu();
        } else {
            if (controlsMenu.classList.contains('show')) {
                controlsUserMenu.classList.add('show');
            }
            closeControlsMenu();
        }
    });

    const logoutButtons = document.querySelectorAll('.logout-btn');

    logoutButtons.forEach(button => {
        const lockIcon = button.querySelector('i');

        button.addEventListener('mouseenter', () => {
            lockIcon.style.opacity = '0';
            lockIcon.style.transform = 'scale(0.8)';

            setTimeout(() => {
                lockIcon.classList.replace('icon-lock-open-alt', 'icon-lock');
                lockIcon.style.opacity = '1';
                lockIcon.style.transform = 'scale(1)';
            }, 300);
        });

        button.addEventListener('mouseleave', () => {
            lockIcon.style.opacity = '0';
            lockIcon.style.transform = 'scale(0.8)';

            setTimeout(() => {
                lockIcon.classList.replace('icon-lock', 'icon-lock-open-alt');
                lockIcon.style.opacity = '1';
                lockIcon.style.transform = 'scale(1)';
            }, 300);
        });
    });
});