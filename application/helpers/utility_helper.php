<?php
function asset_url_front($param=""){
   return base_url('assets/front/');
}
function asset_url_admin($param=""){
   return base_url('assets/admin/').$param;
}