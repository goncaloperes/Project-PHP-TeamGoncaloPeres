<?php include('includes/header.php'); ?>

<ul id="topics">
    <li id="main-topic" class="topic topic">
        <div class="row">
            <div class="col-md-2">
                <div class="user-info">
                    <img class="avatar pull-left" src="<?php echo BASE_URI; ?>images/avatars/<?php echo $topics->avatar; ?>" />
                    <ul>
                        <li><strong><?php echo $topics->username; ?></strong></li>
                        <li><?php echo userPostCount($topics->user_id); ?> Posts</li>
                        <li><a href="<?php echo BASE_URI; ?>topics.php?user=<?php echo $topics->user_id; ?>">View topics</a>
                    </ul>
                </div>
            </div>
            <div class="col-md-10">
                <div class="topic-content pull-right">
                    <?php echo $topics->body; ?>
                </div>
            </div>
        </div>
    </li>

    <?php foreach($replies as $reply) : ?>
        <li class="topic topic">
            <div class="row">
                <div class="col-md-2">
                    <div class="user-info">
                        <img class="avatar pull-left" src="<?php echo BASE_URI; ?>images/avatars/<?php echo $reply->avatar; ?>" />
                        <ul>
                            <li><strong><?php echo $reply->username; ?></strong></li>
                            <li><?php echo userPostCount($reply->user_id); ?> Posts</li>
                            <li><a href="<?php echo BASE_URI; ?>topics.php?user=<?php echo $reply->user_id; ?>">View Topics</a>
                        </ul>
                    </div>
                </div>
                <div class="col-md-10">
                    <div class="topic-content pull-right">
                        <?php echo $reply->body; ?>
                    </div>
                </div>
            </div>
        </li>
    <?php endforeach; ?>

</ul>
<?php if (isLoggedIn()) : ?>
<h3>Reply To Topic</h3>
<form role="form" method="post" action="topic.php?id=<?php echo $topics->id; ?>">
    <div class="form-group">
        <textarea id="reply" rows="10" cols="80" class="form-control" name="body"></textarea>
    </div>
    <button name="do_reply" type="submit" class="btn btn-default">Submit</button>
</form>
<?php else : ?>
    <p> </p>
<?php endif; ?>

<?php include('includes/footer.php'); ?>
