

 <div class="footnote">
    <div class="sub_note"></div>
    <section id="bottom">
        <div id="foot" class="container fadeInDown" data-wow-duration="1000ms" data-wow-delay="600ms">
            <div class="container">
                  <div class="row">
                <div class="col-xs-10 col-xs-offset-1">
                    <div class="contact-wrap">
                        <div class="status alert alert-success" style="display: none"></div>
                        <form id="newsletter-form" class="contact-form" name="contact-form" method="post" action="includes/ajax/newsletter.php">
                                <div class="col-sm-5 form-group">
                                    <label>Name *</label>
                                    <input type="text" name="newslettername" class="form-control" required="required">
                                </div>
                                <div class="col-sm-7 form-group">
                                    <label>Email * <span class="smalll instruction">we promise not to spam your inbox</span></label>
                                    <input type="email" name="newsletteremail" class="form-control" required="required">
                                </div>

                                <div class="text-center form-group col-sm-12">
                                    <button id="newsletterbtn" onclick="newsletter()" type="submit" name="submit" class="btn btn-primary btn-lg" required="required">Subscribe to our newsletter</button>
                                </div>
                            <!-- </div> -->
                        </form>
                    </div><!--/.row-->
                </div>
            </div>
            </div>

        </div>
    </section>
</div>
