$(document).ready(function() {
	src = "{{ route('searchajax') }}";
		$("#search_text").autocomplete({
			source: function(request, response) {
				$.ajax({
				url: src,
				dataType: "json",
				data: {
				term : request.term
				},
				success: function(data) {
				response(data);
				
					}
				});
				},
				minLength: 3,
				});
	});
