<?php
    //Template Name: Home
    get_header();
?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
    <!-- --------------- MAIN --------------- -->
    <!-- --------------- MAIN --------------- -->
    <div class="ctn-photo-cover">
        <div class="cover-cover e-flex-col e-wvw e-hvh ">
            <!-- photo cover -->
            <div class="box-img-cover e-wvw e-hvh e-abs">
                <img src="http://unsplash.it/g/1090" alt="" class="img-cover e-img-fit e-abs e-wvw e-hp">
                <div class="fader-cover-cover e-wp e-hp e-img-fit e-abs"></div>
            </div>

            <!-- texts -->
            <h1 class="title-cover "> EFETIVOS THEME</h1>
            <p class="descr-cover"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Id, a. Incidunt unde iste, quasi eos voluptas quo aliquid sapiente animi fugit cumque consectetur repellendus magni officiis molestiae, corrupti accusamus saepe.</p>
        </div>

    </div>


    <!-- --------------- MAIN --------------- -->
    <!-- --------------- MAIN --------------- -->
    <main class="main e-flex e-wvw">
        <div class="holder-main e-wp e-rel e-flex-wrap">


<?php
$args = array(
    'post_type' => 'portfolio'
    
);

$my_query = new WP_Query( $args );                            
if ( $my_query->have_posts() ) {                            
    while ( $my_query->have_posts() ) {
        $my_query->the_post();
        $bla = get_field('portfolio_image');
?>
        <!-- init-post -->
        <div class="box-post e-rel">
            <!-- photo-post -->
            <a href="<?php the_permalink(); ?>">
            <div class="box-photo-post e-wp"> 
                <div class="photo-post  e-wp e-hp" style="background: url(<?php echo $bla[sizes][large]; ?>)"></div>
            </div></a>


            <!-- text-post -->
            <div class="ctn-text-post ">
                <h1 class="title-post e-wp"><?php the_title(); ?></h1>
                <h2 class="category-post e-wp"><?php the_category(); ?></h2>
                <p class="date-post e-wp"> <?php echo get_the_date(); ?></p>
                <p class="descr-post e-wp"> <?php echo preg_replace('/<img[^>]+./','',get_the_content()); ?></p>
                <button class="btn-post"> <a href="<?php the_permalink(); ?>" class="go-post">VER MAIS</a> </button>
            </div>
        </div><!-- close-post -->

                     

<?php 
    }
}
// Reset the `$post` data to the current post in main query.
wp_reset_postdata();
?>
















             <!-- init-post 
            <div class="box-post e-rel">
                ------------ photo-post 
                <div class="box-photo-post e-wp">
                    <div class="photo-post  e-wp e-hp"></div>
                </div>


                -----------  text-post 
                <div class="ctn-text-post ">
                    <h1 class="title-post e-wp">TITULO DO POST</h1>
                    <h2 class="category-post e-wp"> category 1</h2>
                    <p class="date-post e-wp"> 15.04.2018</p>
                    <p class="descr-post e-wp"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Consequuntur architecto repellendus ducimus molestiae, perspiciatis, nisi earum incidunt veritatis, sint nam nulla doloribus in illum eos repudiandae neque atque sed accusantium!</p>
                    <button class="btn-post"> VER MAIS</button>
                </div>
            </div> close-post  -->


        </div>
    </main>
    <?php endwhile; else: endif ?>
<?php get_footer(); ?>