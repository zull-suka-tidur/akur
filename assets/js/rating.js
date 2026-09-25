document.addEventListener('DOMContentLoaded', () => {
    const stars = document.querySelectorAll('#starContainer i');
    const starInput = document.getElementById('starValue');

    stars.forEach(star => {
        star.addEventListener('click', () => {
            const val = star.getAttribute('data-rating');
            starInput.value = val;
            stars.forEach((s, idx) => {
                if (idx < val) {
                    s.classList.remove('fa-regular');
                    s.classList.add('fa-solid');
                } else {
                    s.classList.remove('fa-solid');
                    s.classList.add('fa-regular');
                }
            });
        });
    });

    document.getElementById('ratingRealForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const formData = new FormData(this);

        fetch('../api.php?action=submit_rating', {
            method: 'POST',
            body: formData
        })
        .then(res => res.json())
        .then(res => {
            alert(res.message);
            if (res.status === 'success') {
                this.reset();
            }
        });
    });
});