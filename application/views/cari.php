    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-8">

            <div class="row mb-3 align-items-stretch">
              <?php foreach ($result as $key => $data): ?>
               <div class="col-md-12 col-lg-12 mb-12 mb-lg-12">
                <div class="h-entry">                  
                  <h2 class="font-size-regular"><a href="<?= base_url('data/detail/'.$data['id_publikasi']) ?>" class="text-black"><?= $data['judul_publikasi'] ?></a></h2>

                  
                  <p><?= $data['tagline'] ?></p>
                  
                
                  <div class="meta mb-3">
                    <!-- by Mark Spiker<span class="mx-1">&bullet;</span> Jan 18, 2019 <span class="mx-1">&bullet;</span>  -->
                    <a href="<?= base_url('data/detail/'.$data['id_publikasi']) ?>">Lihat</a>
                  </div>
                </div> 
              </div>               
              <?php endforeach ?>
            </div>

            <div>
        <div >
            <!--Tampilkan pagination-->
            <?php echo $pagination; ?>
        </div>
</div>









          </div>

        </div>
      </div>
    </div>

    
    