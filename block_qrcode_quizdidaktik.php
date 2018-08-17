<?php
// This file is part of Moodle - http://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <http://www.gnu.org/licenses/>.

/**
 * QR-Code block.
 *
 * @package    block_qrcode_quizdidaktik
 * @copyright  2018 Quizdidaktik.de
 * @author     Joachim Jakob <jakj@kronberg-gymnasium.de.ca>
 * @license    http://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */

defined('MOODLE_INTERNAL') || die();

class block_qrcode_quizdidaktik extends block_base {
    /**
     * block initializations
     */
    public function init() {
        $this->title   = get_string('pluginname', 'block_qrcode_quizdidaktik');
    }

    /**
     * block contents
     *
     * @return object
     */
    
    
    public function get_content() {
        if ($this->content !== null) {
            return $this->content;
        }
 
        $this->content         =  new stdClass;
    
        $this->content->text .= "<iframe id=\"mein_qrcode\"></iframe>
<script>
var generatorurl='https://quizdidaktik.de/qrcodegenerator-2.0/index.html?zielurl='
var weitere_parameter='&width=200&height=200&correctlevel=M';

function lade_qrcode() {
   var aktuelle_adresse=location.href;
   var zielurl=generatorurl+aktuelle_adresse+weitere_parameter;
   document.getElementById('mein_qrcode').src=zielurl;
}

window.onload = function () {
   lade_qrcode();
}
</script>";
         $this->content->footer = '';
        
        return $this->content;
    }
    
    /* nur einmal diesen Block pro Seite */
    public function instance_allow_multiple() {
        return false;
    }
    
    /* Header ausblenden */
    public function hide_header() {
        return true;
    }
 
}
