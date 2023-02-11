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

function openBatch() {
    document.getElementById('myModal').style.display = "block";
}

document.getElementById('add').addEventListener('click', () => {
    var batch = document.getElementById('studentBatch').value;
    $.ajax({
        url : "PHP/PROFILE/addBatch.php",
        type : "post",
        data : {"studentBatch" : batch},
        success : function(res) {
            window.location.reload();
            document.getElementById('myModal').style.display = "none";
        }
    })
})

function getReport() {
    document.getElementById('myModal1').style.display = "block";
}

document.getElementById('get').addEventListener('click', () => {
    var semester = document.getElementById('semester').value;
    $.ajax({
        url : "PHP/PROFILE/studentReport.php",
        type : "post",
        data : {"semester" : semester},
        success : function(res) {
            document.getElementById('tableContainer').innerHTML = res;
            document.getElementById('black-overlay1').style.display = "block";
            document.getElementById('myModal2').style.display = "block";
        }
    })
})

function Cancel() {
    document.getElementById('myModal2').style.display = 'none';
    document.getElementById('black-overlay1').style.display = 'none';
}

function cancel() {
    document.getElementById('myModal').style.display = "none";
    document.getElementById('myModal1').style.display = "none";
    document.getElementById('myModal3').style.display = "none";
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

function changeSemester() {
    document.getElementById('myModal3').style.display = "block";
}

document.getElementById('change').addEventListener('click', () => {
    var from_semester = document.getElementById('fromsemester').value;
    var to_semester = document.getElementById('tosemester').value;
    var studentBatch = document.getElementById('cstudentBatch').value;
    $.ajax({
        url : "PHP/PROFILE/changeSemester.php",
        type : "post",
        data : {"from_semester" : from_semester, "to_semester" : to_semester, "studentBatch" : studentBatch},
        success : function(res) {
            window.location.reload();
        }
    })
})