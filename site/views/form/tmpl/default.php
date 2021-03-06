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
defined('_JEXEC') or die;?>
<div class="row-fluid">
	<div class="span6">
        <form enctype="multipart/form-data"  action="<?php echo JRoute::_('index.php?option=com_socialcommunity'); ?>" method="post" id="itpsc-profile-form">
            
            <?php echo $this->form->getLabel('name'); ?>
            <?php echo $this->form->getInput('name'); ?>
            
            <?php echo $this->form->getLabel('bio'); ?>
            <?php echo $this->form->getInput('bio'); ?>
            
            <?php echo $this->form->getLabel('photo'); ?>
            <div class="fileupload fileupload-new" data-provides="fileupload">
                <div class="input-append">
                    <div class="uneditable-input span3">
                        <i class="icon-file fileupload-exists"></i> 
                        <span class="fileupload-preview"></span>
                    </div>
                    <span class="btn btn-file">
                        <span class="fileupload-new"><?php echo JText::_("COM_SOCIALCOMMUNITY_SELECT_FILE");?></span>
                        <span class="fileupload-exists"><?php echo JText::_("COM_SOCIALCOMMUNITY_CHANGE");?></span>
                        <?php echo $this->form->getInput('photo'); ?>
                    </span>
                    <a href="#" class="btn fileupload-exists" data-dismiss="fileupload"><?php echo JText::_("COM_SOCIALCOMMUNITY_REMOVE");?></a>
                </div>
            </div>
            
            
            <input type="hidden" name="task" value="form.save" />
            <?php echo JHtml::_('form.token'); ?>
                
            <div class="clearfix"></div>
            <button type="submit" class="button"><?php echo JText::_("JSAVE")?></button>
            
        </form>
    </div>
    
    <?php if(!empty($this->item["image"])) {?>
    <div class="span6">
    	<img src="<?php echo $this->imagesFolder.$this->item["image"];?>" class="img-polaroid" />
    	<div class="clearfix">&nbsp;</div>
    	<a href="<?php echo JRoute::_("index.php?option=com_socialcommunity&task=form.removeImage&".JSession::getFormToken()."=1");?>" class="btn btn-mini"><i class="icon-trash"></i> <?php echo JText::_("COM_SOCIALCOMMUNITY_REMOVE_IMAGE");?></a>
    </div>
    <?php }?>

</div>