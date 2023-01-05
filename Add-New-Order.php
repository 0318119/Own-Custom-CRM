

<?php include './includes/Main-Header.php'?>

<?php include './includes/Top-navbar.php';?>

<?php include './includes/Side-user-menu.php';?>

<section class="form-bg">
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-10 order-form">
        <div class="card card-primary mt-5">
          <div class="card-header">
            <h3 class="card-title">Quick Example</h3>
          </div>
          <form>
            <div class="card-body">
            <div class="form-group">
                <label>Your Name</label>
                <input type="email" class="form-control" id="" placeholder="Enter Your Full Name">
              </div>
              <div class="form-group">
                <label>Email address</label>
                <input type="email" class="form-control" placeholder="Enter Your Email">
              </div>
              <div class="form-group">
                <label>Phone Number</label>
                <input type="text" class="form-control" placeholder="Enter Your Phone">
              </div>
              <div class="form-group">
                <label >Description</label>
                <textarea name="" id="" cols="30" rows="5" class="form-control" placeholder="Descripe your business in shortly"></textarea>
              </div>
              <div class="form-group">
              <label >Country</label>
                  <select class="form-select own-selet-tag" aria-label="Default select example">
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
              </div>
              <div class="form-group">
              <label>Select Package</label>
                  <select class="form-select own-selet-tag" aria-label="Default select example">
                    <option selected>Open this select menu</option>
                    <option value="1">One</option>
                    <option value="2">Two</option>
                    <option value="3">Three</option>
                  </select>
              </div>
              <div class="form-group">
                <label>Attach File</label>
                <div class="input-group">
                  <div class="custom-file">
                    <input type="file" class="custom-file-input" id="exampleInputFile">
                    <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                  </div>
                </div>
              </div>
                <a href="">Terms and conditions apply</a>
            </div>
            <div class="card-footer">
              <button type="submit" class="btn btn-primary btn-lg">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

</body>
</html>