<template>
    <div>
        <h3>Get in touch</h3>
        <form method="post" class="contact__form" action="#">
            <!-- form message -->
            <div class="row">
                <div class="col-12">
                    <div class="alert alert-success contact__msg" style="display: none" role="alert"> Your
                        message was sent successfully. </div>
                </div>
            </div>
            <!-- form elements -->
            <div class="row">
                <div class="col-md-6 form-group">
                    <input name="name" type="text" placeholder="Your Name *" required>
                </div>
                <div class="col-md-6 form-group">
                    <input name="email" type="email" placeholder="Your Email *" required>
                </div>
                <div class="col-md-6 form-group">
                    <input name="phone" type="text" placeholder="Your Number *" required>
                </div>
                <div class="col-md-6 form-group">
                    <input name="subject" type="text" placeholder="Subject *" required>
                </div>
                <div class="col-md-12 form-group">
                    <textarea name="message" id="message" cols="30" rows="4" placeholder="Message *"
                        required></textarea>
                </div>
                <div class="col-md-12">
                    <button type="submit" class="butn-dark2"><span>Envoyez Message</span></button>
                </div>
            </div>
        </form>
    </div>
</template>
<script>
</script>