<h1>Users</h1>
<table border="2">
{% for user in users %}
<tr> <td>{{ user.id }}</td><td>{{ link_to('/user/show/' ~ user.id, user.email) }}</tr> </td>
{% endfor %}
</table>
<br>