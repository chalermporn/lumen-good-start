<!DOCTYPE html>
<html>
<head>
	<title>Good start with lumen</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.4.1/css/bulma.css">
	<link rel="stylesheet" href="{{ url('css/app.css') }}">
</head>
<body>
	<div class="columns content" id="app">
		 <div class="column is-6 is-offset-3">
		    <h1 class="text-center">@{{ wlecome }}</h1>
		    <h2 class="text-center">@{{ text }}</h2>

		    <div class="tabs is-centered">
			  <ul>
			    <li><router-link to="/">Text</router-link></li>
			    <li><router-link to="/video">Video</router-link></li>
			    <li><router-link to="/music">Music</router-link></li>
			  </ul>
			</div>
			<div class="content">
				<router-view></router-view>
			</div>
		  </div>
	</div>
	<script src="{{ url('js/app.js') }}"></script>
</body>
</html>
