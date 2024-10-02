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
    popup.classList.remove('hidden');
});

closePopup.addEventListener('click', () => {
    popup.classList.add('hidden');
});

window.addEventListener('click', (event) => {
    if (event.target === popup) {
        popup.classList.add('hidden');
    }
});

window.addEventListener('keydown', (event) => {
    if (event.key === 'Escape' && !popup.classList.contains('hidden')) {
        popup.classList.add('hidden');
    }
});

window.addEventListener('scroll', () => {
    const scrollY = window.scrollY + window.innerHeight;
    const documentHeight = document.documentElement.scrollHeight;

    if (scrollY <= documentHeight - 50) {
        footer.classList.add('visible');
    } else {
        footer.classList.remove('visible');
    }
});
