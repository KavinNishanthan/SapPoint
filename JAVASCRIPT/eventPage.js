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

document.getElementById("reset").addEventListener("click", () => {
    window.location.reload();
})

function filterCategory(val) {
    const value = val.toUpperCase();
    if (value != "ALL") {
        for (var i = 0; i < document.getElementsByClassName('event-type').length; i++) {
            if (document.getElementsByClassName('event-type')[i].innerHTML.toUpperCase().indexOf(value) > -1) {
                document.getElementsByClassName("event-list")[i].style.display = "";
            } else {
                document.getElementsByClassName("event-list")[i].style.display = "none";
            }
        }
    } else {
        for (var i = 0; i < document.getElementsByClassName('event-type').length; i++) {
            document.getElementsByClassName("event-list")[i].style.display = "";
        }
    }
}

function modeCategory(val) {
    const value = val.toUpperCase();
    if (value != "ALL") {
        for (var i = 0; i < document.getElementsByClassName('mode-category').length; i++) {
            if (document.getElementsByClassName('mode-category')[i].innerHTML.toUpperCase().indexOf(value) > -1) {
                document.getElementsByClassName("event-list")[i].style.display = "";
            } else {
                document.getElementsByClassName("event-list")[i].style.display = "none";
            }
        }
    } else {
        for (var i = 0; i < document.getElementsByClassName('mode-category').length; i++) {
            document.getElementsByClassName("event-list")[i].style.display = "";
        }
    }
}

function status(val) {
    const value = val.toUpperCase();
    console.log(value);
    if (value != "ALL") {
        if (value == "UPCOMING") {
            for (var i = 0; i < document.getElementsByClassName('time').length; i++) {
                if (document.getElementsByClassName('time')[i].innerHTML.toUpperCase().indexOf("DAYS LEFT") > -1) {
                    document.getElementsByClassName("event-list")[i].style.display = "";
                } else {
                    document.getElementsByClassName("event-list")[i].style.display = "none";
                }
            }
        } else {
            for (var i = 0; i < document.getElementsByClassName('time').length; i++) {
                if (document.getElementsByClassName('time')[i].innerHTML.toUpperCase().indexOf(value) > -1) {
                    document.getElementsByClassName("event-list")[i].style.display = "";
                } else {
                    document.getElementsByClassName("event-list")[i].style.display = "none";
                }
            }
        }

    } else {
        for (var i = 0; i < document.getElementsByClassName('time').length; i++) {
            document.getElementsByClassName("event-list")[i].style.display = "";
        }
    }
}

function payment(val) {
    const value = val.toUpperCase();
    if (value != "ALL") {
        for (var i = 0; i < document.getElementsByClassName('payment-category').length; i++) {
            if (document.getElementsByClassName('payment-category')[i].innerHTML.toUpperCase().indexOf(value) > -1) {
                document.getElementsByClassName("event-list")[i].style.display = "";
            } else {
                document.getElementsByClassName("event-list")[i].style.display = "none";
            }
        }
    } else {
        for (var i = 0; i < document.getElementsByClassName('mode-category').length; i++) {
            document.getElementsByClassName("event-list")[i].style.display = "";
        }
    }
}

function eligibility(val) {
    const value = val.toUpperCase();
    if (value != 0) {
        for (var i = 0; i < document.getElementsByClassName('eligibility-type').length; i++) {
            if (document.getElementsByClassName('eligibility-type')[i].innerHTML.toUpperCase().indexOf(value) > -1) {
                document.getElementsByClassName("event-list")[i].style.display = "";
            } else {
                document.getElementsByClassName("event-list")[i].style.display = "none";
            }
        }
    } else {
        for (var i = 0; i < document.getElementsByClassName('mode-category').length; i++) {
            document.getElementsByClassName("event-list")[i].style.display = "";
        }
    }
}

function department(val) {
    const value = val.toUpperCase();
    if (value != "ALL") {
        for (var i = 0; i < document.getElementsByClassName('department').length; i++) {
            if (document.getElementsByClassName('department')[i].innerHTML.toUpperCase().indexOf(value) > -1) {
                document.getElementsByClassName("event-list")[i].style.display = "";
            } else {
                document.getElementsByClassName("event-list")[i].style.display = "none";
            }
        }
    } else {
        for (var i = 0; i < document.getElementsByClassName('department').length; i++) {
            document.getElementsByClassName("event-list")[i].style.display = "";
        }
    }
}


document.getElementById('search').addEventListener('keyup', (e) => {
    const value = e.target.value.toUpperCase();
    for (var student = 0; student < document.getElementsByClassName('event-list').length; student++) {
        if (document.getElementsByClassName('event-list')[student].innerHTML.toUpperCase().indexOf(value) > -1) {
            document.getElementsByClassName("event-list")[student].style.display = "";
        } else {
            document.getElementsByClassName("event-list")[student].style.display = "none";
        }
    }
})