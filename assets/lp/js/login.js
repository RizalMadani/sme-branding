window.addEventListener('load', function() {
	document.getElementById('pass-eye').addEventListener('click', togglePass);
});

function togglePass() {
	let pass_eye = document.getElementById('pass-eye');

	pass_eye.classList.toggle('hide-pass');

	let input_pass = document.getElementById('password');
	let pass_type  = input_pass.type;

	if (pass_type === 'password')
		input_pass.type = 'text';
	else
		input_pass.type = 'password';
}
