/**
 * Functionality specific to Zanblog.
 *
 * Provides helper functions to enhance the theme experience.
 *
 * Website: www.yeahzan.com
 */

jQuery(function () {

	topFixed();
	dropDown();
	panelToggle();
	panelClose();
	btnLoading();
	preLoadImg();
	setImgHeight();

    jQuery('#myTab a:last').tab('show');

    /**
	 * Navbar fixed.
	 */
    function topFixed() {

    	zanHeader = jQuery("#zan-header");
    	body = jQuery("body");
    	ifFixed = zanHeader.find("input[type='checkbox']");

	    ifFixed.iCheck({
	    	checkboxClass: 'icheckbox_flat-red',
	    	radioClass: 'iradio_flat-red'
	  	});

	  	ifFixed.on('ifChecked', function(event){
		  	zanHeader.addClass("navbar-fixed-top");
		  	body.addClass("nav-fixed");

		}).on('ifUnchecked', function(event) {
			zanHeader.removeClass("navbar-fixed-top");
		  	body.removeClass("nav-fixed");
		});
	}

	/**
	 * Navbar submenu dropdown.
	 */
	function dropDown() {

		dropDownLi = jQuery("li.dropdown");

		dropDownLi.mouseover(function() {
			jQuery(this).addClass("open");
		}).mouseout(function() {
			jQuery(this).removeClass("open");
		});
	}

	/**
	 * Sidebar panel toggle.
	 */
	function panelToggle () {
		
		var toggleBtn = jQuery(".panel-toggle");
		toggleBtn.data("toggle", true);

		toggleBtn.click(function() {

			var btn = jQuery(this);

			if(btn.data("toggle")) {

				btn.removeClass("icon-chevron-sign-up").addClass("icon-chevron-sign-down");
				btn.parents("div.panel").addClass("toggled");
				btn.data("toggle", false);
			} else {

				btn.removeClass("icon-chevron-sign-down").addClass("icon-chevron-sign-up");
				btn.parents("div.panel").removeClass("toggled");
				btn.data("toggle", true);
			}

		});
	}

	/**
	 * Sidebar panel close.
	 */
	function panelClose() {

		var closeBtn = jQuery(".panel-remove");

		closeBtn.click(function() {

			var btn = jQuery(this);

			btn.parents(".panel").toggle(300);
			
		});
	}

	/**
	 * Loading btn action.
	 */
	function btnLoading() {

		var loadBtn = jQuery("#load-more");
		var loadData = loadBtn.attr("load-data");

		loadBtn.click(function() {

			loadBtn.addClass("disabled");
			loadBtn.find("i").addClass("icon-spin icon-spinner");
			loadBtn.find("attr").text(loadData);
		})
	}

	/**
	 * Preload background img.
	 */
	function preLoadImg() {

		function preloadImages(array) {
		    if (!preloadImages.list) {
		        preloadImages.list = [];
		    }
		    for (var i = 0; i < array.length; i++) {
		        var img = new Image();
		        img.src = array[i];
		        preloadImages.list.push(img);
		    }
		}

		var imageURLs = [
		    "wp-content/themes/zanblog/ui/images/arrow_hover.png"
		];

		if (!imageURLs.length) preloadImages(imageURLs);

	}

	/**
	 * Set img auto height to adapt screen.
	 */
	function setImgHeight() {

		var img = jQuery(".centent-article p").find("img");

		img.each(function() {

			var $this = jQuery(this);
			var attrWidth = $this.attr("width");
			var attrHeight = $this.attr("height");
			var width = $this.width();

			var scale = width / attrWidth;
			var height = scale * attrHeight;

			$this.css("height", height);

		});
	}
});
