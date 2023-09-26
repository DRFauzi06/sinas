<!DOCTYPE html>
<html lang="en">
    
<head >

  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/inc/bootstrap/bootstrap.min.css" />
    <link rel="stylesheet" href="<?php echo base_url()?>assets/css/style.css" />

    <title>Try</title>
</head >

<body style="background-color : #152036;" >

<section class="vh-100 gradient-custom">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-12 col-md-8 col-lg-6 col-xl-5">
        <div class="card bg-dark text-white" style="border-radius: 1rem;">
          <div class="card-body p-5 text-center">

            <div class="mb-md-5 mt-md-4 pb-5">
              <form action="<?= base_url('login/login'); ?>" method="POST">

              <h2 class="fw-bold mb-2 text-uppercase text-white">Login</h2>
              <p class="text-white-50 mb-5">Please enter your login and password!</p>
              <!-- <?= $num?> -->
              

              <?= $this->session->flashdata('message') ?>

              <div class="form-outline form-white mb-4">
                <input type="text" id="username" name="username" class="form-control form-control-lg" placeholder="Username" />
                <label class="form-label mt-2" for="username">Username</label>
              </div>

              <div class="form-outline form-white mb-4">
                <input type="password" id="passwordUser" name="passwordUser" class="form-control form-control-lg" placeholder="Password" />
                <label class="form-label mt-2" for="passwordUser">Password</label>
              </div>

              

              <button class="btn btn-outline-light btn-lg px-5 mt-5" type="submit">Login</button>

              </form>

              

            </div>

            

          </div>
        </div>
      </div>
    </div>
  </div>
</section>
