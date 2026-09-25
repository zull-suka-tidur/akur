document.addEventListener('DOMContentLoaded', () => {
    const faqItems = document.querySelectorAll('.faq-item');
    faqItems.forEach(item => {
        const q = item.querySelector('.faq-question');
        q.addEventListener('click', () => {
            const ans = item.querySelector('.faq-answer');
            const isVisible = ans.style.display === 'block';
            document.querySelectorAll('.faq-answer').forEach(a => a.style.display = 'none');
            ans.style.display = isVisible ? 'none' : 'block';
        });
    });
});