$(document).ready(function() {

  //removes loader when the page is fully loaded with the delay
  setTimeout(function() {
    document.getElementsByClassName("loaderDiv")[0].style.display = "none";
    document.getElementsByClassName("main-body")[0].style.display = "block";
  }, 100);


  $('form').submit(function(event) {
    var ll=$(this).find('.btn').attr('disabled', 'disabled');
  });

  $('.btn-next').click(function(event) {
    var thisParent = $(this).parents('ul li');
    var allowed = false;
    var arr = [thisParent.find('input').length];
    console.log(arr);
    $('.text-danger').remove();
    var count = 0;
    thisParent.find('input').each(function() {
      if ($(this).val().length) {
        console.log($(this).val().length);
        $(this).removeClass('danger');
        allowed = true;
      } else {
        $(this).addClass('danger');
        $(this).after('<span class="text-danger">' + $(this).attr('placeholder') + ' Required </span>');
        allowed = false;
        arr[count] = 'empty';
        return;
      }
      count++;
    });
    if (!arr.includes('empty')) {
      thisParent.addClass('hidden');
      thisParent.next().removeClass('hidden');
    }
  });

  $('.btn-prev').click(function(event) {
    var thisParent = $(this).parents('ul li');
    thisParent.addClass('hidden');
    thisParent.prev().removeClass('hidden');

  });
  // openSideNavBar();
  openNav();
  deleteConfirmation();
  removeFile();
  checkAllCheckbox();
  checkBoxBtn();
});

function openSideNavBar() {
  $('#btn-menu').click(function(event) {
    var adminBar = document.getElementsByClassName("adminSideNavBar")[0];


    if (adminBar.style.display == 'block') {
      adminBar.style.display = 'none';
    } else {
      adminBar.style.display = 'block';
      // adminBar.style.width = "12rem";
    }
    // document.getElementsByTagName("main")[0].style.marginLeft = "250px";
  });
}

function openNav() {
  var adminBar = document.getElementsByClassName("adminSideNavBar")[0];
  var mainContents = document.getElementsByClassName("mainContents")[0];
  // var adminMain = document.getElementsByClassName("adminMain")[0];
  var btn_menu = document.getElementById('btn-menu');
  if (adminBar) {
    window.addEventListener('resize', (function(event) {
      if (window.matchMedia("(min-width: 800px)").matches) {
        mainContents.style.marginLeft = '15rem';
        adminBar.style.width = "15rem";
        btn_menu.innerHTML = '<i class="material-icons">close</i>';

      } else {
        mainContents.style.marginLeft = '0';
        adminBar.style.width = "0";
        btn_menu.innerHTML = '<i class="material-icons">menu</i>';
      }
    }));

    btn_menu.addEventListener("click", function() {

      if (adminBar.style.width == '15rem') {
        // adminBar.style.marginLeft = '0';
        mainContents.style.marginLeft = '0';
        adminBar.style.width = "0";
        btn_menu.innerHTML = '<i class="material-icons">menu</i>';

      } else {
        btn_menu.innerHTML = '<i class="material-icons">close</i>';
        // adminBar.style.display = 'block';
        // mainContents.style.marginLeft = '15rem';
        adminBar.style.width = "15rem";
      }
    });

    mainContents.addEventListener("click", function() {
      if (window.matchMedia("(max-width: 800px)").matches) {
        if (adminBar.style.width == '15rem') {
          adminBar.style.width = '0';
          btn_menu.innerHTML = '<i class="material-icons">menu</i>';
        }
      }
    });
  }



}

function resizeAdminBar() {

}

function deleteConfirmation() {
  $('.deleteForm').submit(function(event) {
    /* Act on the event */
    event.preventDefault();

    if (confirm('Are you sure you wish to delete?')) {
      this.submit();
    }
  });
}


function removeFile() {
  $('#removeFileBtn').click(function() {
    if (confirm('Are you sure you wish to delete?')) {
      $('#fileDiv').remove();
      $('#fileUploadDiv').removeAttr('hidden');
    }

  });
}


function checkAllCheckbox() {
  $("#selectAllCheckbox").click(function(){
    $('input:checkbox').not(this).prop('checked', this.checked);
  });
}

function checkBoxBtn() {
  $('.checkBoxBtn').click(function(event) {
    console.log('button clicked');
  $(this).find('input').prop('checked', 'checked');
  });
}
