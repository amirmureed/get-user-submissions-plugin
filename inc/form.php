<?php

function form_shortcode_func() { ?>
    <div class="form-container">
    <h2>Sumit Your Article!</h2>
        <form method="POST" action="#" enctype="multipart/form-data" id="postform">
            <input type="text" id="title" name="title" placeholder="Post Title"><br>
            <span id='checkpost'>Post Title or Content Field is Missing!</span><br>
            <textarea name="message" id="content" rows="10" cols="30" placeholder="Post Body"></textarea><br>
            <span>Please Enter Post Content!</span><br>
            <?php
                $args = array(
                            'taxonomy' => 'category',
                            'orderby' => 'name',
                            'order'   => 'ASC'
                        );
                $cats = get_categories($args); ?>
                <select name="categories" id="catlist">
                <?php
                foreach($cats as $cat) {
                ?>
                   <option value="<?php echo $cat->term_id ?>"> <?php echo $cat->name; ?> </option>
                <?php
                }
            ?>
            </select><br>
            <input type="file" id="input-image" name="image" multiple="false" value="" accept=".png, .jpg, .jpeg, .gif"><br>
            <span id="checkimg">Please Enter Post Thumbnail!</span><br>
            <input id="submit" type="button" value="submit" /> <br>
            <p id='postStatus'>Your post submitted successfully!</p>
        </form>
    </div>
<?php }

add_shortcode('form', 'form_shortcode_func');