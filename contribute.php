<?php
// include required files
require_once __DIR__.'/modules/includes.php';

include 'modules/header.php';
?>


<h3>Contribute to <?php echo currencyName($currency); ?> Node Monitor</h3>
<p>
  If you want to contribute to <?php echo currencyName($currency); ?> Node Monitor and further improve it, your help is very welcome. Have a look at its <a href="https://github.com/NanoTools/nanoNodeMonitor" target="_blank">GitHub page</a>, browse through open issues, check out the source code, create a branch, develop features, fix some bugs, and open pull requests. Development follows the standard <a href="https://guides.github.com/introduction/flow/" target="_blank">GitHub Flow</a> method.  
</p>

<br>

<h3>Donate to the Maintainer of This Node</h3>

<p>
  Donations support the efforts of the <?php echo currencyName($currency); ?> community to further decentralize the <?php echo currencyName($currency); ?> network by running representative nodes.
  Please consider donating to the maintainer of this <?php echo currencyName($currency); ?> node to help cover some of its costs. Simply click the BrainBlocks button below.
</p>


<div class="row">
  <div class="col-3">

    <div class="form-group">
      <div class="input-group mb-3">
        <input id="bbAmountNode" class="form-control" aria-label="Amount" type="text" value="0.1">
        <div class="input-group-append">
          <span class="input-group-text">NANO</span>
        </div>
      </div>
    </div>

  </div>
</div>

<div id="bb-button"></div>

<div id="donateMessage" class="alert alert-dismissible alert-success" style="display:none;">
  <button type="button" class="close" data-dismiss="alert">&times;</button>
  <strong>Thanks!</strong> Your support helps a lot!
</div>

<script>
init.push(function(){
  $( "#bbAmountNode" ).keyup(updateBrainButton);
  updateBrainButton();
});

function updateBrainButton() {
  $('#bb-button').empty();
  brainblocks.Button.render({
    // Pass in payment options
    payment: {
        destination: '<?php echo $nanoDonationAccount; ?>',
        currency:    'rai',
        amount:      $('#bbAmountNode').val() * 1000000
    },

    // Handle successful payments

    onPayment: function(data) {
      $('#donateMessage').show();
      console.log('Payment successful!', data.token);
    }

    }, '#bb-button');
};

</script>

<script src="https://brainblocks.io/brainblocks.min.js"></script>

<br>

<!--- add the footer -->

<?php include 'modules/footer.php'; ?>
