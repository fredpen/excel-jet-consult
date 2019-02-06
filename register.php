
<?php 
include_once 'includes/header.php';
include_once 'includes/nav.php';
?>


    <div id="pb0" class="page-title">
        <h1 class="myc" id="mt110">Register </h1>
    </div>
 
    <section id="contact-page">
        <div class="container">
            <div class="row contact-wrap"> 
                <div class="col-sm-10 col-sm-offset-1">
                    <p class="instruction">* Kindly follow the instructions on this page to register for the course of your choice</p>

                    <ul>
                        <li>Deposit the equilvalent amount of the course you would like to register for into any of our accounts below
                            <ul>
                                <li>
                                    <p>   Gtbank - Abiola David</p>
                                 
                                </li>
                            </ul>
                        </li>

                        <li>
                            <p>
                                After making the payment, fill the form below and we will contact you with the details of your training in less than 30 minutes
                            </p> 
                        </li>

                         <li>
                            <p>
                               Note: For registration of five (5) people or more, kindly contact us to assit in placing your order as a coperate request. You can do that 
                                <a href="contact-us.php">here</a>
                            </p> 
                        </li>
                    </ul>
                </div>
            </div>   
            
             <div class="row contact-wrap"> 
                <div class="status alert alert-success" style="display: none"></div>
                <form id="main-contact-form" class="contact-form" name="contact-form" method="post" action="sendemail.php">
                     <div class="col-sm-10 col-sm-offset-1">
                       <h2>Personal Details</h2>
                    </div>
                     
                    <div class="col-sm-5 col-sm-offset-1">
                        <div class="form-group">
                            <label>Full Name * <span class="smalll instruction">as you want it on the certificate</span></label>
                            <input type="text" name="name" placeholder="Jane H. Dow" class="form-control" required="required">
                        </div>

                        <div class="form-group">
                            <label>Email *</label>
                            <input type="email" placeholder="Janedow@gmail.com" name="email" class="form-control" required="required">
                        </div>

                        <div class="form-group">
                            <label>Gender *</label>
                            <select name="gender" id="gender" class="form-control" required="required">
                                <option value="" selected disabled>Gender</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                            </select>
                        </div>

                         <div class="form-group">
                            <label>Date of Birth *</label>
                            <input id="gender" type="date" name="dob" class="form-control" required="required">
                        </div>

                    </div>
                    <div class="col-sm-5">
                         <div class="form-group">
                            <label>Course *</label>
                            <select name="course" id="gender" class="form-control" required="required">
                                <option value="" selected disabled>Select a Course</option>
                                <option value="Certificate Course in Microsoft Excel">Certificate Course in Microsoft Excel</option>
                                <option value="Certificate Course in Advance Microsoft Excel(Master Class)">Certificate Course in Advance Microsoft Excel(Master Class)</option>
                                <option value="Certificate Course in Microsoft Power BI Desktop ">Certificate Course in Microsoft Power BI Desktop </option>
                            </select>
                        </div>


                        <div class="form-group">
                            <label>Phone *</label>
                            <input type="number" placeholder="08038xxxxxx" class="form-control" required="required">
                        </div>

                        <div class="form-group">
                            <label>Marital Status *</label>
                            <select name="marry" id="gender" class="form-control" required="required">
                                <option value="" selected disabled>Marital status</option>
                                <option value="single">Single</option>
                                <option value="married">Married</option>
                            </select>
                        </div>


                        <div class="form-group">
                            <label>Country *</label>
                            <input type="text" name="country" class="form-control" required="required">
                        </div>
                                              
                    </div>

                    <div class="col-sm-10 col-sm-offset-1">
                       <h2>Payment Details  
                           <span class="smalll instruction">* we will use these details to confirm your payment</span>
                        </h2>
                    </div>
                     
                    <div class="col-sm-5 col-sm-offset-1">
                       <div class="form-group">
                            <label>Name of Depositor *</label>
                            <input type="text"  placeholder="Jane Dow" name="depositor" id="depositor" required="required" class="form-control">
                        </div>

                        <div class="form-group">
                            <label>Mode of Payment *</label>
                            <select name="payment" id="gender" class="form-control" required="required">
                                <option value="Cash deposit">Cash deposit</option>
                                <option value="Electronic Transfer">Electronic Transfer</option>
                                <option value="others">Others</option>
                            </select>
                        </div>
                    </div>

                    <div class="col-sm-5">
                         <div class="form-group">
                            <label>Account number *</label>
                            <input type="number" placeholder="9034587381" name="account_number" id="depositor" required="required" class="form-control">
                        </div>    

                        <div class="form-group">
                            <label>Bank *</label>
                            <input type="text" placeholder="Gtbank" name="account_number" id="depositor" required="required" class="form-control">
                        </div> 
                    </div>

                 
                     <div class="col-sm-12 center form-group">
                            <button type="submit" name="submit" class="btn btn-primary btn-lg" required="required">Regsiter</button>
                    </div>
                </form> 
            </div>
            

        </div>  
    </section>

  

<?php 
include_once 'includes/footer.php';
?>