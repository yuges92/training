// console.log('Megamenu');



document.addEventListener("DOMContentLoaded", function (event) {
    $('.dropdown-tab').on('mouseover', function (event) {
        var i, tabcontent, tablinks;
        tabcontent = document.getElementsByClassName("tab-content-items");
        tablinks = document.getElementsByClassName("dropdown-tab");
        for (i = 0; i < tabcontent.length; i++) {
            tabcontent[i].style.display = "none";
        }

        for (i = 0; i < tablinks.length; i++) {
            tablinks[i].classList.remove('active');
        }

        $(this).addClass('active');
        var tab = $(this).data('target-tab');
        $('#' + tab).css('display', 'block');

    });

    $('#megaMenuBtn, .megaMenuBtn *').on('mouseover', function (event) {
        var btns = document.getElementsByClassName("nav-item");
        for (i = 0; i < btns.length; i++) {
            btns[i].classList.remove('active');
        }

        $('#megaMenuBtn').addClass('active');
        $('.mega-menu').addClass('active');

    });

    $('.mega-menu').on('mouseleave', function (event) {
        $('#megaMenuBtn').removeClass('active');

        $(this).removeClass('active');

    });
    $(document).on("mouseover", function (e) {
        // console.log(e.target.classList);
        
    });

});

