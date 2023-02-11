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

function deleteEvent(eventId) {
    document.getElementById('myModal').style.display = 'block';
    document.getElementById('black-overlay1').style.display = 'block';
    document.getElementById('caccept').addEventListener("click", () => {
        $.ajax({
            url : "PHP/EVENTS/deleteEvent.php",
            type : "post",
            data : {"eventId" : eventId},
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

function editEvent(eventId) {
    $.ajax({
        url : "PHP/EVENTS/editEvent.php",
        type : "post",
        data : {"eventId" : eventId},
        success : function(res) {
            document.getElementsByClassName('form-container1')[0].innerHTML = res;
            document.getElementById('myModal2').style.display = 'block';
            document.getElementById('black-overlay1').style.display = 'block';
        }
    })
}