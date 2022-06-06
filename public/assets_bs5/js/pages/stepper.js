(function () {
	"use strict";

	$(document).on('click','#wizard-form .next',function(event) {
        event.preventDefault();
        var $form_active = $(this).parents('.step-form-panel');
        var $stepper_active = $('#wizard-form .steps .step').eq($('.step-form-panel').index($form_active));

        $($stepper_active).removeClass("step-active");
        $($stepper_active).addClass("step-success");
        $($stepper_active).next().addClass("step-active");

        $($form_active).removeClass("active");
        $($form_active).next().addClass("active");
	});
        
	$(document).on('click','#wizard-form .prev',function(event) {
        event.preventDefault();
        var $form_active = $(this).parents('.step-form-panel');
        var $stepper_active = $('#wizard-form .steps .step').eq($('.step-form-panel').index($form_active));

        $($stepper_active).removeClass("step-active");
        $($stepper_active).removeClass("step-success");
        $($stepper_active).prev().removeClass("step-success");
        $($stepper_active).prev().addClass("step-active");

        $($form_active).removeClass("active");
        $($form_active).prev().addClass("active");
    });

    $(document).on('click','#wizard-form .send',function(event) {
        event.preventDefault();
        var $form_active = $(this).parents('.step-form-panel');
        var $stepper_active = $('#wizard-form .steps .step').eq($('.step-form-panel').index($form_active));

        $($stepper_active).removeClass("step-active");
        $($stepper_active).addClass("step-success");
    });

})();