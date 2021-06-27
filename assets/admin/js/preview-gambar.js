var file = [
	{
		"input": "foto",
		"wrapper": "preview-wrapper-foto",
		"preview": "preview-foto",
	},
	{
		"input": "logo",
		"wrapper": "preview-wrapper-logo",
		"preview": "preview-logo"
	},
	{
		"input": "kemasan",
		"wrapper": "preview-wrapper-kemasan",
		"preview": "preview-kemasan"
	}
];

document.getElementById('foto').addEventListener('change', previewImgs.bind(event, 0));
document.getElementById('logo').addEventListener('change', previewImgs.bind(event, 1));
document.getElementById('kemasan').addEventListener('change', previewImgs.bind(event, 2));

function previewImgs(idx) {
	let wrapper = document.getElementById(file[idx].wrapper);
	wrapper.style.height= 'auto';
	wrapper.style.display= 'block';
	
	let preview = document.getElementById(file[idx].preview);

	const fileKemasan = event.target.files;

	console.log();

	for (let i = 0; i < fileKemasan.length; i++) {
		let img = document.createElement('img');

		img.classList.add('img-thumbnail', 'm-2', 'kemasan');
		img.style.maxHeight = '160px';
		img.src = URL.createObjectURL(fileKemasan[i]);
		img.onload = function(){
			URL.revokeObjectURL(img.src);
		}

		preview.appendChild(img);
	}
}

document.getElementById('hapus-foto').addEventListener('click', hapusImgs.bind(null, 0));
document.getElementById('hapus-logo').addEventListener('click', hapusImgs.bind(null, 1));
document.getElementById('hapus-kemasan').addEventListener('click', hapusImgs.bind(null, 2));

function hapusImgs(idx) {
	document.getElementById( file[idx].input ).value = '';

	let preview = document.getElementById(file[idx].preview);

	while (preview.firstChild) {
		preview.removeChild(preview.lastChild);
	}

	let wrapper = document.getElementById(file[idx].wrapper);
	wrapper.style.height= '0';
	wrapper.style.display= 'none';
}
