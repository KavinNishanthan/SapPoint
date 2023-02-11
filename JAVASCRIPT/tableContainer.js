function getDetail(rollNumber) {
	$.ajax({
	        url: "PHP/SAP_POINTS/tableContainer.php",
	        type: "post",
	        data: { "rollNumber": rollNumber},
	        success: function(res) {
		    document.getElementById('tableContainer').innerHTML = res;
	            document.getElementById('myModal1').style.display = 'block';
    		    document.getElementById('black-overlay1').style.display = 'block';
	        }
	    })
}

function cancel() {
    document.getElementById('myModal1').style.display = 'none';
    document.getElementById('black-overlay1').style.display = 'none';
}

function download(rollNumber,semester) {
            var element = document.getElementById('tableContainer');
	    var pdfName = rollNumber.concat("_","SEM_",semester);
            var opt = {
                margin: 0,
                filename: pdfName ,
                image: { type: 'jpeg', quality: 0.98 },
                html2canvas: { scale: 2 },
                jsPDF: { unit: 'in', format: 'letter', orientation: 'portrait' }
            };
        
            html2pdf().set({
                pagebreak: { mode: ['avoid-all', 'css', 'legacy'] }
            }).from(element).save();
        }