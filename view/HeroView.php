<section class="hero-section">
        <div class="hero-items owl-carousel">
            <!-- <div class="single-hero-items set-bg" data-setbg="/img/hero-1.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-5">
                            
                            <h1>Black friday</h1>
                            
                            <a href="/Shop/Index" class="primary-btn">Shop Now</a>
                        </div>
                    </div>
                    
                </div>
            </div> -->
            <?php  
                foreach ($heroData as $variable) {
                    $img = $variable['img'];
                    $slogent = $variable['slogent'];

                    echo "<div class='single-hero-items set-bg' data-setbg='".$img."'>
                    <div class='container'>
                        <div class='row'>
                            <div class='col-lg-5'>
                                
                                <h1>".$slogent."</h1>
                                
                                <a href='./shop.php' class='primary-btn'>Shop Now</a>
                            </div>
                        </div>
                        
                    </div>
                </div>";
                    
                }

            ?>
        </div>
    </section>
    <!-- Hero Section End -->