<?php
  /* vim: set expandtab tabstop=4 softtabstop=4 shiftwidth=4:
  Codificación: UTF-8
  +----------------------------------------------------------------------+
  | Issabel version 2.4.0-9                                              |
  | http://www.issabel.org                                               |
  +----------------------------------------------------------------------+
  | Copyright (c) 2021 Issabel Foundation                                |
  | Copyright (c) 2006 Palosanto Solutions S. A.                         |
  +----------------------------------------------------------------------+
  | The contents of this file are subject to the General Public License  |
  | (GPL) Version 2 (the "License"); you may not use this file except in |
  | compliance with the License. You may obtain a copy of the License at |
  | http://www.opensource.org/licenses/gpl-license.php                   |
  |                                                                      |
  | Software distributed under the License is distributed on an "AS IS"  |
  | basis, WITHOUT WARRANTY OF ANY KIND, either express or implied. See  |
  | the License for the specific language governing rights and           |
  | limitations under the License.                                       |
  +----------------------------------------------------------------------+
  | The Initial Developer of the Original Code is PaloSanto Solutions    |
  +----------------------------------------------------------------------+
  $Id: index.php, Wed 19 May 2021 07:27:33 PM EDT, nicolas@issabel.com
*/
//include issabel framework
include_once "libs/paloSantoGrid.class.php";
include_once "libs/paloSantoForm.class.php";

function _moduleContent(&$smarty, $module_name)
{
    //include module files
    include_once "modules/$module_name/configs/default.conf.php";
    include_once "modules/$module_name/libs/paloSantoInstant_Messaging.class.php";

    $base_dir=dirname($_SERVER['SCRIPT_FILENAME']);

    load_language_module($module_name);

    //global variables
    global $arrConf;
    global $arrConfModule;
    $arrConf = array_merge($arrConf,$arrConfModule);

    //folder path for custom templates
    $templates_dir=(isset($arrConf['templates_dir']))?$arrConf['templates_dir']:'themes';
    $local_templates_dir="$base_dir/modules/$module_name/".$templates_dir.'/'.$arrConf['theme'];

    $content = "";

    $action = NULL;
    switch($action){
        default: // view_form
            $content = viewFormInstant_Messaging($smarty, $module_name, $local_templates_dir, $arrConf);
            break;
    }
    return $content;
}

function viewFormInstant_Messaging($smarty, $module_name, $local_templates_dir, $arrConf)
{

    $smarty->assign("icon",  "modules/$module_name/images/instant_messaging.png");
    $smarty->assign("imess1_img",  "modules/$module_name/images/spark.jpg");
    $smarty->assign("tag_manuf_description", _tr("Developer Description"));
    $smarty->assign("download_link", _tr("Download Link"));
    $smarty->assign("tag_manufacturer", _tr("Developer"));

    $smarty->assign("imess1_software_description", _tr("spark_software_description"));
    $smarty->assign("imess1_manufacturer_description", _tr("spark_manufacturer_description"));

    $oForm    = new paloForm($smarty,array());
    $content = $oForm->fetchForm("$local_templates_dir/form.tpl",_tr("Instant Messaging"),array());

    return $content;
}
?>
