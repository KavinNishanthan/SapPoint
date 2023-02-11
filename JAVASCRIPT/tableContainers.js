function getDetail() {
    document.getElementById('myModal1').style.display = 'block';
    document.getElementById('black-overlay1').style.display = 'block';
}

function uploadFile() {
    document.getElementById('myModal2').style.display = 'block';
    document.getElementById('black-overlay').style.display = 'block';
}

function cancel() {
    document.getElementById('myModal1').style.display = 'none';
    document.getElementById('black-overlay1').style.display = 'none';
    document.getElementById('myModal2').style.display = 'none';
    document.getElementById('black-overlay').style.display = 'none';
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