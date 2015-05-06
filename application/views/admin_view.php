<?php
 if($this->session->userdata('logged_in'))
 {
 $session_data = $this->session->userdata('logged_in');
 $data['username'] = $session_data['username'];
 //$this->load->view('home_view', $data);
 }
 else
 {
  
 //If no session, redirect to login page
 redirect('login', 'refresh');
 }
$this->load->view('header_view');
?>
<div id="fea" class="features">
  <div class="container text-center">
    <div class="head text-center">
      <h3><span> </span> Userpanel</h3>

      <p>Here you can change your details</p>
    </div>
    </br>
    <?php foreach ($results as $r):?>
    <div class="col-md 6 contact-left">
      <form onSubmit="">
          <p>Profilepicture: </p>
          <img id="profPic" src="<?php echo base_url();?>assets/users/<?=$r->Picture?>" />
        </br>
          <p> E-mail:</p>
          <input class="textarea" type="text" size="40" id="email" name="email" value="<?=$r->Email?>"/>
        <br/>
          <p>Password: </p>
          <input class="password" type="password" size="20" id="password" name="password" value="<?=$r->Password?>"/>
        <br/>
          <p>Confirm password: </p>
          <input class="password" type="password" size="20" id="password2" name="password2" value="<?=$r->Password?>"/>
        <br/>
          <p>First name: </p>
          <input class="textarea" type="text" size="20" id="firstname" name="firstname" value="<?=$r->Firstname?>"/>
          <p>Last name: </p>
          <input class=" textarea" type="text" size="20" id="lastname" name="lastname" value="<?=$r->Lastname?>"/>
          <p>About yourself: </p>
          <textarea id="aboutyourself" name="aboutyourself"> </textarea>
        <br/>
          <input type="submit" value="Save"/>
      </form>
    </div>
    <?php endforeach;?>
  </div>
</div>
</body>
</html>
