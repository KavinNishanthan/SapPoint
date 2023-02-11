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

// search-bar
document.getElementById('search').addEventListener('keyup', (e) => {
    const value = e.target.value.toUpperCase();
    for(var student=0;student<document.getElementsByClassName('student-profile-name').length;student++) {
        if(document.getElementsByClassName('student-profile-name')[student].innerHTML.toUpperCase().indexOf(value) > -1) {     
            document.getElementsByClassName("students-list")[student].style.display = "";
        }
        else{
        	document.getElementsByClassName("students-list")[student].style.display = "none";
        } 
    }
})

document.getElementById('change').addEventListener('click', () => {
    var select = document.getElementById('semester');
    var value = select.options[select.selectedIndex].value;
    console.log(value);
    $.ajax({
        url : "PHP/PROFILE/sample.php",
        type : "post",
        data : {"semester" : value},
        success : function(res) {
            console.log(res);
            window.location.reload();
        }
    })
})

function getDetail() {
    document.getElementById('myModal1').style.display = 'block';
    document.getElementById('black-overlay1').style.display = 'block';
}

function cancel() {
    document.getElementById('myModal1').style.display = 'none';
    document.getElementById('black-overlay1').style.display = 'none';
}

function download() {
    var element = document.getElementById('tableContainer');
    var opt = {
        margin: 0,
        filename: 'myfile.pdf',
        image: { type: 'jpeg', quality: 0.98 },
        html2canvas: { scale: 2 },
        jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
    };

    html2pdf().set({
        pagebreak: { mode: ['avoid-all', 'css', 'legacy'] }
    }).from(element).save();
}