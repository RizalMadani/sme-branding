window.addEventListener('load', function() {
    document.getElementById('pass-eye').addEventListener('click', togglePass);
});

function togglePass() {
    let eye_icon = document.getElementById('eye-icon');

    let input_pass = document.getElementById('password');
    let pass_type = input_pass.type;

    if (pass_type === 'password') {
        input_pass.type = 'text';

        eye_icon.setAttribute('class', 'mdi mdi-eye');
    } else {
        input_pass.type = 'password';

        eye_icon.setAttribute('class', 'mdi mdi-eye-off');
    }
}
