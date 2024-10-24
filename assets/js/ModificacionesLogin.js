// Animación de transición suave para los botones
document.querySelectorAll('.btn-primary').forEach(button => {
    button.addEventListener('mouseenter', () => {
        button.style.transform = 'scale(1.05)';
        button.style.transition = 'transform 0.3s ease';
    });
    button.addEventListener('mouseleave', () => {
        button.style.transform = 'scale(1)';
    });
});

// Animación para el input cuando se enfoca
document.querySelectorAll('.form-control').forEach(input => {
    input.addEventListener('focus', () => {
        input.style.boxShadow = '0 0 8px rgba(213, 43, 30, 0.3)';
    });
    input.addEventListener('blur', () => {
        input.style.boxShadow = 'none';
    });
});
