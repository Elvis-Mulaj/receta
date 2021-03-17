<?php
    global $controller;
?>
<div class="top-home category" style="background:linear-gradient(rgba(0, 0, 0, 0.5), rgba(0, 0, 0, 0.5)),url('<?php echo WEB_PATH;?>public/images/hp2.jpg');">
    <div class="mid-grid">
        <div class="description">
            <p>Bëhuni pjesë e faqes sonë, dhe postoni recetat e juaja</p>
        </div>
    </div>
</div>
<div class="white-box">
    <div class="mid-grid">
        <h2 class="home-title">Na kontaktoni</h2>
        <div class="contact-left">
            <form action="" method="POST" class="receta-form" onsubmit="return validation();">
                <?php
                    if(isset($_POST['save'])){
                        $fullname = filter_var($_POST['fullname'], FILTER_SANITIZE_STRING); 
                        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL); 
                        $nr_tel = filter_var($_POST['nr_tel'], FILTER_SANITIZE_STRING); 
                        $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);

                        try {
                            if(empty($fullname))
                                throw new Exception("Nuk e keni plotesuar Emrin dhe Mbiemrin", 1);
                            if(empty($email))
                                throw new Exception("Nuk e keni plotesuar email-in", 1);
                            if(empty($message))
                                throw new Exception("Nuk e keni plotesuar Messazhin", 1);

                            $to = "info@receta.com";
                            $subject = "Email nga website";
                            $message_email = $message . '\r\n' . 'Nr:tel: ' . $nr_tel;
                            $headers = "From: " . $email;

                            $data = [
                                'emri_mbiemri' => $fullname,
                                'email' => $email,
                                'nr_tel' => $nr_tel,
                                'mesazhi' => $message
                            ];

                            $controller->ruajKontakt($data);

                            /*if(!mail($to,$subject,$mesmessage_emailsage,$headers))
                                throw new Exception("Email-i nuk u dergua provoni perseri!", 1);*/

                            echo '<div class="message">Mesazhi u dergua me sukses!</div>';
                            
                        } catch (Exception $e) {
                            echo '<div class="error-message">' . $e->getMessage() . '</div>';
                        }
                    }
                ?>
                <small id="errormessagename"></small>
                <input type="text" name="fullname" id="emri" placeholder="&#xf406; Emri Mbiemri" style="font-family: fontawesome;">
                <small id="errormessageemail"></small>
                <input type="email" name="email" id="email" placeholder="&#xf0e0; Email "style="font-family: fontawesome;">
                <input type="text" name="nr_tel" placeholder="&#xf879;Nr. Tel" style="font-family: fontawesome;">
                <small id="errormessagetext"></small>
                <textarea name="message" id="message" placeholder="&#xf27a; Mesazhi" style="font-family: fontawesome;"></textarea>
                <input type="submit" name="save" value="Ruaj" >
            </form>
        </div>
        <div class="contact-right">
            <ul>
                <li><p><i class="fas fa-map-marker-alt"></i> rr. Ismail Qemaili nr.44 Prishtine</p></li>
                <li><p><i class="fas fa-phone-alt"></i> <a href="tel:+38349444444">049 444 444</a></p></li>
                <li><p><i class="far fa-envelope"></i> <a href="mail:info@receta.com">info@receta.com</a></p></li>
            </ul>
        </div>
    </div>
</div>
<div id="map">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2934.0268194465216!2d21.158008396404146!3d42.66078705605514!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x13549ee605110927%3A0x9365bfdf385eb95a!2sPristina!5e0!3m2!1sen!2s!4v1590151246856!5m2!1sen!2s" width="100%" height="600" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
</div>
<script type="text/javascript">
        
    //funksioni i validimit
    function validation()
    {
        
        var emri=document.getElementById("emri").value;
        var email=document.getElementById("email").value;
        var message=document.getElementById("message").value;
        var errormessagename=document.getElementById("errormessagename");
        var errormessageemail=document.getElementById("errormessageemail");
        var errormessagetext=document.getElementById("errormessagetext");
        errormessagename.style.fontSize="10px";
        errormessageemail.style.fontSize="10px";
        errormessagetext.style.fontSize="10px";
        var filter = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z])+\.)+([a-zA-Z]{2,4})+$/;
        var text;

        if(emri==""){
            text="Ju lutem shtypni nje emer!";
            errormessagename.innerHTML=text;
            return false;
            
            }
        else if(emri.length<3){
            text="Ju lutem shtypni nje emer valid!";
            errormessagename.innerHTML=text;
            return false;
            
        }

         if(email==""){
            text="Ju duhet patjeter te shtypni emailin tuaj!";
            errormessageemail.innerHTML=text;
            return false;
           
        }
         else if (!filter.test(email)) {
            text="Emaili nuk eshte valid!";
            errormessageemail.innerHTML=text;
            email.focus;
            return false;
           
        }

        if(message==""){
            text="Ju duhet të na dergoni një mesazh!";
            errormessagetext.innerHTML=text;
            return false;
           

        }
        else if(message.length<30){
            text="Mesazhi duhet të jetë min.30 fjalë";
            errormessagetext.innerHTML=text;
            return false;
        }

        //alert("Mesazhi u degua me sukses, faleminderit per kohen tuaj!")
        return true;
    }
</script>