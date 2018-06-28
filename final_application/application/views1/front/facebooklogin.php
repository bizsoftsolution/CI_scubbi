
 <?php if(!$fb_data['me']): ?>
  Please login with your FB account: <a href="<?php echo $fb_data['loginUrl']; ?>">login</a>
  <!-- Or you can use XFBML -->
<div class="fb-login-button" data-show-faces="false" data-width="100" data-max-rows="1" data-scope="email,user_birthday,publish_stream"></div>
  <?php else: ?>
  <img class="pic" alt="" src="https://graph.facebook.com/<?php echo $fb_data['uid']; ?>/picture" />
 
Hi <?php echo $fb_data['me']['name']; ?>,
 
    <a href="<?php echo site_url('topsecret'); ?>">You can access the top secret page</a> or <a href="<?php echo $fb_data['logoutUrl']; ?>">logout</a>
 
  <?php endif; ?>
  