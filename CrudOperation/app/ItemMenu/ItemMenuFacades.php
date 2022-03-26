<?php
   namespace App\ItemMenu;
   use App\ItemMenu;
   class ItemMenuFacades{
      public function getItemMenu() { 
         return ItemMenu::select('id','name')->get();
      }
        
   }
?>
