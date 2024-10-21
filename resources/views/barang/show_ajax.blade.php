function modalAction(url = '') {
    $('#myModal').load(url, function () {
        $('#myModal').modal('show');
    });
}

// Menambahkan event listener untuk detail barang
function showDetail(id) {
    $.ajax({
        url: "{{ url('barang/show_ajax') }}/" + id,
        type: 'GET',
        dataType: 'json',
        success: function (response) {
            if (response.status === 'success') {
                let barang = response.data;

                // Menampilkan data dalam modal
                let modalContent = `
                    <div class="modal-header">
                        <h5 class="modal-title">Detail Barang - ${barang.barang_nama}</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <p><strong>ID:</strong> ${barang.barang_id}</p>
                        <p><strong>Kategori:</strong> ${barang.kategori.kategori_nama}</p>
                        <p><strong>Kode Barang:</strong> ${barang.barang_kode}</p>
                        <p><strong>Nama Barang:</strong> ${barang.barang_nama}</p>
                        <p><strong>Harga Beli:</strong> ${new Intl.NumberFormat('id-ID', { style: 'currency', currency: 'IDR' }).format(barang.harga_beli)}</p>
                        <p><strong>Harga Jual:</strong> ${new Intl.NumberFormat('id-IDR', { style: 'currency', currency: 'IDR' }).format(barang.harga_jual)}</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                `;

                $('#myModal').html(modalContent);
                $('#myModal').modal('show');
            } else {
                alert(response.message);
            }
        },
        error: function () {
            alert('Terjadi kesalahan saat mengambil data.');
        }
    });
}
