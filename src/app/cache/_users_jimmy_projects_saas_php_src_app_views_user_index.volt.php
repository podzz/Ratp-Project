<h1>Users</h1>
<table border="2">
<?php foreach ($users as $user) { ?>
<tr> <td><?php echo $user->id; ?></td><td><?php echo $this->tag->linkTo(array('/user/show/' . $user->id, $user->email)); ?></tr> </td>
<?php } ?>
</table>
<br>