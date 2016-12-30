@extends('app')


@section('content')

	<div>
		<form method="POST" action='{{ url("/messages") }}'>
			{!! csrf_field() !!}
			<div class="form-group">
				<div class="row">
					<div class="col-xs-4 col-xs-offset-4">
						<label for="message">Message:</label>
						<input type="text" id="message" name="message"></input>
						<button type="submit" class="btn btn-primary">Submit</button>
					</div>
				</div>
			</div>
		</form>

		<div class="message_feed">
			@foreach($messages as $message)
				<div class="row">
					<div class="col-sm-8 col-sm-offset-2">
						<div class="competitor">{{ $message->name }} : {{ $message->search_text }}</div>
						<div class="message text-center"><img src="{{ $message->image_path }}"></img></div>
						<hr />
					</div>
				</div>
			@endforeach
		</div>
	</div>

@endsection