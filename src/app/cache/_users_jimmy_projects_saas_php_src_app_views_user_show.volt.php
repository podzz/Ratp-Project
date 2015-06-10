<h1><?php echo $user->email; ?></h1>
<h1><?php echo $user->token; ?></h1>
<h5><?php echo $this->tag->linkTo(array('/user/tokenize/' . $user->id, 'Change Token')); ?></h5>
<br>
<?php echo $this->tag->linkTo(array('/user/', 'Back')); ?>