<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         0.10.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

$cakeDescription = 'ShoutOut';
use Cake\Routing\Router;
?>
<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        <?= $cakeDescription ?>:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
      <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


  <script>

  $( function() {

    $("#dash").click(function(){
      window.location = '/dashboards?reset=yes';
      // alert("The paragraph was clicked.");
    });


      $("#tags").autocomplete(
      {
          search: function () {},
          source: function (request, response)
          {
            $.ajax({
              type:"POST",
              url:"<?php echo Router::url(array('controller'=>'Cities','action'=>'getCities'));?>"+ '?term=' +document.getElementById('tags').value,
              dataType: 'json',
              success: function(tab){
                //var res_data = [];
                // $.each(tab, function(k, v) {
                //   var demo = v.split(" ");
                //   res_data.push({label: demo[0],value: demo[1]});
                // });
                // console.log(res_data);
                response(tab);
              },
              error: function (tab) {
                  alert('error');
              }
            });
          },
          select: function( event , ui ) {
              updateResult(ui.item.label);
          }
      });
  });

  function updateResult(city){
      $.ajax({
          type:"POST",
          url:"<?php echo Router::url(array('controller'=>'CityCategories','action'=>'viewresult'));?>"+ '?term=' +city,
          dataType: 'text',
          async:false,
          success: function(tab){
             window.location = '/dashboards';
          },
          error: function (tab) {
              console.log(tab);
              alert('error');
          }
      });
  }


  </script>
</head>
<body>
  <input type="hidden" id="cities">
    <nav class="top-bar expanded" data-topbar role="navigation">
        <ul class="title-area large-3 medium-4 columns">
            <li class="name">
                <h1><a href="">ShoutOut</a></h1>
                <h1><a href=""></a></h1>
            </li>
        </ul>
        <div class="top-bar-section">
             <ul class="left">
                 <?php if($this->request->Session()->read('Auth')) { ?>
                <li><input type="text" placeholder="Switch City" id="tags" style="margin-right:20px;width: 200px;"></li>
                <?php } ?>
                <li></li>
            </ul>
            <ul class="right">
                <?php if(isset($city_id) && $city_id > 0) {?>

                <li style="margin-right:20px;">
					 <span style="color:white;">You are currently working for <?php echo $city_name; ?></span>
					<button id="dash" >Back to Dashboard</button></li>
                <?php } ?>
                <?php if($this->request->Session()->read('Auth')) {
				   // user is logged in, show logout..user menu etc
				   echo $this->Html->link('Logout', array('controller' => 'users', 'action' => 'logout'));
				}
				?>
                <li></li>
            </ul>
        </div>
    </nav>
    <?= $this->Flash->render() ?>
    <div class="container clearfix">
       <?php if($this->request->Session()->read('Auth')) { ?>
        <nav class="large-3 medium-4 columns" id="actions-sidebar">
			<ul class="side-nav">
				 <?php
					if($this->request->Session()->read('Config.city_id') >0 ) {
						echo $this->element('nav/nav-with-city');
					}
					else {
						echo $this->element('nav/nav-without-city');
					}
				  ?>
			</ul>
		</nav>
	<?php } ?>
        <?= $this->fetch('content') ?>
    </div>
    <footer>
    </footer>
</body>
</html>
