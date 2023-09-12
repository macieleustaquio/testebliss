<?php
// Verifica se temos imagens para exibir
if (have_rows('slider_images')): ?>

    <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <?php
            $i = 0;
            while (have_rows('slider_images')): the_row(); ?>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?php echo $i; ?>" <?php if ($i == 0) echo 'class="active"'; ?>></button>
            <?php
            $i++;
            endwhile;
            ?>
        </div>

        <div class="carousel-inner">
            <?php
            $j = 0;
            while (have_rows('slider_images')): the_row();
                $image = get_sub_field('image');
                ?>
                <div class="carousel-item <?php if ($j == 0) echo 'active'; ?>">
                    <img src="<?php echo esc_url($image['url']); ?>" class="d-block w-100" alt="<?php echo esc_attr($image['alt']); ?>">
                </div>
            <?php
            $j++;
            endwhile;
            ?>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>

<?php endif; ?>
