var name = document.getElementById('name');
var dob = document.getElementById('dob');
var email = document.getElementById('email');
var language = document.getElementById('email');

$(document).ready(function() {
	$('form').on('submit', function(e) {
		e.preventDefault();

		swal({
			title: 'Are you sure?',
			text: 'Once deleted, you will not be able to recover this imaginary file!',
			icon: 'warning',
			buttons: true,
			dangerMode: true
		}).then((willDelete) => {
			if (willDelete) {
				saveAjax();
				swal('Poof! Your imaginary file has been deleted!', {
					icon: 'success'
				});
			} else {
				swal('Your imaginary file is safe!');
			}
		});

		function saveAjax() {
			$.ajax({
				type: 'POST',
				url: '/create_programmer',
				data: $('form').serialize(),
				success: function() {
					console.log('submitted');
				}
			});
		}
	});
});
