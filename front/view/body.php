<!-- First Video -->
<div class="player position-relative">
    <video id="video" class="w-100" loop muted autoplay playsinline>
        <source src="/img/VIDEO/1.mp4" type="video/mp4" width="2880" height="1280" media="(min-width: 960px)">
        <source src="/img/VIDEO/2.mp4" type="video/mp4" width="1600" height="1600" media="(min-width: 600px)">
        <source src="/img/VIDEO/3.mp4" type="video/mp4" width="1080" height="1440" media="(max-width: 599px)">
    </video>
    <button id="toggleButton" class="toggle-button position-absolute">
        <i class="fa fa-pause"></i>
    </button>

    <div class="timer-title-container position-absolute">
        <h1 class="title">SL 72</h1>
    </div>

    <div class="summary">   
        <span class="summary-text1">Discover the effortless appeal of the</span>
        <span class="summary-text2">retro-inspired classic.</span>
    </div>

    <div class="cta-list-container ">
        <a href="#" class="cta-button">SHOP NOW <i class="fa fa-arrow-right"></i></a>
    </div>
</div>

<div class="tab-wrapper">
    <div class="tab-container d-flex flex-nowrap align-items-center">
        <h1>New Arrivals</h1>
    </div>
</div>

<div class="slider-wrapper" style="position: relative;">
    <button id="prev-slide" class="slide-button material-symbols-rounded">chevron_left</button>
    
    <div class="image-list slide-1">
        <?php if (isset($new_arrivals) && is_array($new_arrivals)): ?>
            <?php foreach ($new_arrivals as $product): ?>
                <div class="image-item">
                    <div class="image-image">
                        <?php 
                        $images = json_decode($product['images'], true);
                        $first_image = $images[0] ?? '/img/default-product.jpg';
                        ?>
                        <img src="<?php echo $first_image; ?>" alt="<?php echo htmlspecialchars($product['ten_sp']); ?>">
                        <div class="price"><?php echo number_format($product['gia'], 0, ',', '.'); ?>₫</div>
                        <div class="image-icon"><i class="fa-regular fa-heart"></i></div>
                    </div>
                    <p class="product-name"><?php echo htmlspecialchars($product['ten_sp']); ?></p>
                    <p class="product-category">Performance</p>
                </div>
            <?php endforeach; ?>
        <?php endif; ?>
    </div>

    <button id="next-slide" class="slide-button material-symbols-rounded">chevron_right</button>
</div>

<div class="slider-scrollbar">
    <div class="scrollbar-track">
        <div class="scrollbar-thumb"></div>
    </div>
</div>

<!-- Second Video -->
<div class="player" style="margin-top: 70px;">
    <video id="video-2" loop muted autoplay playsinline>
        <source src="/img/second2.mp4" type="video/mp4" width="2880px" height="1280px" media="(min-width: 960px)">
    </video>
    <button id="toggleButton2" class="toggle-button">
        <i class="fa fa-pause video2-icon"></i>
    </button>
    
    <div class="timer-title-container-2">
        <h2 class="title">THE GAMES NEVER STOPS</h2>
    </div>
    
    <div class="cta-list-container">
        <a href="#" class="cta-button">SHOP NOW <i class="fa fa-arrow-right " id="second-pause"></i></a>
    </div>
</div>

<div class="tab-wrapper">
    <div class="tab-container d-flex flex-nowrap align-items-center">
        <h1>Featured Products</h1> 
    </div>
</div>

<div class="slider-wrapper" style="position: relative;">
    <button id="prev-slide-2" class="slide-button material-symbols-rounded">chevron_left</button>
    
    <div class="image-list slide-1">
        <?php $featured_products = get_featured_products(); ?>
        <?php foreach ($featured_products as $product): ?>
            <div class="image-item">
                <div class="image-image">
                    <?php 
                    $images = json_decode($product['images'], true);
                    $first_image = $images[0] ?? '/img/default-product.jpg';
                    ?>
                    <img src="<?php echo $first_image; ?>" alt="<?php echo htmlspecialchars($product['ten_sp']); ?>">
                    <div class="price"><?php echo number_format($product['gia'], 0, ',', '.'); ?>₫</div>
                    <div class="image-icon"><i class="fa-regular fa-heart"></i></div>
                </div>
                <p class="product-name"><?php echo htmlspecialchars($product['ten_sp']); ?></p>
                <p class="product-category">Performance</p>
            </div>
        <?php endforeach; ?>
    </div>
    
    <button id="next-slide-2" class="slide-button material-symbols-rounded">chevron_right</button>
</div>

<div class="slider-scrollbar">
    <div class="scrollbar-track">
        <div class="scrollbar-thumb"></div>
    </div>
</div>

<div class="tab-wrapper">
    <div class="tab-container d-flex flex-nowrap align-items-center">
        <h1>Best Sellers</h1>
    </div>
</div>

<div class="slider-wrapper" style="position: relative;">
    <button id="prev-slide-3" class="slide-button material-symbols-rounded">chevron_left</button>
    
    <div class="image-list slide-1">
        <?php $best_sellers = get_best_sellers(); ?>
        <?php foreach ($best_sellers as $product): ?>
            <div class="image-item">
                <div class="image-image">
                    <?php 
                    $images = json_decode($product['images'], true);
                    $first_image = $images[0] ?? '/img/default-product.jpg';
                    ?>
                    <img src="<?php echo $first_image; ?>" alt="<?php echo htmlspecialchars($product['ten_sp']); ?>">
                    <div class="price"><?php echo number_format($product['gia'], 0, ',', '.'); ?>₫</div>
                    <div class="image-icon"><i class="fa-regular fa-heart"></i></div>
                </div>
                <p class="product-name"><?php echo htmlspecialchars($product['ten_sp']); ?></p>
                <p class="product-category">Performance</p>
            </div>
        <?php endforeach; ?>
    </div>
    
    <button id="next-slide-3" class="slide-button material-symbols-rounded">chevron_right</button>
</div>

<div class="slider-scrollbar">
    <div class="scrollbar-track">
        <div class="scrollbar-thumb"></div>
    </div>
</div>

<div class="below-1">
    <div class="inside-below-1">
        <h1>STORIES, STYLES AND SPORTSWEAR AT ADIDAS, SINCE 1949</h1>
        <p>Sport keeps us fit. Keeps you mindful. Brings us together. Through sport we have the power to change lives. Whether it is through stories of inspiring athletes. Helping you to get up and get moving. Sportswear featuring the latest technologies, to up your performance. Beat your PB.adidas offers a home to the runner, the basketball player, the soccer kid, the fitness enthusiast. The weekend hiker that loves to escape the city. The yoga teacher that spreads the moves. The 3-Stripes are seen in the music scene. On stage, at festivals. Our sports clothing keeps you focused before that whistle blows. During the race. And at the finish lines. We’re here to support creators. Improve their game. Their lives. And change the world.
        <br>
        <br>
        adidas is about more than sportswear and workout clothes. We partner with the best in the industry to co-create. This way we offer our fans the sports apparel and style that match their athletic needs, while keeping sustainability in mind. We’re here to support creators. Improve their game. Create change. And we think about the impact we have on our world.
        </p>
        <div>
            <img src="/img/adidas_logo_white.jpg" alt="">
        </div>
    </div>
</div>

<div class="below-mobile-1">
    <h5>YOUR OPINION COUNTS</h5>
    <p>We strive to serve you better and appreciate your feedback</p>
    <a href="#">Please fill out this short survey.</a>
</div>

<div class="below-mobile-2">
    <i class="fa-solid fa-chevron-up"></i>
    <p>BACK TO TOP</p>
</div>

<div class="below-mobile-3">
    <a href="#">LOGIN</a>
    <a href="#">YOUR BAG(0)</a>
</div>

<div class="below-2 ">
    <h1>BECOME A MEMBER & GET 15% OFF</h1>
    <div class="below-2-button">
        <a href="#">SIGN UP FOR FREE <i class="fa fa-arrow-right"></i></a>
    </div>
</div>

<div class="below-3">
    <div class="column">
        <h5>PRODUCTS</h5>
        <ul>
            <li><a href="#">Footwear</a></li>
            <li><a href="#">Clothing</a></li>
            <li><a href="#">Accessories</a></li>
            <li><a href="#">New Arrivals</a></li>
            <li><a href="#">Release Dates</a></li>
            <li><a href="#">Top Sellers</a></li>
            <li><a href="#">Member Exclusives</a></li>
            <li><a href="#">Outlet</a></li>
        </ul>
    </div>
    <div class="column">
        <h5>SPORTS</h5>
        <ul>
            <li><a href="#">Running</a></li>
            <li><a href="#">Golf</a></li>
            <li><a href="#">Gym & Training</a></li>
            <li><a href="#">Football</a></li>
            <li><a href="#">Basketball</a></li>
            <li><a href="#">Tennis</a></li>
            <li><a href="#">Outdoor</a></li>
            <li><a href="#">Swimming</a></li>
        </ul>
    </div>
    <div class="column">
        <h5>COLLECTIONS</h5>
        <ul>
            <li><a href="#">Pharrell Williams</a></li>
            <li><a