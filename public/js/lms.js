/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 41);
/******/ })
/************************************************************************/
/******/ ({

/***/ 41:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(42);


/***/ }),

/***/ 42:
/***/ (function(module, exports, __webpack_require__) {

__webpack_require__(43);
__webpack_require__(44);
__webpack_require__(45);

/***/ }),

/***/ 43:
/***/ (function(module, exports) {

$(document).ready(function () {

    //removes loader when the page is fully loaded with the delay
    setTimeout(function () {
        var loaderDiv = document.getElementsByClassName("loaderDiv")[0];
        if (loaderDiv) {

            loaderDiv.style.display = "none";
            document.getElementsByClassName("main-body")[0].style.display = "block";
        }
    }, 100);

    $('form').submit(function (event) {
        var ll = $(this).find('.btn').attr('disabled', 'disabled');
    });

    $('.btn-next').click(function (event) {
        var thisParent = $(this).parents('ul li');
        var allowed = false;
        var arr = [thisParent.find('input').length];
        console.log(arr);
        $('.text-danger').remove();
        var count = 0;
        thisParent.find('input').each(function () {
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

    $('.btn-prev').click(function (event) {
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
    $('#btn-menu').click(function (event) {
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
        window.addEventListener('resize', function (event) {
            if (window.matchMedia("(min-width: 800px)").matches) {
                mainContents.style.marginLeft = '18rem';
                adminBar.style.width = "15rem";
                btn_menu.innerHTML = '<i class="material-icons">close</i>';
            } else {
                mainContents.style.marginLeft = '0';
                adminBar.style.width = "0";
                btn_menu.innerHTML = '<i class="material-icons">menu</i>';
            }
        });

        btn_menu.addEventListener("click", function () {

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

        mainContents.addEventListener("click", function () {
            if (window.matchMedia("(max-width: 800px)").matches) {
                if (adminBar.style.width == '15rem') {
                    adminBar.style.width = '0';
                    btn_menu.innerHTML = '<i class="material-icons">menu</i>';
                }
            }
        });
    }
}

function resizeAdminBar() {}

function deleteConfirmation() {
    $('.deleteForm').submit(function (event) {
        /* Act on the event */
        event.preventDefault();

        if (confirm('Are you sure you wish to delete?')) {
            this.submit();
        }
    });
}

function removeFile() {
    $('#removeFileBtn').click(function () {
        if (confirm('Are you sure you wish to delete?')) {
            $('#fileDiv').remove();
            $('#fileUploadDiv').removeAttr('hidden');
        }
    });
}

function checkAllCheckbox() {
    $("#selectAllCheckbox").click(function () {
        $('input:checkbox').not(this).prop('checked', this.checked);
    });
}

function checkBoxBtn() {
    $('.checkBoxBtn').click(function (event) {
        console.log('button clicked');
        $(this).find('input').prop('checked', 'checked');
    });
}

/***/ }),

/***/ 44:
/***/ (function(module, exports) {

document.addEventListener("DOMContentLoaded", function (event) {
  var courseSelect = document.getElementById("course_id");
  if (courseSelect) {
    courseSelect.onchange = getClassesByCourse;
  }
});

function getClassesByCourse(event) {
  var course_id = event.target.value;
  var classSelect = document.getElementById("class_id");
  var optionWait = document.createElement("option");
  classSelect.options.length = 0;
  optionWait.text = 'Please Wait....';
  classSelect.add(optionWait);
  if (course_id) {
    axios.get('/course/' + course_id + '/classes').then(function (response) {
      var list = response.data;
      optionWait.text = 'Please select a class';
      for (var key in list) {
        var startDate = new Date(list[key].startDate);
        var endDate = new Date(list[key].endDate);
        var option = document.createElement("option");
        option.value = list[key].id;
        option.text = '(#' + list[key].id + ') ' + startDate.toLocaleDateString() + ' - ' + endDate.toLocaleDateString();
        classSelect.add(option);
      }
    }).catch(function (error) {
      console.log(error);
    });
  }
}

/***/ }),

/***/ 45:
/***/ (function(module, exports) {

document.addEventListener("DOMContentLoaded", function (event) {
  increaseDecreaseQuantity();
  enableUpdateButton('.quantity-input');
  showPOForm();
  showGDPRForm();
});

function increaseDecreaseQuantity() {
  $('.qty-increment-cart').click(function (event) {
    var quantityFieldID = $(this).attr('data-id');
    var input = document.getElementById(quantityFieldID);
    var maxValue = $(input).attr('max');
    if (!input.value) {
      input.value = 1;
    }
    if (parseInt(input.value) >= maxValue) {
      return;
    }
    var buttonID = $('#' + quantityFieldID).attr('button-target');
    var button = $('#' + buttonID).removeAttr('disabled');
    input.value = parseInt(input.value) + 1;
  });

  $('.qty-decrement-cart').click(function (event) {
    var quantityFieldID = $(this).attr('data-id');
    var input = document.getElementById(quantityFieldID);
    if (!input.value) {
      input.value = 1;
    }
    if (input.value > 1) {
      input.value = parseInt(input.value) - 1;
    }
    var buttonID = $('#' + quantityFieldID).attr('button-target');
    var button = $('#' + buttonID).removeAttr('disabled');
  });
}

function increaseDecreaseQuantityField(quantityFieldID) {

  console.log(input.value);
  return input;
}

function enableUpdateButton(quantityInput) {
  $(quantityInput).change(function (event) {
    var buttonID = $(this).attr('button-target');
    var button = $('#' + buttonID).removeAttr('disabled');
  });
}

function showPOForm() {
  $('input[name=paymentMethod]').change(function (event) {
    if ($(this).val() == 'invoiceRequest') {
      console.log('it has changed');
      $('.poCode').slideDown();
      $('.paypal-btn').hide('slow');
      $('.place-booking-btn').show('slow');
    } else {
      $('.poCode').slideUp('slow');
      $('.place-booking-btn').hide('slow');
      $('.paypal-btn').show('slow');
    }
  });
}

function showGDPRForm() {
  $('input[name=signUpForNews]').change(function (event) {
    if ($(this).val() == 'Yes') {
      console.log('it has changed');
      $('.check-box-group-gdpr').slideDown();
    } else {
      $('.check-box-group-gdpr').slideUp('slow');
    }
  });
}

/***/ })

/******/ });