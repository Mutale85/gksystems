var showpass = document.getElementById('showpass_text');
var password = document.getElementById('password');
function passReveal(){
    var password = document.getElementById('password');
    if(password.type == 'password') {
        password.type = 'text';
        showpass.innerHTML = '<i class="bi bi-eye-slash"></i>';
    }else {
        password.type = 'password';
        showpass.innerHTML = '<i class="bi bi-eye"></i>';
    }
}

function loginsuccessNow(msg){
    toastr.warning(msg);
    toastr.options.progressBar = false;
    toastr.options.positionClass = "toast-top-right";
    toastr.options.showDuration = 3000;
}
function errorNow(msg){
    toastr.error(msg);
    toastr.options.progressBar = true;
    toastr.options.positionClass = "toast-top-center";
    toastr.options.showDuration = 1000;
}