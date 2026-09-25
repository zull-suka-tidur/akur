document.addEventListener('DOMContentLoaded', () => {
    const fetchLaporan = () => {
        fetch('../api.php?action=get_laporan_stats')
            .then(res => res.json())
            .then(res => {
                if (res.status === 'success') {
                    document.getElementById('kpiTotal').innerText = res.summary.total;
                    document.getElementById('kpiApproved').innerText = res.summary.approved;
                    document.getElementById('kpiSent').innerText = res.summary.sent;
                    document.getElementById('kpiDraft').innerText = res.summary.draft;

                    const tbody = document.getElementById('laporanTableBody');
                    tbody.innerHTML = '';
                    res.data.forEach(item => {
                        const tr = document.createElement('tr');
                        tr.innerHTML = `
                            <td><strong>${item.judul_laporan}</strong></td>
                            <td>${item.kategori}</td>
                            <td>${item.pelapor}</td>
                            <td><span class="badge badge-${item.status.toLowerCase()}">${item.status}</span></td>
                        `;
                        tbody.appendChild(tr);
                    });
                }
            });
    };

    document.getElementById('btnOpenReportModal').addEventListener('click', () => {
        alert("Fitur Pengunggahan Laporan Administrasi: Silakan gunakan akun CMS Admin untuk menambah laporan resmi.");
    });

    fetchLaporan();
    setInterval(fetchLaporan, 5000);
});