<?php
/**
 * @package      SocialCommunity
 * @subpackage   Components
 * @author       Todor Iliev
 * @copyright    Copyright (C) 2010 Todor Iliev <todor@itprism.com>. All rights reserved.
 * @license      http://www.gnu.org/copyleft/gpl.html GNU/GPL
 * SocialCommunity is free software. This version may have been modified pursuant
 * to the GNU General Public License, and as distributed it includes or
 * is derivative of works licensed under the GNU General Public License or
 * other free or open source software licenses.
 */

// no direct access
defined('_JEXEC') or die;

?>
<div class="row-fluid">
    <div class="span8">&nbsp;</div>
	<div class="span4">
		<a href="http://itprism.com/free-joomla-extensions/others/open-source-social-network" target="_blank"><img src="../media/com_socialcommunity/images/logo.png" alt="<?php echo JText::_("COM_SOCIALCOMMUNITY");?>" /></a>
        <a href="http://itprism.com" target="_blank" title="<?php echo JText::_("COM_SOCIALCOMMUNITY_PRODUCT");?>"><img src="../media/com_socialcommunity/images/product_of_itprism.png" alt="<?php echo JText::_("COM_SOCIALCOMMUNITY_PRODUCT");?>" /></a>
        <p><?php echo JText::_("COM_SOCIALCOMMUNITY_YOUR_VOTE"); ?></p>
        <p><?php echo JText::_("COM_SOCIALCOMMUNITY_SPONSORSHIP"); ?></p>
        <p><?php echo JText::_("COM_SOCIALCOMMUNITY_SUBSCRIPTION"); ?></p>
        
        <table class="table table-striped">
            <tbody>
                <tr>
                    <td><?php echo JText::_("COM_SOCIALCOMMUNITY_INSTALLED_VERSION");?></td>
                    <td><?php echo $this->version->getMediumVersion();?></td>
                </tr>
                <tr>
                    <td><?php echo JText::_("COM_SOCIALCOMMUNITY_RELEASE_DATE");?></td>
                    <td><?php echo $this->version->releaseDate?></td>
                </tr>
                <tr>
                    <td><?php echo JText::_("COM_SOCIALCOMMUNITY_ITPRISM_LIBRARY_VERSION");?></td>
                    <td><?php echo $this->itprismVersion;?></td>
                </tr>
                <tr>
                    <td><?php echo JText::_("COM_SOCIALCOMMUNITY_COPYRIGHT");?></td>
                    <td><?php echo $this->version->copyright;?></td>
                </tr>
                <tr>
                    <td><?php echo JText::_("COM_SOCIALCOMMUNITY_LICENSE");?></td>
                    <td><?php echo $this->version->license;?></td>
                </tr>
            </tbody>
        </table>
	</div>
</div>
