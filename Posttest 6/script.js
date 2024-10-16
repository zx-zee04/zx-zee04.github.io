const toggleModeButton = document.getElementById('toggle-mode');
const startPlanningButton = document.getElementById('start-planning');
const popup = document.getElementById('popup');
const closePopup = document.getElementById('close-popup');
const footer = document.getElementById('footer');

toggleModeButton.addEventListener('click', () => {
    document.body.classList.toggle('dark-mode');
    toggleModeButton.textContent = document.body.classList.contains('dark-mode') ? 'Light Mode' : 'Dark Mode';
});

startPlanningButton.addEventListener('click', () => {
    popup.classList.add('show');
});

closePopup.addEventListener('click', () => {
    popup.classList.remove('show');
});

window.addEventListener('click', (event) => {
    if (event.target === popup) {
        popup.classList.remove('show');
    }
});

window.addEventListener('keydown', (event) => {
    if (event.key === 'Escape' && popup.classList.contains('show')) {
        popup.classList.remove('show');
    }
});

window.addEventListener('scroll', () => {
    const scrollY = window.scrollY + window.innerHeight;
    const documentHeight = document.documentElement.scrollHeight;

    if (scrollY < documentHeight - 50) {
        footer.classList.add('visible');
        footer.classList.remove('hidden');
    } else {
        footer.classList.add('hidden'); 
    }
});