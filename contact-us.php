
<?php 
include_once 'includes/header.php';
include_once 'includes/nav.php';
?>


    <div id="pb0" class="page-title">
        <h1 class="myc" id="mt110">Contact us</h1>
    </div>

    <section id="contact-page">
        <div class="container">
            <div class="large-title text-center">        
               
                <p>* We will get back to you as soon as possible.</p>
            </div> 
            <div class="row contact-wrap"> 
                <div class="status alert alert-success" style="display: none">
                </div>
              
                <div class="col-sm-6">
                    <form id="main-contact-form" class="contact-form" name="contact-form" method="post" action="sendemail.php">
                        <div class="form-group col-sm-6">
                            <input type="text" placeholder="Name *" name="name" class="form-control" required="required">
                        </div>
                        <div class="form-group col-sm-6">
                            <input type="email" placeholder="Email * " name="email" class="form-control" required="required">
                        </div>

                        <div class="form-group col-sm-12">
                            <input type="text" placeholder="Subject * " name="subject" class="form-control" required="required">
                        </div>

                        <div class="form-group col-sm-12">
                            <input type="number" placeholder="Phone Number * " class="form-control">
                        </div>

                            <div class="form-group col-sm-12">
                            <textarea name="message" placeholder="Your Message * " id="message" required="required" class="form-control" rows="8"></textarea>
                        </div>  
                        
                        <div class="form-group">
                            <button type="submit" name="submit" class="btn btn-primary btn-lg" required="required">Submit Message</button>
                        </div>
                    </form> 
                </div>

                
                <div class="contact-box col-sm-6">
                    You can also reach us at:
                    <div><i class="fa fa-map-marker"></i> 10, Mike & Mike Avenue, Peace Estate, Iba, Lagos</div>   
                    <div><i class="fa fa-phone"></i> 0803 527 7416, 0811 368 4404</div>  
                    <div><i class="fa fa-envelope"></i>info@exceljetconsult.com.ng</div>        
                        
                </div>
                 
            </div><!--/.container-->
        </div>
    </section><!--/#contact-page-->

<?php 
include_once 'includes/footer.php';
?>