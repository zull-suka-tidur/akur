document.addEventListener('DOMContentLoaded', () => {
    const nikInput = document.getElementById('nikNimInput');
    const waInput = document.getElementById('waInput');

    // 7a. Hanya Menerima Input Angka
    const allowOnlyNumbers = (e) => {
        e.target.value = e.target.value.replace(/[^0-9]/g, '');
    };

    nikInput.addEventListener('input', allowOnlyNumbers);
    waInput.addEventListener('input', allowOnlyNumbers);

    // 7b. Submit handler via AJAX ke API Backend
    document.getElementById('regFormProduction').addEventListener('submit', function(e) {
        e.preventDefault();
        const btn = document.getElementById('btnSubmitReg');
        btn.disabled = true;
        btn.innerText = "Memproses Tiket...";

        const formData = new FormData(this);

        fetch('../api.php?action=submit_register', {
            method: 'POST',
            body: formData
        })
        .then(res => res.json())
        .then(res => {
            btn.disabled = false;
            btn.innerText = "Kirim & Dapatkan Tiket";

            if (res.status === 'success') {
                const alertBox = document.getElementById('regSuccessAlert');
                alertBox.style.display = 'block';
                document.getElementById('resTiket').innerText = "Nomor Tiket Anda: " + res.tiket;
                document.getElementById('resMsg').innerText = res.email_status;
                this.reset();
            } else {
                alert(res.message);
            }
        });
    });
});