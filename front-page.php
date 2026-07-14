<?php get_header(); ?>

<section class="hero">
  <div class="hero-inner">

    <div class="hero-text">
      <h1>Discover Your Dream Property with Estatein</h1>
      <p>Your journey to finding the perfect property begins here. Explore our listings to find the home that matches your dreams.</p>

      <div class="hero-buttons">
        <a href="#" class="btn btn-outline">Learn More</a>
        <a href="<?php echo esc_url(home_url('/properties')); ?>" class="btn btn-primary">Browse Properties</a>
      </div>

      <div class="hero-stats">
        <div class="stat">
          <span class="stat-number">200+</span>
          <span class="stat-label">Happy Customers</span>
        </div>
        <div class="stat">
          <span class="stat-number">10k+</span>
          <span class="stat-label">Properties For Clients</span>
        </div>
        <div class="stat">
          <span class="stat-number">16+</span>
          <span class="stat-label">Years of Experience</span>
        </div>
      </div>
    </div>

    <div class="hero-media">
      <img src="<?php echo get_template_directory_uri(); ?>/assets/images/hero-buildings.png" alt="Modern skyscrapers" class="hero-image">
    </div>

    <div class="hero-badge">
      <svg viewBox="0 0 175 175" class="badge-circle-text">
        <defs>
          <path id="badgeCirclePathTop" d="M 21.5,87.5 A 66,66 0 0 1 153.5,87.5" />
          <path id="badgeCirclePathBottom" d="M 153.5,87.5 A 66,66 0 0 1 21.5,87.5" />
        </defs>
        <text font-size="13" font-weight="600" fill="#ffffff" letter-spacing="1">
          <textPath href="#badgeCirclePathTop" startOffset="50%" text-anchor="middle">
            DISCOVER YOUR DREAM
          </textPath>
        </text>
        <text font-size="13" font-weight="600" fill="#ffffff" letter-spacing="1">
          <textPath href="#badgeCirclePathBottom" startOffset="50%" text-anchor="middle">
            PROPERTY &#8226; ESTATEIN
          </textPath>
        </text>
      </svg>
      <div class="hero-badge-center">
        <svg class="hero-badge-arrow" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M7 17L17 7M7 7h10v10"/></svg>
      </div>
    </div>
  </div>
</section>

</div><!-- .hero-zone -->

<section class="features">
  <div class="features-panel">
  <div class="features-grid">

    <div class="feature-card">
      <div class="feature-icon-outer">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-feature-1.svg" alt="" class="feature-icon-img">
      </div>
      <a href="#" class="feature-arrow" aria-label="Learn more"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 17L17 7M7 7h10v10"/></svg></a>
      <h3>Find Your Dream Home</h3>
    </div>

    <div class="feature-card">
      <div class="feature-icon-outer">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-feature-2.svg" alt="" class="feature-icon-img">
      </div>
      <a href="#" class="feature-arrow" aria-label="Learn more"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 17L17 7M7 7h10v10"/></svg></a>
      <h3>Unlock Property Value</h3>
    </div>

    <div class="feature-card">
      <div class="feature-icon-outer">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-feature-3.svg" alt="" class="feature-icon-img">
      </div>
      <a href="#" class="feature-arrow" aria-label="Learn more"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 17L17 7M7 7h10v10"/></svg></a>
      <h3>Effortless Property Management</h3>
    </div>

    <div class="feature-card">
      <div class="feature-icon-outer">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-feature-4.svg" alt="" class="feature-icon-img">
      </div>
      <a href="#" class="feature-arrow" aria-label="Learn more"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M7 17L17 7M7 7h10v10"/></svg></a>
      <h3>Smart Investments, Informed Decisions</h3>
    </div>

  </div>
  </div>
</section>

<section class="properties">
  <div class="container">

    <div class="section-header">
      <div>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-sparkle-accent.png" alt="" class="section-accent">
        <h2>Featured Properties</h2>
        <p>Explore our handpicked selection of featured properties. Each listing offers a glimpse into exceptional homes and investments available through Estatein.</p>
      </div>
      <a href="<?php echo esc_url(home_url('/properties')); ?>" class="btn btn-outline">View All Properties</a>
    </div>

    <div data-carousel>
    <div class="properties-grid" data-carousel-track>
      <?php
      $properties_query = new WP_Query(array(
          'post_type'      => 'property',
          'posts_per_page' => -1,
          'orderby'        => 'date',
          'order'          => 'DESC',
      ));

      if ( $properties_query->have_posts() ) :
          while ( $properties_query->have_posts() ) : $properties_query->the_post();
              $bedrooms   = get_field('bedrooms');
              $bathrooms  = get_field('bathrooms');
              $type       = get_field('property_type');
              $price      = get_field('price');
              $short_desc = get_field('short_description');
          ?>
          <div class="property-card">
            <?php if ( has_post_thumbnail() ) : ?>
              <?php the_post_thumbnail('large', array('class' => 'property-image', 'alt' => get_the_title())); ?>
            <?php endif; ?>
            <div class="property-body">
              <h3><?php the_title(); ?></h3>
              <p><?php echo esc_html($short_desc); ?> <a href="<?php the_permalink(); ?>" class="read-more-link">Read More</a></p>
              <div class="property-meta">
                <span class="meta-pill">
                  <svg class="pill-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_122_2005)">
                      <path d="M12.0119 19.4597C9.01369 19.4597 6.01627 19.4597 3.01806 19.4597C2.71493 19.4597 2.57479 19.5984 2.57479 19.8977C2.57479 19.9752 2.57872 20.0527 2.574 20.1295C2.5677 20.2225 2.55825 20.3155 2.54093 20.4062C2.47637 20.7372 2.15907 21.0023 1.77957 20.9984C1.39849 20.9946 1.08277 20.7116 1.02529 20.3481C1.01191 20.2628 1.00482 20.1752 1.00482 20.0891C1.00403 18.3279 0.992223 16.5659 1.00876 14.8046C1.0182 13.7783 1.39771 12.8853 2.12521 12.1419C2.56691 11.6907 3.09207 11.3698 3.69282 11.1651C4.16522 11.0046 4.65338 10.9558 5.15098 10.9558C9.76246 10.9574 14.3739 10.9535 18.9854 10.9589C20.3365 10.9605 21.4309 11.4969 22.2419 12.5636C22.6403 13.0884 22.8781 13.6845 22.9592 14.3357C22.9867 14.555 22.9985 14.7783 22.9993 15C23.0025 16.7101 23.0017 18.4202 23.0009 20.1302C23.0009 20.3977 22.934 20.6411 22.7104 20.8178C22.4741 21.0046 22.2104 21.0535 21.9293 20.9395C21.66 20.8295 21.49 20.6271 21.4514 20.338C21.4317 20.1922 21.4341 20.0426 21.4301 19.8953C21.4238 19.6574 21.3238 19.5139 21.1239 19.4698C21.0798 19.4597 21.0333 19.4605 20.9876 19.4605C17.9965 19.4605 15.0054 19.4605 12.0135 19.4605L12.0119 19.4597Z" fill="white"/>
                      <path d="M11.9025 4C13.8472 4 15.7912 4 17.7351 4C18.3862 4 18.9949 4.14341 19.52 4.53953C20.1956 5.04884 20.59 5.71938 20.6231 6.56124C20.6514 7.27519 20.6388 7.9907 20.642 8.70543C20.6444 9.16589 20.642 9.62636 20.642 10.0868C20.642 10.1279 20.6396 10.1713 20.6286 10.2109C20.5948 10.3357 20.5263 10.3853 20.3971 10.3612C20.2562 10.3349 20.12 10.2783 19.979 10.2628C19.6476 10.2271 19.3153 10.2023 18.9823 10.1853C18.7602 10.1736 18.6917 10.1341 18.6602 9.91938C18.5595 9.23876 17.9194 8.62636 17.1005 8.63566C16.1872 8.64574 15.2739 8.63798 14.3613 8.63798C13.6819 8.63798 13.1016 9.03643 12.8709 9.66434C12.8378 9.75426 12.8252 9.85194 12.8079 9.94651C12.7756 10.1163 12.7119 10.1798 12.5402 10.1822C12.1804 10.186 11.8198 10.186 11.46 10.1822C11.2946 10.1806 11.2293 10.1163 11.1994 9.92791C11.1576 9.66357 11.0537 9.42791 10.8836 9.22093C10.5758 8.84574 10.1774 8.64186 9.68609 8.63953C8.74363 8.63488 7.80118 8.63721 6.85794 8.63876C6.06587 8.63953 5.44623 9.24884 5.34545 9.91783C5.31317 10.1341 5.24782 10.1721 5.02579 10.186C4.6581 10.2101 4.29041 10.2442 3.92351 10.2829C3.81092 10.2946 3.70305 10.3426 3.59125 10.3612C3.47078 10.3806 3.41488 10.3403 3.38103 10.224C3.36764 10.1783 3.36134 10.1295 3.36134 10.0814C3.36055 8.97674 3.3456 7.87209 3.36449 6.76744C3.38418 5.61163 3.92666 4.76202 4.988 4.24806C5.40844 4.04574 5.86431 4 6.3257 4C8.18462 4 10.0435 4 11.9025 4Z" fill="white"/>
                    </g>
                    <defs><clipPath id="clip0_122_2005"><rect width="22" height="17" fill="white" transform="translate(1 4)"/></clipPath></defs>
                  </svg>
                  <?php echo esc_html($bedrooms); ?>-Bedroom
                </span>
                <span class="meta-pill">
                  <svg class="pill-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g clip-path="url(#clip0_122_2009)">
                      <path d="M2.26946 15.7616H12.11V17.5697H18.2615V15.7655H20.7054C20.8637 17.9158 20.8761 19.8304 18.6707 21.2897C18.6437 21.3075 18.6221 21.3318 18.5623 21.385C18.8335 21.6103 19.1009 21.8329 19.3655 22.0529C19.0082 22.3945 18.7212 22.669 18.3922 22.9842C18.1019 22.6848 17.7879 22.3373 17.4458 22.0207C17.3453 21.9275 17.1673 21.8894 17.0215 21.8802C16.7831 21.8657 16.5414 21.9045 16.301 21.9052C13.1057 21.9071 9.91048 21.9065 6.71457 21.9065C6.56154 21.9065 6.398 21.936 6.25679 21.8933C5.83054 21.7653 5.55994 21.9629 5.30642 22.2684C5.09034 22.5284 4.84405 22.7629 4.61877 23.0007C4.31468 22.6808 4.03949 22.3918 3.73474 22.0707C3.939 21.89 4.19843 21.6602 4.49004 21.4014C4.28906 21.2576 4.13866 21.1577 3.99614 21.0474C2.92821 20.2244 2.3509 19.1329 2.27537 17.7924C2.23793 17.1284 2.2688 16.4604 2.2688 15.7616H2.26946Z" fill="white"/>
                      <path d="M2.27554 10.7871C2.27029 10.6682 2.26109 10.5612 2.26109 10.4541C2.26044 8.71363 2.25847 6.97381 2.26109 5.23333C2.26372 3.32078 3.59108 1.98619 5.50101 1.99998C6.14203 2.00458 6.80275 1.99145 7.41882 2.13659C8.5117 2.39471 9.20001 3.15264 9.53235 4.22057C9.59671 4.42811 9.68012 4.5286 9.90803 4.59034C11.194 4.93909 12.0964 6.141 12.1128 7.48216C12.1155 7.69824 12.1128 7.91432 12.1128 8.14879H6.02578C5.73548 6.61389 6.56959 5.02973 8.31335 4.53517C8.15573 3.85014 7.48121 3.27217 6.7732 3.24722C6.23792 3.22817 5.70067 3.2262 5.16539 3.24722C4.24261 3.28334 3.50044 4.13059 3.4965 5.14663C3.48994 6.89762 3.49453 8.64926 3.49453 10.4002C3.49453 10.5198 3.49453 10.6393 3.49453 10.7864H2.27423L2.27554 10.7871Z" fill="white"/>
                      <path d="M12.0931 14.5327C11.9644 14.5327 11.8678 14.5327 11.7713 14.5327C8.64366 14.5327 5.5154 14.5334 2.38779 14.5321C1.71459 14.5321 1.23054 14.2135 1.06043 13.6697C0.804289 12.8514 1.38423 12.0632 2.26826 12.0514C3.20877 12.0389 4.14929 12.0481 5.0898 12.0481C7.29922 12.0481 9.50799 12.0481 11.7174 12.0481C11.8356 12.0481 11.9538 12.0481 12.0931 12.0481V14.5321V14.5327Z" fill="white"/>
                      <path d="M17.0237 16.3711H13.3634C13.3575 16.2555 13.3477 16.1504 13.3477 16.0453C13.3464 14.7771 13.3464 13.5082 13.3477 12.2399C13.3483 11.3224 13.8494 10.818 14.763 10.8141C15.1019 10.8128 15.4408 10.8055 15.7797 10.816C16.5409 10.8403 17.0381 11.352 17.0401 12.1152C17.044 13.4386 17.0414 14.7613 17.0401 16.0848C17.0401 16.1708 17.0309 16.2562 17.0237 16.3711Z" fill="white"/>
                      <path d="M18.2832 14.5209V12.0482C18.8782 12.0482 19.4648 12.0462 20.0506 12.0488C20.356 12.0501 20.668 12.0252 20.9668 12.0744C21.619 12.1821 22.0433 12.7161 22.0164 13.3394C21.9901 13.9509 21.5389 14.4756 20.8985 14.5091C20.0394 14.5544 19.1764 14.5203 18.2839 14.5203L18.2832 14.5209Z" fill="white"/>
                    </g>
                    <defs><clipPath id="clip0_122_2009"><rect width="21.0171" height="21" fill="white" transform="translate(1 2)"/></clipPath></defs>
                  </svg>
                  <?php echo esc_html($bathrooms); ?>-Bathroom
                </span>
                <span class="meta-pill">
                  <svg class="pill-icon" width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path fill-rule="evenodd" clip-rule="evenodd" d="M4.8001 19.8V4.20002H4.5001C4.00304 4.20002 3.6001 3.79708 3.6001 3.30002C3.6001 2.80297 4.00304 2.40002 4.5001 2.40002H19.5001C19.9972 2.40002 20.4001 2.80297 20.4001 3.30002C20.4001 3.79708 19.9972 4.20002 19.5001 4.20002H19.2001V19.8H19.5001C19.9972 19.8 20.4001 20.203 20.4001 20.7C20.4001 21.1971 19.9972 21.6 19.5001 21.6H15.3001C14.803 21.6 14.4001 21.1971 14.4001 20.7V17.7C14.4001 17.203 13.9972 16.8 13.5001 16.8H10.5001C10.003 16.8 9.6001 17.203 9.6001 17.7V20.7C9.6001 21.1971 9.19715 21.6 8.7001 21.6H4.5001C4.00304 21.6 3.6001 21.1971 3.6001 20.7C3.6001 20.203 4.00304 19.8 4.5001 19.8H4.8001ZM8.4001 6.60002C8.4001 6.26865 8.66873 6.00002 9.0001 6.00002H10.2001C10.5315 6.00002 10.8001 6.26865 10.8001 6.60002V7.80002C10.8001 8.1314 10.5315 8.40002 10.2001 8.40002H9.0001C8.66873 8.40002 8.4001 8.1314 8.4001 7.80002V6.60002ZM9.0001 10.8C8.66873 10.8 8.4001 11.0687 8.4001 11.4V12.6C8.4001 12.9314 8.66873 13.2 9.0001 13.2H10.2001C10.5315 13.2 10.8001 12.9314 10.8001 12.6V11.4C10.8001 11.0687 10.5315 10.8 10.2001 10.8H9.0001ZM13.2001 6.60002C13.2001 6.26865 13.4687 6.00002 13.8001 6.00002H15.0001C15.3315 6.00002 15.6001 6.26865 15.6001 6.60002V7.80002C15.6001 8.1314 15.3315 8.40002 15.0001 8.40002H13.8001C13.4687 8.40002 13.2001 8.1314 13.2001 7.80002V6.60002ZM13.8001 10.8C13.4687 10.8 13.2001 11.0687 13.2001 11.4V12.6C13.2001 12.9314 13.4687 13.2 13.8001 13.2H15.0001C15.3315 13.2 15.6001 12.9314 15.6001 12.6V11.4C15.6001 11.0687 15.3315 10.8 15.0001 10.8H13.8001Z" fill="white"/>
                  </svg>
                  <?php echo esc_html($type); ?>
                </span>
              </div>
              <div class="property-footer">
                <div class="price-block">
                  <span class="price-label">Price</span>
                  <span class="property-price">$<?php echo number_format((float) $price); ?></span>
                </div>
                <a href="<?php the_permalink(); ?>" class="btn btn-primary btn-sm">View Property Details</a>
              </div>
            </div>
          </div>
          <?php endwhile; ?>
      <?php else : ?>
          <p>No properties found. Add some from the Properties menu in wp-admin.</p>
      <?php endif; ?>
      <?php wp_reset_postdata(); ?>
    </div>

    <div class="carousel-controls">
      <span class="carousel-count" data-carousel-count>01 of <?php echo str_pad($properties_query->found_posts, 2, '0', STR_PAD_LEFT); ?></span>
      <div class="carousel-arrows">
        <button class="carousel-arrow" aria-label="Previous" data-carousel-prev><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 12H5M11 18l-6-6 6-6"/></svg></button>
        <button class="carousel-arrow is-active" aria-label="Next" data-carousel-next><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M13 6l6 6-6 6"/></svg></button>
      </div>
    </div>
    </div>

  </div>
</section>

<section class="testimonials">
  <div class="container">

    <div class="section-header">
      <div>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-sparkle-accent.png" alt="" class="section-accent">
        <h2>What Our Clients Say</h2>
        <p>Read the success stories and heartfelt testimonials from our valued clients. Discover why they chose Estatein for their real estate needs.</p>
      </div>
      <a href="#" class="btn btn-outline">View All Testimonials</a>
    </div>

    <div data-carousel>
    <div class="testimonials-grid" data-carousel-track>
      <?php
      $testimonials_query = new WP_Query(array(
          'post_type'      => 'testimonial',
          'posts_per_page' => -1,
          'orderby'        => 'date',
          'order'          => 'DESC',
      ));

      if ( $testimonials_query->have_posts() ) :
          while ( $testimonials_query->have_posts() ) : $testimonials_query->the_post();
              $rating   = (int) get_field('rating');
              $headline = get_field('headline');
              $quote    = get_field('quote');
              $location = get_field('location');
          ?>
          <div class="testimonial-card">
            <div class="stars">
              <?php for ( $i = 0; $i < $rating; $i++ ) : ?>
                <span class="star-badge">
                  <svg width="22" height="21" viewBox="0 0 22 21" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <path d="M9.81193 0.459616C10.2055 -0.153147 11.1011 -0.153147 11.4947 0.459616L14.5337 5.19107C14.6692 5.4019 14.8788 5.55421 15.1212 5.61786L20.5602 7.04604C21.2645 7.23101 21.5413 8.08279 21.0802 8.64646L17.5194 12.9989C17.3607 13.1928 17.2806 13.4392 17.295 13.6894L17.6175 19.3035C17.6592 20.0306 16.9347 20.557 16.2561 20.2926L11.0164 18.2511C10.7829 18.1601 10.5238 18.1601 10.2903 18.2511L5.05057 20.2926C4.37199 20.557 3.64741 20.0306 3.68917 19.3035L4.01163 13.6894C4.02599 13.4392 3.94592 13.1928 3.78725 12.9989L0.226482 8.64646C-0.234667 8.08279 0.0420954 7.23101 0.74649 7.04604L6.18548 5.61786C6.42784 5.55421 6.63748 5.4019 6.7729 5.19107L9.81193 0.459616Z" fill="#FFE600"/>
                  </svg>
                </span>
              <?php endfor; ?>
            </div>
            <h3><?php echo esc_html($headline); ?></h3>
            <p><?php echo esc_html($quote); ?></p>
            <div class="testimonial-author">
              <?php if ( has_post_thumbnail() ) : ?>
                <?php the_post_thumbnail('thumbnail', array('class' => 'author-avatar', 'alt' => get_the_title())); ?>
              <?php endif; ?>
              <div>
                <span class="author-name"><?php the_title(); ?></span>
                <span class="author-location"><?php echo esc_html($location); ?></span>
              </div>
            </div>
          </div>
          <?php endwhile; ?>
      <?php else : ?>
          <p>No testimonials found yet.</p>
      <?php endif; ?>
      <?php wp_reset_postdata(); ?>
    </div>

    <div class="carousel-controls">
      <span class="carousel-count" data-carousel-count>01 of <?php echo str_pad($testimonials_query->found_posts, 2, '0', STR_PAD_LEFT); ?></span>
      <div class="carousel-arrows">
        <button class="carousel-arrow" aria-label="Previous" data-carousel-prev><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 12H5M11 18l-6-6 6-6"/></svg></button>
        <button class="carousel-arrow is-active" aria-label="Next" data-carousel-next><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M13 6l6 6-6 6"/></svg></button>
      </div>
    </div>
    </div>

  </div>
</section>

<section class="faq">
  <div class="container">

    <div class="section-header">
      <div>
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-sparkle-accent.png" alt="" class="section-accent">
        <h2>Frequently Asked Questions</h2>
        <p>Find answers to common questions about Estatein's services, property listings, and the real estate process. We're here to provide clarity and assist you every step of the way.</p>
      </div>
      <a href="#" class="btn btn-outline">View All FAQ's</a>
    </div>

    <div data-carousel>
    <div class="faq-grid" data-carousel-track>
      <?php
      $faq_query = new WP_Query(array(
          'post_type'      => 'estatein_faq',
          'posts_per_page' => -1,
          'orderby'        => 'date',
          'order'          => 'DESC',
      ));

      if ( $faq_query->have_posts() ) :
          while ( $faq_query->have_posts() ) : $faq_query->the_post();
              $short_answer = get_field('short_answer');
          ?>
          <div class="faq-card">
            <h3><?php the_title(); ?></h3>
            <p><?php echo esc_html($short_answer); ?></p>
            <a href="<?php the_permalink(); ?>" class="btn btn-outline btn-sm">Read More</a>
          </div>
          <?php endwhile; ?>
      <?php else : ?>
          <p>No FAQs found yet.</p>
      <?php endif; ?>
      <?php wp_reset_postdata(); ?>
    </div>

    <div class="carousel-controls">
      <span class="carousel-count" data-carousel-count>01 of <?php echo str_pad($faq_query->found_posts, 2, '0', STR_PAD_LEFT); ?></span>
      <div class="carousel-arrows">
        <button class="carousel-arrow" aria-label="Previous" data-carousel-prev><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 12H5M11 18l-6-6 6-6"/></svg></button>
        <button class="carousel-arrow is-active" aria-label="Next" data-carousel-next><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M13 6l6 6-6 6"/></svg></button>
      </div>
    </div>
    </div>

  </div>
</section>

<section class="cta-banner">
  <div class="cta-inner">
    <div class="cta-text">
      <h2>Start Your Real Estate Journey Today</h2>
      <p>Your dream property is just a click away. Whether you're looking for a new home, a strategic investment, or expert real estate advice, Estatein is here to assist you every step of the way. Take the first step towards your real estate goals and explore our available properties or get in touch with our team for personalized assistance.</p>
    </div>
    <a href="<?php echo esc_url(home_url('/properties')); ?>" class="btn btn-primary">Explore Properties</a>
  </div>
</section>

<?php get_footer(); ?>