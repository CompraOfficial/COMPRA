

function logout(){
    localStorage.clear();
    location.href = "../index.html";
}

if(window.localStorage.getItem('email') == null){
    localStorage.clear();
    location.href = "../index.html";
}

$(document).ready(function(){
    $('.us-name').html(window.localStorage.getItem('owner'))
})