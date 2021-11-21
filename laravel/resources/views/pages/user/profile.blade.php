<h1>Profil</h1>
<p>Steam ID: {{$user->id}}</p>
<p>Nickname: {{$user->nickname}}</p>
<p>Name: {{$user->name}}</p>
<p>Avatar: {{$user->avatar}}</p>
<a href = {{route('logout')}}>Abmelden</a>