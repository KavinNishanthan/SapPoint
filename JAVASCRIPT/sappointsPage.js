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

function viewButton(sapId) {
    $.ajax({
        url : "PHP/SAP_POINTS/viewDetails.php",
        type : "post",
        data : {"sid" : sapId},
        success: function(res) {
            document.getElementById('markContainer').innerHTML = res;
            document.getElementById('myModal').style.display = 'block';
            document.getElementById('black-overlay').style.display = 'block';
        }
    })
}

function deleteButton(sapId) {
    document.getElementById('markContainer').style.display = "none";
    document.getElementById('confirmContainer').style.display = "block";
    document.getElementById('ard').innerHTML = "delete";
    document.getElementById('creject').addEventListener('click',() => {
        document.getElementById('markContainer').style.display = "block";
        document.getElementById('confirmContainer').style.display = "none";
    })
    document.getElementById('caccept').addEventListener('click',() => {
        $.ajax({
            url : "PHP/SAP_POINTS/deleteDocument.php",
            type : "post",
            data : {"sid" : sapId},
            success: function() {
                document.getElementById('myModal').style.display = 'none';
                document.getElementById('black-overlay').style.display = 'none';
                window.location.reload();
            }
        })
    })
}

function editButton(sapId) {
    $.ajax({
        url : "PHP/SAP_POINTS/editDocument.php",
        type : "post",
        data : {"sid" : sapId},
        success: function(res) {
            document.getElementsByClassName('form-container1')[0].innerHTML = res;
            document.getElementById('myModal4').style.display = 'block';
        }
    })
}

function openButton(sapId) {
    $.ajax({
        url : "PHP/SAP_POINTS/viewDocument.php",
        type : "post",
        data : {"sid" : sapId},
        success: function(res) {
            document.getElementsByClassName('document-container')[0].innerHTML = res;
            document.getElementById('myModal3').style.display = 'block';
        }
    })
}

function Cancel() {
    document.getElementById('myModal3').style.display = 'none';
    document.getElementById('myModal4').style.display = 'none';
}

var subCategory = [
    [],
    ['submitted', 'inside', 'outside', 'premier'],
    ['submitted', 'inside', 'outside', 'premier'],
    ['inside', 'outside', 'state', 'national/international'],
    [
        'inside',
        'zone-or-outside',
        'state-or-interzone',
        'national/international'
    ],
    ['ncc/nss', 'professionalsociety', 'clubs'],
    [
        'secretary',
        'joint-secretary',
        'ec-member',
        'class-representative'
    ],
    [
        'non-credit',
        'one-credit',
        'two-credit',
        'three-credit'
    ],
    [
        'sci-submitted',
        'sci-published',
        'wos-submitted',
        'wos-published',
        'others',
        'patent-applied',
        'patent-published',
        'patent-obtained',
        'copyright-applied',
        'copyright-published'
    ],
    [
        'appeared',
        "qualified",
        'ranking',
        'cleared'
    ],
    [
        'written-test',
        'placed',
        'pwithi',
        'pwithouti'
    ],
    ['workshop', 'start-up', 'product'],
    [
        'blood-donation',
        'camp-1',
        'camp-3'
    ],
    ['inside', 'outside']
];

var subCategoryTitle = [
    [],
    ['Submitted', 'Inside', 'Outside', 'Premier'],
    ['Submitted', 'Inside', 'Outside', 'Premier'],
    ['Inside', 'Outside', 'State', 'National/International'],
    [
        'Inside',
        'Zone / Outside',
        'State / Interzone',
        'National / International'
    ],
    ['NCC / NSS', 'Professional Society', 'Clubs'],
    [
        'Chairman / Secretary / Treasurer etc ',
        'Joint Secretary / Vice Chairman etc',
        'Executive Member',
        'Class Representative / Placement or Cell Coordinator / IV or IPT Coordinator'
    ],
    [
        'Non Credit',
        'One Credit',
        'Two Credit',
        'Three Credit'
    ],
    [
        'SCI Submitted',
        'SCI Published',
        'WOS Submitted',
        'WOS Sublished',
        'Others',
        'Patent Applied',
        'Patent Published',
        'Patent Obtained',
        'Copyright Applied',
        'Copyright Published'
    ],
    [
        'Appeared',
        "Qualified",
        'Ranking',
        'Cleared'
    ],
    [
        'Written Test',
        'Placed',
        'Placed with Internship',
        'Placed without Internship'
    ],
    ['Workshop', 'Start up', 'Product'],
    [
        'Blood donation',
        '1-2 Weeks Camp',
        'More than 3 Weeks Camp'
    ],
    ['Inside', 'Outside']
];


var categoryVal;

document.getElementsByName("category")[0].addEventListener("blur", () => {
    var e = document.getElementsByName("subCategory")[0];
    var len = e.options.length - 1;
    for (var i = len; i >= 0; i--) {
        e.remove(i);
    }
    var ele = document.getElementsByName("category")[0];
    var text = ele.options[ele.selectedIndex].value;
    categoryVal = text;
    var sub_category = subCategory[text];
    var select = document.getElementsByName("subCategory")[0];
    var l = sub_category.length;
    var docFrag = document.createDocumentFragment();
    var options = document.createElement("option");
    docFrag.appendChild(options);
    for (var i = 0; i < l; i++) {
        var options = document.createElement("option");
        options.value = sub_category[i];
        options.text = subCategoryTitle[text][i];
        docFrag.appendChild(options);
    }
    select.appendChild(docFrag);
    
    if(categoryVal == 1 || categoryVal == 2 || categoryVal == 3 || categoryVal == 13) {
        document.getElementsByClassName("conductivity-mode")[0].style.display = "block";
    }
    else {
        document.getElementsByClassName("conductivity-mode")[0].style.display = "none";
    }
})

document.getElementsByName("subCategory")[0].addEventListener("blur", () => {
    var ele = document.getElementsByName("subCategory")[0];
    var text = ele.options[ele.selectedIndex].value;
    if (text == "submitted" || categoryVal == "5" || categoryVal == "6" || categoryVal == "7" || categoryVal == "8" || categoryVal == "9" || categoryVal == "10" || categoryVal == "11" || categoryVal == "12") {
        document.getElementsByClassName("prize-won")[0].style.display = "none";
    } else {
        document.getElementsByClassName("prize-won")[0].style.display = "block";
    }
})

// search-bar
document.getElementById('search').addEventListener('keyup', (e) => {
    const value = e.target.value.toUpperCase();
    for (var student = 0; student < document.getElementsByClassName('card-blocks').length; student++) {
        if (document.getElementsByClassName('card-blocks')[student].innerHTML.toUpperCase().indexOf(value) > -1) {
            document.getElementsByClassName("card-blocks")[student].style.display = "";
        } else {
            document.getElementsByClassName("card-blocks")[student].style.display = "none";
        }
    }
})

function detailClose() {
    document.getElementsByClassName("conduction-detail-container")[0].style.display = "none";
}

// hiding myModal and black-overlay
document.getElementById('close').addEventListener('click', () => {
    document.getElementsByClassName('myModal')[0].style.display = 'none';
    document.getElementsByClassName('black-overlay')[0].style.display = 'none';
    document.getElementById('confirmContainer').style.display = "none";
    document.getElementById('markContainer').style.display = "block";
});

// progress bar
(function() {
    window.onload = function() {
	
        var totalProgress, progress;
        const circles = document.querySelectorAll('.progress');
        for (var i = 0; i < circles.length; i++) {
            totalProgress = circles[i].querySelector('circle').getAttribute('stroke-dasharray');
            progress = circles[i].parentElement.getAttribute('data-percent');
            circles[i].querySelector('.bar').style['stroke-dashoffset'] = totalProgress * progress / 80;

        }
    }
})();