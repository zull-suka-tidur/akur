// Global Application Script
document.addEventListener('DOMContentLoaded', () => {
    console.log("L7Smart - FH UIN Salatiga App Loaded Successfully.");
    
    // Auto Highlight active menu in header based on URL
    const currentPath = window.location.pathname;
    const navLinks = document.querySelectorAll('.nav-links a');
    
    navLinks.forEach(link => {
        if(link.getAttribute('href') && currentPath.includes(link.getAttribute('href'))){
            navLinks.forEach(l => l.classList.remove('active'));
            link.classList.add('active');
        }
    });
});