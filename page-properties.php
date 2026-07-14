<?php
/**
 * Template Name: Properties
 */
get_header();

$lead_status = isset($_GET['lead_status']) ? sanitize_key($_GET['lead_status']) : '';
?>

</div><!-- .hero-zone -->

<section class="properties-page">

  <!-- ================= HERO + SEARCH ================= -->
  <section class="prop-hero">
    <div class="container">
      <div class="prop-hero-text">
        <h1>Find Your Dream Property</h1>
        <p>Welcome to Estatein, where your dream property awaits in every corner of our beautiful world. Explore our curated selection of properties, each offering a unique story and a chance to redefine your life. With categories to suit every dreamer, your journey starts here.</p>
      </div>

      <form class="prop-search-form" method="get" action="<?php echo esc_url(home_url('/properties')); ?>">
        <div class="prop-search-bar">
          <input type="text" name="s_property" placeholder="Search For A Property" value="<?php echo isset($_GET['s_property']) ? esc_attr($_GET['s_property']) : ''; ?>">
          <button type="submit" class="btn btn-primary prop-search-btn">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-magnifier.svg" alt="" width="24" height="24">
            Find Property
          </button>
        </div>

        <div class="prop-filters">
          <label class="prop-filter">
            <span class="prop-filter-label">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-location.svg" alt="" width="24" height="24">
              <span class="prop-filter-divider"></span>
              <select name="location">
                <option value="">Location</option>
                <option value="downtown">Downtown</option>
                <option value="suburbs">Suburbs</option>
                <option value="coastal">Coastal</option>
                <option value="countryside">Countryside</option>
              </select>
            </span>
            <span class="prop-filter-chevron"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 9l6 6 6-6"/></svg></span>
          </label>

          <label class="prop-filter">
            <span class="prop-filter-label">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-property-type.svg" alt="" width="24" height="24">
              <span class="prop-filter-divider"></span>
              <select name="property_type">
                <option value="">Property Type</option>
                <option value="villa">Villa</option>
                <option value="apartment">Apartment</option>
                <option value="townhouse">Townhouse</option>
                <option value="condo">Condo</option>
              </select>
            </span>
            <span class="prop-filter-chevron"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 9l6 6 6-6"/></svg></span>
          </label>

          <label class="prop-filter">
            <span class="prop-filter-label">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-pricing.svg" alt="" width="24" height="24">
              <span class="prop-filter-divider"></span>
              <select name="pricing_range">
                <option value="">Pricing Range</option>
                <option value="0-250000">Under $250,000</option>
                <option value="250000-500000">$250,000 - $500,000</option>
                <option value="500000-1000000">$500,000 - $1,000,000</option>
                <option value="1000000+">$1,000,000+</option>
              </select>
            </span>
            <span class="prop-filter-chevron"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 9l6 6 6-6"/></svg></span>
          </label>

          <label class="prop-filter">
            <span class="prop-filter-label">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-property-size.svg" alt="" width="24" height="24">
              <span class="prop-filter-divider"></span>
              <select name="property_size">
                <option value="">Property Size</option>
                <option value="0-1000">Under 1,000 sqft</option>
                <option value="1000-2500">1,000 - 2,500 sqft</option>
                <option value="2500-5000">2,500 - 5,000 sqft</option>
                <option value="5000+">5,000+ sqft</option>
              </select>
            </span>
            <span class="prop-filter-chevron"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 9l6 6 6-6"/></svg></span>
          </label>

          <label class="prop-filter">
            <span class="prop-filter-label">
              <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-build-year.svg" alt="" width="24" height="24">
              <span class="prop-filter-divider"></span>
              <select name="build_year">
                <option value="">Build Year</option>
                <option value="2020-2025">2020 - 2025</option>
                <option value="2010-2019">2010 - 2019</option>
                <option value="2000-2009">2000 - 2009</option>
                <option value="pre-2000">Before 2000</option>
              </select>
            </span>
            <span class="prop-filter-chevron"><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 9l6 6 6-6"/></svg></span>
          </label>
        </div>
      </form>
    </div>
  </section>

  <!-- ================= DISCOVER CATEGORIES ================= -->
  <section class="prop-categories">
    <div class="container">

      <div class="prop-intro">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-sparkle-accent.png" alt="" class="section-accent">
        <h2>Discover a World of Possibilities</h2>
        <p>Our portfolio of properties is as diverse as your dreams. Explore the following categories to find the perfect property that resonates with your vision of home.</p>
      </div>

      <div data-carousel>
      <div class="prop-cards" data-carousel-track>
        <?php
        $properties_query = new WP_Query(array(
            'post_type'      => 'property',
            'posts_per_page' => -1,
            'orderby'        => 'date',
            'order'          => 'DESC',
        ));

        if ( $properties_query->have_posts() ) :
            while ( $properties_query->have_posts() ) : $properties_query->the_post();
                $price      = get_field('price');
                $short_desc = get_field('short_description');
                $tag_label  = get_field('tag_label');
            ?>
            <div class="prop-card">
              <?php if ( has_post_thumbnail() ) : ?>
                <?php the_post_thumbnail('large', array('class' => 'prop-card-image', 'alt' => get_the_title())); ?>
              <?php endif; ?>
              <div class="prop-card-body">
                <?php if ( $tag_label ) : ?>
                  <span class="prop-tag"><?php echo esc_html($tag_label); ?></span>
                <?php endif; ?>
                <div class="prop-card-text">
                  <h3><?php the_title(); ?></h3>
                  <p><?php echo esc_html($short_desc); ?> <a href="<?php the_permalink(); ?>" class="read-more-link">Read More</a></p>
                </div>
              </div>
              <div class="prop-card-footer">
                <div class="prop-price">
                  <span class="price-label">Price</span>
                  <span class="prop-price-number">$<?php echo number_format((float) $price); ?></span>
                </div>
                <a href="<?php the_permalink(); ?>" class="btn btn-primary">View Property Details</a>
              </div>
            </div>
            <?php endwhile; ?>
        <?php else : ?>
            <p>No properties found. Add some from the Properties menu in wp-admin.</p>
        <?php endif; ?>
      </div>

      <div class="carousel-controls">
        <span class="carousel-count" data-carousel-count>01 of <?php echo str_pad($properties_query->found_posts, 2, '0', STR_PAD_LEFT); ?></span>
        <div class="carousel-arrows">
          <button class="carousel-arrow" aria-label="Previous" data-carousel-prev><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M19 12H5M11 18l-6-6 6-6"/></svg></button>
          <button class="carousel-arrow is-active" aria-label="Next" data-carousel-next><svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"><path d="M5 12h14M13 6l6 6-6 6"/></svg></button>
        </div>
      </div>
      </div>
      <?php wp_reset_postdata(); ?>

    </div>
  </section>

  <!-- ================= LET'S MAKE IT HAPPEN (LEAD FORM) ================= -->
  <section class="prop-lead">
    <div class="container">

      <div class="prop-intro">
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/icon-sparkle-accent.png" alt="" class="section-accent">
        <h2>Let's Make it Happen</h2>
        <p>Ready to take the first step toward your dream property? Fill out the form below, and our real estate wizards will work their magic to find your perfect match. Don't wait; let's embark on this exciting journey together.</p>
      </div>

      <div class="prop-lead-form-wrap">

        <?php if ( $lead_status === 'success' ) : ?>
          <div class="prop-lead-notice prop-lead-notice-success">Thanks — your message has been sent. Our team will be in touch shortly.</div>
        <?php elseif ( $lead_status === 'error' ) : ?>
          <div class="prop-lead-notice prop-lead-notice-error">Please fill in your first name and a valid email address, then try again.</div>
        <?php endif; ?>

        <form class="prop-lead-form" method="post" action="<?php echo esc_url(admin_url('admin-post.php')); ?>">
          <input type="hidden" name="action" value="estatein_lead_form">
          <?php wp_nonce_field('estatein_lead_form', 'estatein_lead_nonce'); ?>

          <div class="prop-field-row">
            <div class="prop-field">
              <label for="first_name">First Name</label>
              <input type="text" id="first_name" name="first_name" placeholder="Enter First Name" required>
            </div>
            <div class="prop-field">
              <label for="last_name">Last Name</label>
              <input type="text" id="last_name" name="last_name" placeholder="Enter Last Name">
            </div>
            <div class="prop-field">
              <label for="email">Email</label>
              <input type="email" id="email" name="email" placeholder="Enter your Email" required>
            </div>
            <div class="prop-field">
              <label for="phone">Phone</label>
              <input type="tel" id="phone" name="phone" placeholder="Enter Phone Number">
            </div>
          </div>

          <div class="prop-field-row">
            <div class="prop-field">
              <label for="preferred_location">Preferred Location</label>
              <div class="prop-select-wrap">
                <select id="preferred_location" name="preferred_location">
                  <option value="">Select Location</option>
                  <option value="downtown">Downtown</option>
                  <option value="suburbs">Suburbs</option>
                  <option value="coastal">Coastal</option>
                  <option value="countryside">Countryside</option>
                </select>
                <svg class="prop-select-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 9l6 6 6-6"/></svg>
              </div>
            </div>
            <div class="prop-field">
              <label for="property_type_lead">Property Type</label>
              <div class="prop-select-wrap">
                <select id="property_type_lead" name="property_type">
                  <option value="">Select Property Type</option>
                  <option value="villa">Villa</option>
                  <option value="apartment">Apartment</option>
                  <option value="townhouse">Townhouse</option>
                  <option value="condo">Condo</option>
                </select>
                <svg class="prop-select-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 9l6 6 6-6"/></svg>
              </div>
            </div>
            <div class="prop-field">
              <label for="bathrooms">No. of Bathrooms</label>
              <div class="prop-select-wrap">
                <select id="bathrooms" name="bathrooms">
                  <option value="">Select no. of Bedrooms</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4+">4+</option>
                </select>
                <svg class="prop-select-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 9l6 6 6-6"/></svg>
              </div>
            </div>
            <div class="prop-field">
              <label for="bedrooms">No. of Bedrooms</label>
              <div class="prop-select-wrap">
                <select id="bedrooms" name="bedrooms">
                  <option value="">Select no. of Bedrooms</option>
                  <option value="1">1</option>
                  <option value="2">2</option>
                  <option value="3">3</option>
                  <option value="4+">4+</option>
                </select>
                <svg class="prop-select-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 9l6 6 6-6"/></svg>
              </div>
            </div>
          </div>

          <div class="prop-field-row prop-field-row-wide">
            <div class="prop-field">
              <label for="budget">Budget</label>
              <div class="prop-select-wrap">
                <select id="budget" name="budget">
                  <option value="">Select Budget</option>
                  <option value="0-250000">Under $250,000</option>
                  <option value="250000-500000">$250,000 - $500,000</option>
                  <option value="500000-1000000">$500,000 - $1,000,000</option>
                  <option value="1000000+">$1,000,000+</option>
                </select>
                <svg class="prop-select-chevron" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 9l6 6 6-6"/></svg>
              </div>
            </div>
            <div class="prop-field">
              <label>Preferred Contact Method</label>
              <div class="prop-contact-methods">
                <label class="prop-contact-pill">
                  <input type="radio" name="contact_method" value="phone" checked>
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><path d="M22 16.92v3a2 2 0 0 1-2.18 2 19.79 19.79 0 0 1-8.63-3.07 19.5 19.5 0 0 1-6-6 19.79 19.79 0 0 1-3.07-8.67A2 2 0 0 1 4.11 2h3a2 2 0 0 1 2 1.72c.127.96.362 1.903.7 2.81a2 2 0 0 1-.45 2.11L8.09 9.91a16 16 0 0 0 6 6l1.27-1.27a2 2 0 0 1 2.11-.45c.907.338 1.85.573 2.81.7A2 2 0 0 1 22 16.92z"/></svg>
                  <span>Enter Your Number</span>
                  <span class="prop-contact-dot"></span>
                </label>
                <label class="prop-contact-pill">
                  <input type="radio" name="contact_method" value="email">
                  <svg viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="1.6" stroke-linecap="round" stroke-linejoin="round"><rect x="2" y="4" width="20" height="16" rx="2"/><path d="M2 7l10 6 10-6"/></svg>
                  <span>Enter Your Email</span>
                  <span class="prop-contact-dot"></span>
                </label>
              </div>
            </div>
          </div>

          <div class="prop-field prop-message-field">
            <label for="message">Message</label>
            <textarea id="message" name="message" placeholder="Enter your Message here.." rows="4"></textarea>
          </div>

          <div class="prop-lead-submit-row">
            <label class="prop-checkbox">
              <input type="checkbox" required>
              <span class="prop-checkbox-box"></span>
              <span>I agree with <a href="#">Terms of Use</a> and <a href="#">Privacy Policy</a></span>
            </label>
            <button type="submit" class="btn btn-primary">Send Your Message</button>
          </div>
        </form>
      </div>

    </div>
  </section>

</section><!-- .properties-page -->

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
