<h1>Bienvenu de Assurence</h1>
<hr>
<style>
  #site-cover{
    width:100%;
    height:40em;
    object-fit:cover;
    object-position:center center;
  }
</style>
<div class="row">
  <div class="col-12 col-sm-4 col-md-4">
    <div class="info-box">
      <span class="info-box-icon bg-gradient-primary elevation-1"><i class="fas fa-th-list"></i></span>
      <div class="info-box-content">
        <span class="info-box-text"> les Assurence</span>
        <span class="info-box-number text-right h5">
          <?php 
            $brand = $conn->query("SELECT * FROM brand_list where delete_flag = 0 and `status` = 1")->num_rows;
            echo format_num($brand);
          ?>
          <?php ?>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <div class="col-12 col-sm-4 col-md-4">
    <div class="info-box">
      <span class="info-box-icon bg-gradient-dark elevation-1"><i class="fas fa-list"></i></span>
      <div class="info-box-content">
        <span class="info-box-text"> type Article</span>
        <span class="info-box-number text-right h5">
          <?php 
            $car_types = $conn->query("SELECT id FROM car_type_list where delete_flag = 0 and `status` = 1")->num_rows;
            echo format_num($car_types);
          ?>
          <?php ?>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <div class="col-12 col-sm-4 col-md-4">
    <div class="info-box">
      <span class="info-box-icon bg-gradient-navy elevation-1"><i class="fas fa-list"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">type reclamation</span>
        <span class="info-box-number text-right h5">
          <?php 
            $models = $conn->query("SELECT id FROM model_list where delete_flag = 0 and `status` = 1")->num_rows;
            echo format_num($models);
          ?>
          <?php ?>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <div class="col-12 col-sm-4 col-md-4">
    <div class="info-box">
      <span class="info-box-icon bg-gradient-light elevation-1"><i class="fas fa-list"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">artucle new</span>
        <span class="info-box-number text-right h5">
          <?php 
            $vehicles = $conn->query("SELECT id FROM vehicle_list where delete_flag = 0 and `status` = 0")->num_rows;
            echo format_num($vehicles);
          ?>
          <?php ?>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <div class="col-12 col-sm-4 col-md-4">
    <div class="info-box">
      <span class="info-box-icon bg-gradient-success elevation-1"><i class="fas fa-list"></i></span>
      <div class="info-box-content">
        <span class="info-box-text">les article fine</span>
        <span class="info-box-number text-right h5">
          <?php 
            $vehicles = $conn->query("SELECT id FROM vehicle_list where delete_flag = 0 and `status` = 1")->num_rows;
            echo format_num($vehicles);
          ?>
          <?php ?>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <div class="col-12 col-sm-4 col-md-4">
    <div class="info-box">
      <span class="info-box-icon bg-gradient-warning elevation-1"><i class="fas fa-list"></i></span>
      <div class="info-box-content">
        <span class="info-box-text"> reclamation aujourduit</span>
        <span class="info-box-number text-right h5">
          <?php 
            $transactions = $conn->query("SELECT SUM(COALESCE((SELECT `price` from vehicle_list where id = transaction_list.vehicle_id and delete_flag = 0), 0)) FROM transaction_list where date(date_created) = '".date('Y-m-d')."' ") ;
            if($transactions->num_rows > 0){
              $sales = $transactions->fetch_array()[0];
            }
            $sales = isset($sales) && $sales > 0 ? format_num($sales) :5; 
            echo  $sales  ;
          ?>
          <?php ?>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
</div>
<div class="container-fluid">
 <center>
   <img src="<?= validate_image($_settings->info('cover')) ?>" id="site-cover" alt="" class="img-fluid">
 </center>
</div>
