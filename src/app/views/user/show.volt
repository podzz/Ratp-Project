<h1>{{ user.email }}</h1>
<h1>{{ user.token }}</h1>
<h5>{{ link_to('/user/tokenize/' ~ user.id, 'Change Token') }}</h5>
<br>
{{ link_to('/user/', 'Back') }}