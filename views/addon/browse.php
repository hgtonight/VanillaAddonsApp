<?php if (!defined('APPLICATION')) exit();
$Session = Gdn::Session();
include($this->FetchViewLocation('helper_functions'));

if ($this->DeliveryType() == DELIVERY_TYPE_ALL) {
   echo $this->FetchView('head');
?>
   <h2>Browse <?php
      if ($this->Filter == 'themes')
         echo 'Themes';
      elseif ($this->Filter == 'plugins')
         echo 'Plugins';
      elseif ($this->Filter == 'applications')
         echo 'Applications';
      else
         echo 'Addons';
   ?></h2>
   <ul class="DataList Addons">
      <?php
      if ($this->SearchResults->NumRows() == 0)
         echo '<li class="Empty">There were no addons matching your search criteria.</li>';
}            
$Alt = '';
foreach ($this->SearchResults->Result() as $Addon) {
   $Alt = $Alt == ' Alt' ? '' : ' Alt';
   WriteAddon($Addon, $Alt);
}
if ($this->DeliveryType() == DELIVERY_TYPE_ALL) {
?>
   </ul>
   <?php
   echo $this->Pager->ToString('more');
}
