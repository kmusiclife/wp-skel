<article class="col-4">
    <div class="card h-100">
        <a href="<?php the_permalink() ?>"><img class="bd-placeholder-img card-img-top w-100" src="<?php echo $thumbnail_image ?>" alt="<?php the_title() ?>"></a>
        <div class="card-body">
            <h3><?php the_title() ?></h3>
            <p class="card-text"><?php echo $description ?></p>
            <ul>
                <?php foreach($categories as $category): ?>
                    <li><a href="<?php echo get_category_link($category) ?>"><?php echo $category->name ?></a></li>
                <?php endforeach; ?>
            </ul>
        </div>
        <div class="card-footer">
            <div class="datetime">
                <small class="text-muted"><small>記事公開日</small> <?php echo get_the_date() ?></small>
            </div>
            <a href="<?php the_permalink() ?>"><button type="button" class="btn btn-primary">この記事の詳細</button></a>
        </div>
    </div>
</article>
