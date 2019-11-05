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
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
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
/******/ 	__webpack_require__.p = "";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = "./src/site/index.js");
/******/ })
/************************************************************************/
/******/ ({

/***/ "./src/site/calculator.js":
/*!********************************!*\
  !*** ./src/site/calculator.js ***!
  \********************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

eval("/* WEBPACK VAR INJECTION */(function($) {/**\n * Calculator\n */\n$('.calc-form').each(function () {\n  var $form = $(this),\n      $options = $form.find('.form-check-input'),\n      $qty = $form.find('.calc-form-qty-control'),\n      $priceTotal = $form.find('.calc-form-total-v'),\n      priceSingle = +$priceTotal.text(),\n      priceTotal = priceSingle,\n      $dataField = $('[name=\"your-data\"]'),\n      dataFieldOptions = {\n    pc: {\n      label: 'Количество ПК'\n    },\n    price: {\n      label: 'Общая сумма'\n    },\n    options: {\n      label: 'Дополнительные опции',\n      v: []\n    }\n  };\n  $qty.on('update', function () {\n    var qtyVal = +$(this).val(),\n        price = qtyVal * priceSingle;\n    $priceTotal.text(price);\n    dataFieldOptions.pc.v = qtyVal;\n    dataFieldOptions.price.v = price;\n  }).on('change', function () {\n    $(this).trigger('update');\n    $form.trigger('setData');\n  }).trigger('update');\n  $options.each(function () {\n    var $option = $(this),\n        val = $option.val();\n    $option.on('update', function () {\n      if ($(this).prop('checked')) {\n        dataFieldOptions.options.v.push(val);\n      } else {\n        var index = dataFieldOptions.options.v.indexOf(val);\n\n        if (index != -1) {\n          dataFieldOptions.options.v.splice(index, 1);\n        }\n      }\n    }).on('change', function () {\n      $(this).trigger('update');\n      $form.trigger('setData');\n    }).trigger('update');\n  });\n  $form.on('setData', function () {\n    var data = [];\n    $.each(dataFieldOptions, function (index, object) {\n      var value = Array.isArray(object.v) ? object.v.join('; ') : object.v;\n      data.push(object.label + ': ' + value);\n    });\n    $dataField.val(data.join(\"\\n\"));\n  }).trigger('setData');\n});\n/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ \"jquery\")))\n\n//# sourceURL=webpack:///./src/site/calculator.js?");

/***/ }),

/***/ "./src/site/carousel.js":
/*!******************************!*\
  !*** ./src/site/carousel.js ***!
  \******************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

eval("/* WEBPACK VAR INJECTION */(function($) {/**\n * Owl Carousel\n */\n$('.carousel-container').each(function () {\n  var container = $(this),\n      carousel = container.find('.carousel'),\n      autoPlay = container.data('play') || 0,\n      loop = container.data('loop') || 0,\n      margin = container.data('margin') || 0,\n      items = container.data('items') || 0;\n  options = {\n    items: 1,\n    margin: +margin,\n    loop: loop,\n    nav: true,\n    dots: false,\n    responsive: {\n      0: {\n        items: 1\n      },\n      768: {\n        items: 2\n      },\n      992: {\n        items: 3\n      },\n      1200: {\n        items: 4\n      }\n    }\n  };\n\n  if (autoPlay) {\n    options.autoplay = true;\n    options.autoplaySpeed = 2000;\n    options.autoplayTimeout = +autoPlay;\n    options.autoplayHoverPause = true;\n  }\n\n  if ('1' == items) {\n    options.responsive = false;\n  }\n\n  if ('3' == items) {\n    options.responsive = {\n      0: {\n        items: 1\n      },\n      768: {\n        items: 2\n      },\n      1200: {\n        items: 3\n      }\n    };\n  }\n\n  carousel.owlCarousel(options);\n});\n/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ \"jquery\")))\n\n//# sourceURL=webpack:///./src/site/carousel.js?");

/***/ }),

/***/ "./src/site/custom-checkboxes.js":
/*!***************************************!*\
  !*** ./src/site/custom-checkboxes.js ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

eval("/* WEBPACK VAR INJECTION */(function($) {/**\n * Custom checkboxes\n */\n$('[type=\"checkbox\"]').each(function () {\n  var checkbox = $(this),\n      parent = checkbox.parents('.form-check').eq(0);\n  parent.addClass('form-check-custom');\n  checkbox.wrap('<span class=\"form-check-wrap\"/>').after('<span class=\"form-check-custom-control\"/>');\n});\n/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ \"jquery\")))\n\n//# sourceURL=webpack:///./src/site/custom-checkboxes.js?");

/***/ }),

/***/ "./src/site/index.js":
/*!***************************!*\
  !*** ./src/site/index.js ***!
  \***************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
eval("__webpack_require__.r(__webpack_exports__);\n/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! jquery */ \"jquery\");\n/* harmony import */ var jquery__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(jquery__WEBPACK_IMPORTED_MODULE_0__);\n/* harmony import */ var _mobile_menu__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./mobile-menu */ \"./src/site/mobile-menu.js\");\n/* harmony import */ var _mobile_menu__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(_mobile_menu__WEBPACK_IMPORTED_MODULE_1__);\n/* harmony import */ var _navigation_search__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./navigation-search */ \"./src/site/navigation-search.js\");\n/* harmony import */ var _navigation_search__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(_navigation_search__WEBPACK_IMPORTED_MODULE_2__);\n/* harmony import */ var _popup__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./popup */ \"./src/site/popup.js\");\n/* harmony import */ var _popup__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(_popup__WEBPACK_IMPORTED_MODULE_3__);\n/* harmony import */ var _carousel__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ./carousel */ \"./src/site/carousel.js\");\n/* harmony import */ var _carousel__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(_carousel__WEBPACK_IMPORTED_MODULE_4__);\n/* harmony import */ var _custom_checkboxes__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! ./custom-checkboxes */ \"./src/site/custom-checkboxes.js\");\n/* harmony import */ var _custom_checkboxes__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(_custom_checkboxes__WEBPACK_IMPORTED_MODULE_5__);\n/* harmony import */ var _qty__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! ./qty */ \"./src/site/qty.js\");\n/* harmony import */ var _qty__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(_qty__WEBPACK_IMPORTED_MODULE_6__);\n/* harmony import */ var _service_table__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./service-table */ \"./src/site/service-table.js\");\n/* harmony import */ var _service_table__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(_service_table__WEBPACK_IMPORTED_MODULE_7__);\n/* harmony import */ var _calculator__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! ./calculator */ \"./src/site/calculator.js\");\n/* harmony import */ var _calculator__WEBPACK_IMPORTED_MODULE_8___default = /*#__PURE__*/__webpack_require__.n(_calculator__WEBPACK_IMPORTED_MODULE_8__);\n\n\n\n\n\n\n\n\n\n\n//# sourceURL=webpack:///./src/site/index.js?");

/***/ }),

/***/ "./src/site/mobile-menu.js":
/*!*********************************!*\
  !*** ./src/site/mobile-menu.js ***!
  \*********************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

eval("/* WEBPACK VAR INJECTION */(function($) {/**\n * Mobile menu\n */\n$('.header-nav-list .menu-item-has-children').on('click', function (e) {\n  if ('A' != e.target.nodeName && 'a' != e.target.nodeName) {\n    e.stopPropagation();\n    $(this).toggleClass('open');\n  }\n});\n/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ \"jquery\")))\n\n//# sourceURL=webpack:///./src/site/mobile-menu.js?");

/***/ }),

/***/ "./src/site/navigation-search.js":
/*!***************************************!*\
  !*** ./src/site/navigation-search.js ***!
  \***************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

eval("/* WEBPACK VAR INJECTION */(function($) {/**\n * Navigation Search\n */\n$('.header-nav-search').on('click', function () {\n  var searchButton = $(this),\n      parent = searchButton.parent();\n  parent.addClass('show-control');\n});\n/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ \"jquery\")))\n\n//# sourceURL=webpack:///./src/site/navigation-search.js?");

/***/ }),

/***/ "./src/site/popup.js":
/*!***************************!*\
  !*** ./src/site/popup.js ***!
  \***************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

eval("/* WEBPACK VAR INJECTION */(function($, jQuery) {/**\n * Fancybox\n */\n$('[data-fancybox]').fancybox({\n  afterLoad: function afterLoad(instance, slide) {\n    $('.single-product,.woocommerce-cart').each(function () {\n      var $body = $(this),\n          $popup = slide.$slide,\n          $orderField = $popup.find('[name=\"your-order\"]'),\n          orderFieldData = [];\n\n      if ($body.hasClass('single-product')) {\n        $orderField.val($('h1').eq(0).text() + ', Цена: ' + $('.product-buy-price').text());\n      }\n\n      if ($body.hasClass('woocommerce-cart')) {\n        $('.woocommerce-cart-form__cart-item').each(function () {\n          var $productRow = $(this),\n              productTitle = $productRow.find('.cart-product-title a').text(),\n              productQty = $productRow.find('.input-text.qty.text').val(),\n              productSum = $productRow.find('.cart-product-subtotal .woocommerce-Price-amount').text();\n          orderFieldData.push({\n            title: productTitle,\n            qty: productQty,\n            sum: productSum\n          });\n        });\n\n        if (orderFieldData.length > 0) {\n          var orderFieldRows = [];\n          $.each(orderFieldData, function (index, object) {\n            orderFieldRows.push(object.title + ', Количество: ' + object.qty + ', Общая цена: ' + object.sum);\n          });\n          $orderField.val(orderFieldRows.join(\"\\n\"));\n        }\n      }\n    });\n  }\n});\n/**\n * Callbacks for CF7 successful submits\n */\n\ndocument.addEventListener('wpcf7mailsent', function (event) {\n  jQuery.fancybox.close();\n  jQuery.fancybox.open('<div class=\"popup-container\"><div class=\"popup widget _nomargin _dark _important text-center\"><div class=\"h2 widget-title _big\" style=\"margin-bottom: 0\">Сообщение успешно отправлено</div></div></div>');\n  setTimeout(function () {\n    if ('389' == event.detail.contactFormId) {\n      jQuery(location).attr('href', cart.urlEmpty);\n    } else {\n      jQuery.fancybox.close();\n      jQuery('.wpcf7-response-output').hide();\n    }\n  }, 2000);\n}, false);\n/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ \"jquery\"), __webpack_require__(/*! jquery */ \"jquery\")))\n\n//# sourceURL=webpack:///./src/site/popup.js?");

/***/ }),

/***/ "./src/site/qty.js":
/*!*************************!*\
  !*** ./src/site/qty.js ***!
  \*************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

eval("/* WEBPACK VAR INJECTION */(function($) {/**\n * Qty calc control\n */\n$('.calc-form-qty-control').each(function () {\n  var control = $(this);\n  control.wrap('<span class=\"calc-form-qty\"/>').before('<span class=\"calc-form-qty-toggle _minus\">&minus;</span>').after('<span class=\"calc-form-qty-toggle _plus\">+</span></span>');\n  var toggle = control.parents('.calc-form-qty').eq(0).find('.calc-form-qty-toggle');\n  changeQty(control, toggle);\n});\n/**\n * Qty Cart control\n */\n\n$(document).on('set_qty_controls', function () {\n  $('.cart-product-quantity-container [type=\"number\"]').each(function () {\n    var $control = $(this),\n        $toggles = $control.parents('.cart-product-quantity-container').eq(0).find('.btn');\n    changeQty($control, $toggles);\n  });\n}).trigger('set_qty_controls');\n$(document.body).on('updated_cart_totals', function () {\n  $(document).trigger('set_qty_controls');\n});\n\nfunction changeQty($control, $toggles) {\n  var updateButtonTimer;\n  $toggles.on('click', function (e) {\n    var $toggle = $(this),\n        controlValue = $control.val();\n\n    if ($toggle.hasClass('_minus')) {\n      if (controlValue > 1) {\n        $control.val(--controlValue);\n      }\n    } else {\n      $control.val(++controlValue);\n    }\n\n    if (controlValue !== $control.val()) {\n      $control.trigger('change');\n    }\n  });\n  $control.on('change', function () {\n    $('[name=\"update_cart\"]').each(function () {\n      var $updateButton = $(this);\n      clearTimeout(updateButtonTimer);\n      updateButtonTimer = setTimeout(function () {\n        $updateButton.trigger('click');\n      }, 1500);\n    });\n  });\n}\n/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ \"jquery\")))\n\n//# sourceURL=webpack:///./src/site/qty.js?");

/***/ }),

/***/ "./src/site/service-table.js":
/*!***********************************!*\
  !*** ./src/site/service-table.js ***!
  \***********************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

eval("/* WEBPACK VAR INJECTION */(function($) {/**\n * Service Table\n */\n$('.calc-st-table').each(function () {\n  var $table = $(this),\n      $options = $table.find('.calc-st-option'),\n      $infoRow = $table.find('.calc-st-info'),\n      $info = $table.find('.calc-st-selected'),\n      $dataField = $('[name=\"service-list\"]'),\n      dataFieldOptions = [];\n  dataPrice = 0;\n  $options.each(function () {\n    var $option = $(this),\n        val = $option.val();\n    $option.on('update', function () {\n      var $option = $(this),\n          optionPrice = +$option.data('price');\n\n      if ($option.prop('checked')) {\n        dataFieldOptions.push(val);\n        dataPrice += optionPrice;\n      } else {\n        var index = dataFieldOptions.indexOf(val);\n\n        if (index != -1) {\n          dataFieldOptions.splice(index, 1);\n          dataPrice -= optionPrice;\n        }\n      }\n    }).on('change', function () {\n      $(this).trigger('update');\n      $table.trigger('setData');\n    }).trigger('update');\n  });\n  $table.on('setData', function () {\n    if (dataFieldOptions.length > 0) {\n      $info.text('Выбрано услуг: ' + dataFieldOptions.length + ', на сумму: ' + dataPrice);\n      $table.addClass('_show');\n    } else {\n      $info.text('');\n      $table.removeClass('_show');\n    }\n\n    $dataField.val(dataFieldOptions.join('; '));\n  }).trigger('setData');\n});\n/* WEBPACK VAR INJECTION */}.call(this, __webpack_require__(/*! jquery */ \"jquery\")))\n\n//# sourceURL=webpack:///./src/site/service-table.js?");

/***/ }),

/***/ "jquery":
/*!*************************!*\
  !*** external "jQuery" ***!
  \*************************/
/*! no static exports found */
/***/ (function(module, exports) {

eval("module.exports = jQuery;\n\n//# sourceURL=webpack:///external_%22jQuery%22?");

/***/ })

/******/ });