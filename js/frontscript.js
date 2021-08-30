$(document).ready(function() {
	
	$("a.delete").click(function() {
		var sure = window.confirm("Are you sure you want to delete?");
		if(!sure) {
			event.preventDefault();
		}
	});
	
	window.setTimeout(function() { 
		$(".alert").slideUp(500);
	}, 5000);
	
	$("a.print").click(function() {
		window.print();
	});

	$("#bonus").change(function() {
		var bonus = parseInt($("#bonus").val());
		var net_salary = parseInt($("#net_salary_amount").val());
		
		$("#net_salary").val(net_salary + bonus);
	});

	
	$("select#department_id").change(function() {
		var department_id = $(this).val();
		if(department_id != "") {
			$.post("find_department_staff.php", "department_id=" + department_id, function(data) {
				$("#staff_id").html(data);
			});
		}
	});
	
	$("#photo-chooser").change(function() {
		handleFileSelect(this);
	});
	
});

function handleFileSelect(input) {
	if(input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function(e) {
			$("#photo").attr("src", e.target.result);
		}
		reader.readAsDataURL(input.files[0]);
	}
}