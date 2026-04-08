// Wait for the document to load
document.addEventListener('DOMContentLoaded', () => {
    const navItems = document.querySelectorAll('.nav-item');
    const pageTitle = document.getElementById('page-title');

    navItems.forEach(item => {
        item.addEventListener('click', (e) => {
            e.preventDefault();

            // 1. Remove active class from all links
            navItems.forEach(nav => nav.classList.remove('active'));

            // 2. Add active class to clicked link
            item.classList.add('active');

            // 3. Update the Header Title dynamically
            const pageName = item.getAttribute('data-page');
            pageTitle.innerText = pageName.charAt(0).toUpperCase() + pageName.slice(1);

            // 4. Console log for debugging
            console.log(`System navigating to: ${pageName}`);
        });
    });
});