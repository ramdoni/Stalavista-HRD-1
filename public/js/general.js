/**
 * [numberWithComma description]
 * @param  {[type]} x [description]
 * @return {[type]}   [description]
 */
function numberWithComma(x) {
    return x.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
}

function init_datepicker()
{	 // Select Year
	$('.datepicker').pickadate({
	    selectYears: 8
	});

	jQuery('.datepicker-ui').datepicker({
	    dateFormat: 'yy-mm-dd',
	    changeMonth: true,
	    changeYear : true
	});
}

init_datepicker();