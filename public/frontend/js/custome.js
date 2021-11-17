   let countdownInterval=3000;
    let myDiv = document.getElementsByClassName('mdiv');
	
    myDiv.onclick = setInterval(function() {
    $('#exampleModalCenter').modal('hide');
}, countdownInterval);


