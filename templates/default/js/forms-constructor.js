var icms = icms || {};

icms.cforms = (function ($) {

    this.onDocumentReady = function() {
        $('.icms-forms__wrap').on('click', '.icms-forms__btn-close', function(){
            return icms.cforms.closeSuccess(this);
        });
	};

    this.closeSuccess = function(link){
        $(link).closest('.icms-forms__full-msg').remove();
        return false;
    };

    this.success = function(result){
        $('#'+result.form_id).closest('.icms-forms__wrap').append(result.success_html);
    };

    return this;

}).call(icms.cforms || {}, jQuery);
function formsSuccess (form_data, result){
    icms.cforms.success(result);
}