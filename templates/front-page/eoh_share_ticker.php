
<section class="top-nav">
  <div class="left">
    <div class="eoh">
      <p><a href="#" target="_blank">EOH Holdings Ltd. - EOH (JSE)</a></p>
    </div>
    <div class="currency">
        <p id="currency"><a href="#" target="_blank"><?php echo $json_output['l'];  ?> (<?php echo $json_output['cp'];  ?>%)</a><button id="currencybtn" type="button"><i class="fa fa-angle-down" aria-hidden="true"></i></button></p>
    </div>
    <div class="date">
      <p id="date"><a href="#" target="_blank"><?php echo $this->_date("j M, h:i", false, 'Africa/Johannesburg') . ' SAST';  ?></a></p>
    </div>
  </div>
</section>
