Hi,<br/>
New account has been created for You on {{ $url }}<br/>
<br/>
Your password is: <strong>{{ $pass }}</strong><br/>
<br/>
To change the password please click <a href="{{ action('Auth\PasswordController@getEmail') }}">here</a>