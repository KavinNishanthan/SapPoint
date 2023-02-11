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

$(document).ready(function() {
    $("#myInput").on("keyup", function() {
        var value = $(this).val().toLowerCase();
        $(".dropdown-menu li").filter(function() {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
        });
    });
});

$(document).ready(function($) {
    $(".dropdown-menu li").click(function() {
        var value = $(this).text().trim().toUpperCase();
        if(value != "ALL") {
            for (var student = 0; student < document.getElementsByClassName('document-submitted').length; student++) {
                if (document.getElementsByClassName('document-submitted')[student].innerHTML.toUpperCase().indexOf(value) > -1) {
                    document.getElementsByClassName("card-blocks")[student].style.display = "";
                } else {
                    document.getElementsByClassName("card-blocks")[student].style.display = "none";
                }
            }
        }
        else {
            for (var student = 0; student < document.getElementsByClassName('document-submitted').length; student++) {
                document.getElementsByClassName("card-blocks")[student].style.display = "";
            }
        }
    })
})

// search-bar
document.getElementById('search').addEventListener('keyup', (e) => {
    const value = e.target.value.toUpperCase();
    for (var student = 0; student < document.getElementsByClassName('student-profile-name').length; student++) {
        if (document.getElementsByClassName('student-profile-name')[student].innerHTML.toUpperCase().indexOf(value) > -1) {
            document.getElementsByClassName("students-list")[student].style.display = "";
        } else {
            document.getElementsByClassName("students-list")[student].style.display = "none";
        }
    }
})

// filter-container show and hide
document.getElementById("sapTwo").style.display = "none";
document.getElementById("filterPath").addEventListener("click", () => {
    document.getElementById("sapOne").style.display = "none";
    document.getElementById("sapTwo").style.display = "block";
})

document.getElementById("backPath").addEventListener("click", () => {
    document.getElementById("sapOne").style.display = "block";
    document.getElementById("sapTwo").style.display = "none";
})

document.getElementById("detailClose").addEventListener("click", () => {
    document.getElementsByClassName("conduction-detail-container")[0].style.display = "none";
})

function closeDoc() {
    document.getElementsByClassName('myModal3')[0].style.display = 'none';
}

// hiding myModal and black-overlay
document.getElementById('close').addEventListener('click', () => {
    document.getElementsByClassName('myModal')[0].style.display = 'none';
    document.getElementsByClassName('black-overlay')[0].style.display = 'none';
    document.getElementById('confirmContainer').style.display = "none";
    document.getElementById('markContainer').style.display = "block";
});

function viewButton(sapId,rollNumber) {
    $.ajax({
        url : "PHP/SAP_POINTS/cardDetails.php",
        type : "post",
        data : {"sapId" : sapId, "rollNumber" : rollNumber},
        success : function(res) {
            document.getElementById('markContainer').innerHTML = res;
	    document.getElementsByClassName('black-overlay')[0].style.display = 'block';
            document.getElementById('myModal').style.display = "block";
        }
    })
}

function documentAccept(sapId,rollNumber) {
	var allocatedMark = document.getElementById('amark').value;
	if(allocatedMark < 0) {
		allocatedMark = 0;
	}    
	$.ajax({
        	url: "PHP/SAP_POINTS/confirmAccept.php",
        	type: "post",
        	data: {"rollNumber": rollNumber, "allocatedMark": allocatedMark, "sid": sapId},
        	success: function(res) {
      			document.getElementById('confirmContainer').innerHTML = res;
			document.getElementById('confirmContainer').style.display = "block";
			document.getElementById('markContainer').style.display = "none";
        	}
    	})

}

function documentAcceptConfirm(rollNumber,sapId,allocatedMark) {
	if(allocatedMark < 0) {
		allocatedMark = 0;
	}  
	$.ajax({
        	url: "PHP/SAP_POINTS/acceptMark.php",
        	type: "post",
        	data: { "amark": allocatedMark, "sid": sapId},
        	success: function() {
			openStudent(rollNumber);
            		document.getElementById('myModal').style.display = 'none';
            		document.getElementById('black-overlay').style.display = 'none';
			document.getElementById('confirmContainer').style.display = "none";
			document.getElementById('markContainer').style.display = "block";
        	}
    	})
}

function confirmCancel() {
	document.getElementById('markContainer').style.display = "block";
	document.getElementById('confirmContainer').style.display = "none";

}

document.getElementById('loadingBackground').style.display = "none";

function documentReject(sapId,rollNumber) {
	$.ajax({
        	url: "PHP/SAP_POINTS/confirmReject.php",
        	type: "post",
        	data: {"rollNumber": rollNumber, "sid": sapId},
        	success: function(res) {
      			document.getElementById('confirmContainer').innerHTML = res;
			document.getElementById('confirmContainer').style.display = "block";
			document.getElementById('markContainer').style.display = "none";
        	}
    	})

}

function documentRejectConfirm(rollNumber,sapId) {
	var description = document.getElementById('description').value;
	$.ajax({
	        url: "PHP/SAP_POINTS/rejectMark.php",
	        type: "post",
	        data: { "sid": sapId, "desc": description },
	        success: function() {
		        openStudent(rollNumber);
            	        document.getElementById('myModal').style.display = 'none';
            		document.getElementById('black-overlay').style.display = 'none';
			document.getElementById('confirmContainer').style.display = "none";
			document.getElementById('markContainer').style.display = "block";
	        }
	    })
}


function documentOpen(sapId) {
	$.ajax({
	        url: "PHP/SAP_POINTS/viewDocument.php",
	        type: "post",
	        data: { "sid": sapId },
	        success: function(res) {
		    document.getElementById('documentProof').innerHTML = res;
	            document.getElementsByClassName('black-overlay4')[0].style.display = 'block';
		    document.getElementsByClassName('myModal4')[0].style.display = 'block';	       
		}
	    })

}

function closePdf() {
	document.getElementsByClassName('black-overlay4')[0].style.display = 'none';
	document.getElementsByClassName('myModal4')[0].style.display = 'none';
}

var progressValue = 10;

function openStudent(rollNumber) {
    document.getElementById('loadingBackground').style.display = "block";
    $.ajax({
        url : "PHP/SAP_POINTS/sapDetails.php",
        type : "post",
        data : {"rollNumber" : rollNumber},
        success : function(res) {
            document.getElementById('waitingDocument').innerHTML = res;
        }
    })
    
    $.ajax({
        url : "PHP/SAP_POINTS/asapDetails.php",
        type : "post",
        data : {"rollNumber" : rollNumber},
        success : function(res) {
            document.getElementById('acceptedDocument').innerHTML = res;
        }
    })
    
    $.ajax({
        url : "PHP/SAP_POINTS/progressBar.php",
        type : "post",
        data : {"rollNumber" : rollNumber},
        success : function(res) {
		document.getElementsByClassName('progress-container')[0].innerHTML = res;     
		progressBar();       
        }
    })
    
    $.ajax({
        url : "PHP/SAP_POINTS/studentDetails.php",
        type : "post",
        data : {"rollNumber" : rollNumber},
        success : function(res) {
            document.getElementsByClassName('student-profile-details')[0].innerHTML = res;
        }
    })
    
    $.ajax({
        url : "PHP/SAP_POINTS/document.php",
        type : "post",
        data : {"rollNumber" : rollNumber},
        success : function(res) {
            document.getElementById('documentContainer').innerHTML = res;
        }
    })
    document.getElementById('loadingBackground').style.display = "none";
}

function openDocument() {
    document.getElementById('myModal3').style.display = "block";
}

function progressBar() {
        var totalProgress, progress;
        const circles = document.querySelectorAll('.progress');
        for (var i = 0; i < circles.length; i++) {
            totalProgress = circles[i].querySelector('circle').getAttribute('stroke-dasharray');
            progress = circles[i].parentElement.getAttribute('data-percent');
            circles[i].querySelector('.bar').style['stroke-dashoffset'] = totalProgress * progress / 80;

        }
    }