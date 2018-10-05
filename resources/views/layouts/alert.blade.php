@section('js')
<script src="{{ asset('app-assets/vendors/js/extensions/sweetalert.min.js') }}" type="text/javascript"></script>
<script type="text/javascript">
	@if(Session::has('message-success'))
		setTimeout(function(){
      		swal("Success", "{{ Session::get('message-success') }}", "success");			
		}, 500);
    @endif
    @if(Session::has('message-error'))
		setTimeout(function(){
      		swal("Error!", "{{ Session::get('message-error') }}", "error");
      	}, 500);
    @endif
</script>
@endsection