<?php
/*
 * @version $Id: ruleticketcollection.class.php 14684 2011-06-11 06:32:40Z remi $
 -------------------------------------------------------------------------
 GLPI - Gestionnaire Libre de Parc Informatique
 Copyright (C) 2003-2011 by the INDEPNET Development Team.

 http://indepnet.net/   http://glpi-project.org
 -------------------------------------------------------------------------

 LICENSE

 This file is part of GLPI.

 GLPI is free software; you can redistribute it and/or modify
 it under the terms of the GNU General Public License as published by
 the Free Software Foundation; either version 2 of the License, or
 (at your option) any later version.

 GLPI is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 GNU General Public License for more details.

 You should have received a copy of the GNU General Public License
 along with GLPI; if not, write to the Free Software Foundation, Inc.,
 51 Franklin Street, Fifth Floor, Boston, MA 02110-1301 USA.
 --------------------------------------------------------------------------
 */

// ----------------------------------------------------------------------
// Original Author of file: Walid Nouh
// Purpose of file:
// ----------------------------------------------------------------------
if (!defined('GLPI_ROOT')) {
   die("Sorry. You can't access directly to this file");
}

class RuleTicketCollection extends RuleCollection {

   // From RuleCollection
   public $right                                 = 'entity_rule_ticket';
   public $use_output_rule_process_as_next_input = true;
   public $menu_option                           = 'ticket';


   function __construct($entity=0) {
      $this->entity = $entity;
   }


   function canList() {
      return haveRight("rule_ticket","r") || $this->canView();
   }


   function getTitle() {
      global $LANG;

      return $LANG['rulesengine'][28];
   }


   function preProcessPreviewResults($output) {
      return Ticket::showPreviewAssignAction($output);
   }


   function showInheritedTab() {
      return haveRight('rule_ticket','r') && ($this->entity);
   }


   function showChildrensTab() {
      return haveRight('rule_ticket','r') && (count($_SESSION['glpiactiveentities']) > 1);
   }

}

?>