jQuery(document).ready(function(){
    jQuery("#formID").validationEngine();
    $("#formID").bind("jqv.field.result", function(event, field, errorFound, prompText){ console.log(errorFound) })
});