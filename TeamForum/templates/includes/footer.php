</div>
</div>
</div>
<div class="col-md-4">
    <div class="sidebar">
        <div class="block">
            <h3>Login</h3>
            <?php if (isLoggedIn()) : ?>
                <div class="userdata">
                    Welcome, <?php echo getUser()['name']; ?>!
                </div>
            <br>
                <form role="form" method="post" action="logout.php">
                    <input type="submit" name="do_logout" class="btn btn-outline-danger" value="Logout" />
                </form>
            <?php else : ?>
            <form role="form" method="post" action="login.php">
                <div class="form-group">
                    <label><b>Username</b></label>
                    <input name="username" type="text" class="form-control" placeholder="Enter Username">
                </div>
                <div class="form-group">
                    <label><b>Password</b></label>
                    <input name="password" type="password" class="form-control" placeholder="Enter Password">
                </div>
                <button name="do_login" type="submit" class="btn btn-primary">Login</button> <a  class="btn btn-default" href="<?php echo BASE_URI; ?>register.php"> Create Account</a>
            </form>
            <?php endif; ?>
        </div>
        <br>
        <div class="block">
            <h3>Categories</h3>
            <div class="list-group">
                <a href="topics.php" class="list-group-item <?php echo is_active(null); ?>">All Topics <span class="badge pull-right"></span></a>
                <?php foreach(getCategories() as $category) : ?>
                    <a href="topics.php?category=<?php echo $category->id; ?>" class="list-group-item" <?php echo is_active($category->id); ?>"><?php echo $category->name; ?> </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
</div>

</main><!-- /.container -->

<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script>window.jQuery || document.write('<script src="js/bootstrap.js"><\/script>')</script>
<!--<script src="../../../../assets/js/vendor/popper.min.js"></script>-->
<!--<script src="../../../../dist/js/bootstrap.min.js"></script>-->
</body>
</html>
