const $ = jQuery.noConflict();
import Global from '../shared/global';

'use strict';
const AcfSvgField = {
	$domWpFooter: $('#wpfooter'),
	$domSvgField: $('.fws-svg-icon'),
	slPrependButton: '.acf-input-prepend',
	slIconsWrap: '.js-admin-icons-wrap',
	slIconsInner: '.js-admin-icons-inner',
	slIconsClose: '.js-admin-icons-close',
	slIcon: '.js-admin-icon',
	slIconSvg: '.js-icon-svg',
	slInputWrap: '.acf-input-wrap',
	classActive: 'is-active',
	attrIcon: 'data-icon',
	ajaxAction: 'fws_get_svg_icons',
	prependButtonDefaultText: 'Click to choose an SVG icon',
	localized: window.fwsLocalized,
	activeField: null,

	init: function() {
		if (this.$domSvgField.length > 0) {
			this.bindPopupEvent();
			this.getIcons();
		}
	},

	checkActiveFieldValues: function() {
		const _this = this;

		this.$domSvgField.find(this.slPrependButton).each(function(i, el) {
			const svg = $('[data-icon="' + $(el).siblings(_this.slInputWrap).find('input').val() + '"]');

			if (svg.length > 0) {
				$(el).html(svg.find(_this.slIconSvg).clone());
			}
		});
	},

	bindPopupEvent: function() {
		const _this = this;

		this.$domSvgField.find(this.slPrependButton).on('click', function() {
			$(_this.slIconsWrap).addClass(_this.classActive);
			_this.activeField = $(this);
		});
	},

	bindSvgEvents: function() {
		const _this = this;

		$(this.slIcon).on('click', function() {
			const $icon = $(this);
			const svg = $icon.find(_this.slIconSvg).clone();
			let val = $icon.attr(_this.attrIcon);
			const isDeselect = val === 'deselect-icon';

			val = !isDeselect ? val : '';

			_this.activeField.siblings(_this.slInputWrap).find('input').val(val);
			_this.activeField.html(!isDeselect ? svg : _this.prependButtonDefaultText);

			_this.closeIcons();
		});
	},

	bindCloseEvents: function() {
		// close on x button
		$(this.slIconsClose).on('click', this.closeIcons.bind(this));

		// close on esc key
		Global.escKey(this.closeIcons.bind(this));

		// close when clicked outside
		Global.clickOutsideContainer(
			$(this.slIconsWrap),
			$(this.slIconsInner),
			$(this.slIconsClose),
			this.closeIcons.bind(this)
		);
	},

	closeIcons: function() {
		$(this.slIconsWrap).removeClass(this.classActive);
		this.activeField = null;
	},

	getIcons: function() {
		const _this = this;

		$.ajax({
			method: 'GET',
			url: _this.localized.ajaxUrl,
			data: {
				action: _this.ajaxAction
			},
			success: function(data) {
				// append svg icons to wp footer
				_this.$domWpFooter.append(data);

				// handle close events
				_this.bindCloseEvents();

				// handle svg click events
				_this.bindSvgEvents();

				// load active svg icons
				_this.checkActiveFieldValues();

				// display svg field buttons
				_this.$domSvgField.find(_this.slPrependButton).addClass(_this.classActive);
				_this.$domSvgField.find(_this.slInputWrap).addClass(_this.classActive);
			}
		});
	}
};

export default AcfSvgField;
