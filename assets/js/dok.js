document.addEventListener('DOMContentLoaded', () => {
    let currentCat = 'all';
    let searchQuery = '';

    const loadRealtimeDocs = () => {
        fetch(`../api.php?action=get_dokumen&cat=${currentCat}&search=${encodeURIComponent(searchQuery)}`)
            .then(res => res.json())
            .then(res => {
                if (res.status === 'success') {
                    document.getElementById('statTotalDoc').innerText = res.total;
                    const tbody = document.getElementById('docRealtimeBody');
                    tbody.innerHTML = '';

                    if (res.data.length === 0) {
                        tbody.innerHTML = '<tr><td colspan="5" style="text-align:center;">Tidak ada dokumen ditemukan.</td></tr>';
                        return;
                    }

                    res.data.forEach(item => {
                        const tr = document.createElement('tr');
                        tr.innerHTML = `
                            <td>
                                <strong>${item.judul}</strong>
                                <div class="file-info">${item.kode_dokumen} • ${item.file_size}</div>
                            </td>
                            <td><span class="tag tag-${item.kategori.toLowerCase()}">${item.kategori}</span></td>
                            <td>${item.tgl_terbit}</td>
                            <td><span class="badge badge-${item.status.toLowerCase()}">${item.status}</span></td>
                            <td>
                                <a href="../uploads/${item.file_path}" target="_blank" class="btn-icon"><i class="fa-solid fa-download"></i> Unduh</a>
                            </td>
                        `;
                        tbody.appendChild(tr);
                    });
                }
            });
    };

    // Tab Event Listener
    document.querySelectorAll('.tab-btn').forEach(btn => {
        btn.addEventListener('click', (e) => {
            document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            currentCat = btn.getAttribute('data-cat');
            loadRealtimeDocs();
        });
    });

    // Search Input Listener
    document.getElementById('docSearchInput').addEventListener('input', (e) => {
        searchQuery = e.target.value;
        loadRealtimeDocs();
    });

    // Initial load & Polling Interval 5s
    loadRealtimeDocs();
    setInterval(loadRealtimeDocs, 5000);
});