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
    for (var student = 0; student < document.getElementsByClassName('even-row').length; student++) {
        if (document.getElementsByClassName('even-row')[student].innerHTML.toUpperCase().indexOf(value) > -1) {
            document.getElementsByClassName("even-row")[student].style.display = "";
        } else {
            document.getElementsByClassName("even-row")[student].style.display = "none";
        }
    }
    for (var student = 0; student < document.getElementsByClassName('odd-row').length; student++) {
        if (document.getElementsByClassName('odd-row')[student].innerHTML.toUpperCase().indexOf(value) > -1) {
            document.getElementsByClassName("odd-row")[student].style.display = "";
        } else {
            document.getElementsByClassName("odd-row")[student].style.display = "none";
        }
    }
})

function pdfOpen() {
	document.getElementsByClassName('detail-container')[0].style.display = "none";
	document.getElementsByClassName('pdf-detail-container')[0].style.display = "block";

}

function excelOpen() {
	document.getElementsByClassName('detail-container')[0].style.display = "block";
	document.getElementsByClassName('pdf-detail-container')[0].style.display = "none";

}



function adminFilter() {
    var select = document.getElementsByName('department')[0];
    var department = select.options[select.selectedIndex].value;
    var select = document.getElementsByName('section')[0];
    var section = select.options[select.selectedIndex].value;
    var select = document.getElementsByName('semester')[0];
    var semester = select.options[select.selectedIndex].value;
    var select = document.getElementsByName('category')[0];
    var category = select.options[select.selectedIndex].value;
    
    $.ajax({
        url : "PHP/PROFILE/filterExportDetail.php",
        type : "post",
        data : {"id" : 1, "department" : department, "section" : section, "semester" : semester, "category":category},
        success : function(res) {
            document.getElementsByClassName('detail-container')[0].innerHTML = res;
        }
    })
}

function hodFilter() {
    var select = document.getElementsByName('section')[0];
    var section = select.options[select.selectedIndex].value;
    var select = document.getElementsByName('semester')[0];
    var semester = select.options[select.selectedIndex].value;
    
    $.ajax({
        url : "PHP/PROFILE/filterStudentDetail.php",
        type : "post",
        data : {"id" : 1, "section" : section, "semester" : semester},
        success : function(res) {
            document.getElementsByClassName('detail-container')[0].innerHTML = res;
        }
    })
}

