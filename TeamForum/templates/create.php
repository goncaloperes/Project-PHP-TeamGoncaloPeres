<?php include('includes/header.php'); ?>

<form role="form" method="post" action="create.php">
    <div class="form-group">
        <label><b>Topic Title</b></label>
        <input type="text" class="form-control" name="title" placeholder="Enter Post Title">
    </div>
    <div class="form-group">
        <label><b>Category</b></label>
        <select class="form-control" name="category">
            <?php foreach(getCategories() as $category) : ?>
                <option value="<?php echo $category->id; ?>><?php echo $category->name ?></option>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="form-group">
            <label><b>Topic Body</b></label>
        <textarea id="body" rows="10" cols="80" class="form-control" name="body"></textarea>
    </div>
    <button name="do_create" type="submit" class="btn btn-default">Submit</button>
</form>

<?php include('includes/footer.php'); ?>
