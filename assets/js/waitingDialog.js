var waitingDialog = waitingDialog || (function ($) {
    'use strict';

    let head_color = "#0651b7";
    let bg_color = "#a6a6a6";
    let bar_color = "#05538d";

	var $dialog = $(
		'<div class="modal fade waitingDialog" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-hidden="true" style="padding-top:15%; overflow-y:visible;">' +
		'<div class="modal-dialog modal-m">' +
		'<div class="modal-content" style="background-color:'+bg_color+';padding-bottom:20px;">' +
			'<div class="modal-header" style="background-color:'+head_color+' !important;width: 100.5%;margin-top:-4px;border-width: 0px !important;border-radius: 8px 8px 0px 0px;">'+
			'<h5 class="modal-title gothic-medium" style="color:white !important"></h5></div>' +
			'<div class="modal-body">' +
				'<div class="progress progress-striped active" style="margin-bottom:0;"><div class="progress-bar progress-bar-striped progress-bar-animated" style="width: 100%;background-color:'+bar_color+' !important;"></div></div>' +
			'</div>' +
		'</div></div></div>');

	return {
		/**
		 * Opens our dialog
		 * @param message Custom message
		 * @param options Custom options:
		 * 				  options.dialogSize - bootstrap postfix for dialog size, e.g. "sm", "m";
		 * 				  options.progressType - bootstrap postfix for progress bar type, e.g. "success", "warning".
		 */
		show: function (message, options) {
			// Assigning defaults
			if (typeof options === 'undefined') {
				options = {};
			}
			if (typeof message === 'undefined') {
				message = 'Loading';
			}
			var settings = $.extend({
				dialogSize: 'm',
				progressType: '',
				onHide: null // This callback runs after the dialog was hidden
			}, options);

			// Configuring dialog
			$dialog.find('.modal-dialog').attr('class', 'modal-dialog').addClass('modal-' + settings.dialogSize);
			$dialog.find('.progress-bar').attr('class', 'progress-bar progress-bar progress-bar-striped progress-bar-animated');
			if (settings.progressType) {
				$dialog.find('.progress-bar').addClass('progress-bar-' + settings.progressType);
			}
			$dialog.find('h5').text(message);
			// Adding callbacks
			if (typeof settings.onHide === 'function') {
				$dialog.off('hidden.bs.modal').on('hidden.bs.modal', function (e) {
					settings.onHide.call($dialog);
				});
			}
			// Opening dialog
			$dialog.modal();
		},
		/**
		 * Closes dialog
		 */
		hide: function () {
			$dialog.modal("hide");
		}
	};

})(jQuery);