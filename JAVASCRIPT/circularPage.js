function profileFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
        var dropdowns = document.getElementsByClassName("dropdown-content");
        var i;
        for (i = 0; i < dropdowns.length; i++) {
            var openDropdown = dropdowns[i];
            if (openDropdown.classList.contains('show')) {
                openDropdown.classList.remove('show');
            }
        }
    }
}

document.getElementById('search').addEventListener('keyup', (e) => {
    const value = e.target.value.toUpperCase();
    for (var student = 0; student < document.getElementsByClassName('card-container').length; student++) {
        if (document.getElementsByClassName('card-container')[student].innerHTML.toUpperCase().indexOf(value) > -1) {
            document.getElementsByClassName("card-container")[student].style.display = "";
        } else {
            document.getElementsByClassName("card-container")[student].style.display = "none";
        }
    }
})

document.getElementsByClassName("staff")[0].addEventListener("click", () => {
    document.getElementsByClassName("staff-circular-container")[0].style.display = "block";
    document.getElementsByClassName("student-circular-container")[0].style.display = "none";
    document.getElementsByClassName("staff")[0].style.backgroundColor = "rgb(0, 183, 255)";
    document.getElementsByClassName("staff")[0].style.color = "white";
    document.getElementsByClassName("staff")[0].style.borderRadius = "45px";
    document.getElementsByClassName("student")[0].style.backgroundColor = "rgb(195, 233, 248)";
    document.getElementsByClassName("student")[0].style.color = "black";
    document.getElementsByClassName("student")[0].style.borderRadius = "45px";
})

document.getElementsByClassName("student")[0].addEventListener("click", () => {
    document.getElementsByClassName("staff-circular-container")[0].style.display = "none";
    document.getElementsByClassName("student-circular-container")[0].style.display = "block";
    document.getElementsByClassName("staff")[0].style.backgroundColor = "rgb(195, 233, 248)";
    document.getElementsByClassName("staff")[0].style.color = "black";
    document.getElementsByClassName("staff")[0].style.borderRadius = "45px";
    document.getElementsByClassName("student")[0].style.backgroundColor = "rgb(0, 183, 255)";
    document.getElementsByClassName("student")[0].style.color = "white";
    document.getElementsByClassName("student")[0].style.borderRadius = "45px";
})

function getForm() {
    document.getElementById('myModal1').style.display = 'block';
    document.getElementById('black-overlay1').style.display = 'block';
}

function cancel() {
    document.getElementById('myModal1').style.display = 'none';
    document.getElementById('myModal2').style.display = 'none';
    document.getElementById('black-overlay1').style.display = 'none';
}

function Cancel() {
    document.getElementById('myModal').style.display = 'none';
    document.getElementById('black-overlay1').style.display = 'none';
}

function deleteCircular(circularNumber) {
    document.getElementById('myModal').style.display = 'block';
    document.getElementById('black-overlay1').style.display = 'block';
    document.getElementById('caccept').addEventListener("click", () => {
        $.ajax({
            url : "PHP/CIRCULARS/deleteCircular.php",
            type : "post",
            data : {"circularNumber" : circularNumber},
            success : function(res) {
                console.log(res);
                document.getElementById('myModal').style.display = 'none';
                document.getElementById('black-overlay1').style.display = 'none';
                window.location.reload();
            }
        })
    })
    document.getElementById('creject').addEventListener("click", () => {
        document.getElementById('myModal').style.display = 'none';
        document.getElementById('black-overlay1').style.display = 'none';
    })
}

function editCircular(circularNumber) {
    $.ajax({
        url : "PHP/CIRCULARS/editCircular.php",
        type : "post",
        data : {"circularNumber" : circularNumber},
        success : function(res) {
            document.getElementsByClassName('form-container1')[0].innerHTML = res;
            document.getElementById('myModal2').style.display = 'block';
            document.getElementById('black-overlay1').style.display = 'block';
        }
    })
}