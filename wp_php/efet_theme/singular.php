<?php
    //Template Name: Page Post
    get_header();
?>
<?php get_header();?>
	<?php 
	if ( have_posts() ) {
		while ( have_posts() ) {
			the_post(); 
			// ?>


<!-- --------------- MAIN --------------- -->
    <!-- --------------- MAIN --------------- -->
    <div class="post-page-main">
        <div class="ctn-photo-cover ">
            <div class="cover-cover e-flex-col e-wvw e-hvh ">

                <!-- photo cover -->
                <div class="box-img-cover e-wvw e-hvh e-abs">
                <?php $bla = get_field('portfolio_image');?>
                    <img src="<?php echo $bla[sizes][large]; ?>" alt="" class="img-cover e-img-fit e-abs e-wvw e-hp">
                    <div class="fader-cover-cover e-wp e-hp e-img-fit e-abs"></div>
                </div>

                <!-- texts -->
                <h1 class="title-cover "><?php the_title() ?></h1>
                <p class="descr-cover"> Lorem ipsum dolor sit amet consectetur adipisicing elit. Id, a. Incidunt unde iste, quasi eos voluptas quo aliquid sapiente animi fugit cumque consectetur repellendus magni officiis molestiae, corrupti accusamus saepe.</p>
            </div>

        </div>


        <!-- --------------- MAIN --------------- -->
        <!-- --------------- MAIN --------------- -->
        <main class="main e-flex e-wvw">
            <div class="holder-main e-wp e-rel e-flex-col">

 <?php the_content(); ?>
            </div>
        </main>
    </div>

<?php
		} // end while
	} // end if
	?>
<?php get_footer(); ?>