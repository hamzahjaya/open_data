  <div class="site-wrap">

    
    <header class="container" style="margin-top: 50px">

      <!-- <div class="container"> -->
        <div class="row">
          <div class="col-md-4">
            <h1 class="mb-0 site-logo"><a href="<?= base_url() ?>" class="text-white mb-0"><img src="<?= base_url('assets/elements/logo.png') ?>" width="100%" data-aos-delay="200"></a></h1>
          </div>
          <div class="col-md-8 " style="padding-top: 20px">
                <form method="post" action="<?= base_url('data/cari') ?>">
                    <div class="row align-items-center">
                        <div class="col-lg-12 mb-12 mb-xl-0 col-xl-10 ">
                            <input type="text" class="form-control rounded" name="cari" placeholder="Cari data">
                        </div>
                        <div class="">
                            <button type="submit" class="btn btn-primary rounded" value="Cari" style="background-color: white;color: black;border-color: #CED4DA "><img src="<?= base_url('assets/elements/loop.png') ?>" width="28px"></button>
                        </div>

                    </div>
                </form>            
          </div>

        </div>
      <!-- </div> -->
      
    </header>