var isEditing = false;

window.onload = () => {
	let ket_pesanan = document.getElementById('p-ket');
	let form_edit = document.getElementById('form-edit');
	let tbl_edit = document.getElementById('tbl-edit-ket-pesanan');

	tbl_edit.onclick = () => {
		ket_pesanan.classList.toggle('d-none');
		form_edit.classList.toggle('d-none');

		document.getElementById('tbl-kirim').classList.toggle('d-none');

		isEditing = !isEditing;

		if (isEditing) {
			document.getElementById('field-edit').focus();
			tbl_edit.innerText = 'Batal';
		}
		else {
			tbl_edit.innerText = 'Edit Keterangan Pesanan';
		}
	}
}
