<?php
if (!defined('INC')) { die('Error! You don`t have permission to view this file!'); }
include(PATH.'inc/cal_array.inc.php');
?>		
		
		<div class="content">
		  <?php
		  if (isset($UPDATED)) {
		  ?>
		  <h1><?php echo $msg_question26; ?></h1>
			
      <p><?php echo $msg_question27; ?></p>
      
      <code><img src="templates/img/links/new-color-scheme.gif" alt="" title="" /> <a href="index.php?cmd=edit-question&amp;edit=<?php echo $_POST['edit']; ?>" title="<?php echo cleanDataEnt($msg_question28); ?>"><?php echo $msg_question28; ?></a></code>
      <code><img src="templates/img/links/questions.gif" alt="" title="" /> <a href="index.php?cmd=add-question&amp;survey=<?php echo $EDIT->que_sur_id; ?>" title="<?php echo cleanDataEnt($msg_question3); ?>"><?php echo $msg_question3; ?></a></code>
      <?php
      } else
		  {
      ?>
			<h1><?php echo $msg_question23; ?></h1>
			
      <p><?php echo $msg_question6; ?></p>
      
      <form method="post" action="index.php?cmd=edit-question">
      <input type="hidden" name="edit" value="<?php echo (isset($_POST['edit']) ? (int)$_POST['edit'] : (int)$_GET['edit']); ?>" />
      
      <div class="formOptionWrap">
      <label class="first"><?php echo $msg_question7; ?>:</label>
      <input type="text" class="box" name="que_text" value="<?php echo (isset($_POST['que_text']) ? cleanDataEnt($_POST['que_text']) : cleanDataEnt($EDIT->que_text)); ?>" />
      <?php echo (isset($Q_ERROR) ? '<span class="error">'.$Q_ERROR.'</span>' : ''); ?>
      </div>
      
      <div class="formOptionWrap">
      <label><?php echo $msg_question9; ?>:</label>
      <textarea name="que_help_text" rows="4" cols="20"><?php echo (isset($_POST['que_help_text']) ? cleanDataEnt($_POST['que_help_text']) : cleanDataEnt($EDIT->que_help_text)); ?></textarea>
      </div>
      
      <div class="formOptionWrap">
      <label><?php echo $msg_question8; ?>:</label>
      <input type="radio" name="que_answer_type" value="1"<?php echo (isset($_POST['que_answer_type']) && $_POST['que_answer_type']=='1' || (isset($EDIT) && $EDIT->que_answer_type=='1') ? ' checked="checked"' : (!isset($_POST['sur_title_should_display']) ? ' checked="checked"' : '')); ?> /> <b><?php echo $msg_question12; ?></b><br />
      <input type="radio" name="que_answer_type" value="2"<?php echo (isset($_POST['que_answer_type']) && !$_POST['que_answer_type']=='2' || (isset($EDIT) && $EDIT->que_answer_type=='2') ? ' checked="checked"' : ''); ?> /> <b><?php echo $msg_question13; ?></b><br />
      <input type="radio" name="que_answer_type" value="3"<?php echo (isset($_POST['que_answer_type']) && !$_POST['que_answer_type']=='3' || (isset($EDIT) && $EDIT->que_answer_type=='3') ? ' checked="checked"' : ''); ?> /> <b><?php echo $msg_question14; ?></b><br />
      <input type="radio" name="que_answer_type" value="4"<?php echo (isset($_POST['que_answer_type']) && !$_POST['que_answer_type']=='4' || (isset($EDIT) && $EDIT->que_answer_type=='4') ? ' checked="checked"' : ''); ?> /> <b><?php echo $msg_question15; ?></b><br />
      <input type="radio" name="que_answer_type" value="5"<?php echo (isset($_POST['que_answer_type']) && !$_POST['que_answer_type']=='5' || (isset($EDIT) && $EDIT->que_answer_type=='5') ? ' checked="checked"' : ''); ?> /> <b><?php echo $msg_question16; ?></b><br />
      <input type="radio" name="que_answer_type" value="6"<?php echo (isset($_POST['que_answer_type']) && !$_POST['que_answer_type']=='6' || (isset($EDIT) && $EDIT->que_answer_type=='6') ? ' checked="checked"' : ''); ?> /> <b><?php echo $msg_question17; ?></b><br />
      <input type="radio" name="que_answer_type" value="7"<?php echo (isset($_POST['que_answer_type']) && !$_POST['que_answer_type']=='7' || (isset($EDIT) && $EDIT->que_answer_type=='7') ? ' checked="checked"' : ''); ?> /> <b><?php echo $msg_question18; ?></b><br />
      <input type="radio" name="que_answer_type" value="8"<?php echo (isset($_POST['que_answer_type']) && !$_POST['que_answer_type']=='8' || (isset($EDIT) && $EDIT->que_answer_type=='8') ? ' checked="checked"' : ''); ?> /> <b><?php echo $msg_question19; ?></b><br />
      <input type="radio" name="que_answer_type" value="9"<?php echo (isset($_POST['que_answer_type']) && !$_POST['que_answer_type']=='9' || (isset($EDIT) && $EDIT->que_answer_type=='9') ? ' checked="checked"' : ''); ?> /> <b><?php echo $msg_question20; ?></b>
      </div>
      
      <div class="formOptionWrap">
      <label><?php echo $msg_question10; ?>:</label>
      <?php echo $msg_script4; ?> <input type="radio" name="que_required" value="1"<?php echo (isset($_POST['que_required']) && $_POST['que_required'] || (isset($EDIT) && $EDIT->que_required) ? ' checked="checked"' : (!isset($_POST['que_required']) ? ' checked="checked"' : '')); ?> /> <?php echo $msg_script5; ?> <input type="radio" name="que_required" value="0"<?php echo (isset($_POST['que_required']) && !$_POST['que_required'] || (isset($EDIT) && !$EDIT->que_required) ? ' checked="checked"' : ''); ?> />
      </div> 
       
      <div class="formOptionWrap">
      <label><?php echo $msg_question11; ?>:</label>
      <textarea name="var_text" rows="4" cols="20"><?php echo (isset($_POST['var_text']) ? cleanDataEnt($_POST['var_text']) : cleanDataEnt($VARIANTS)); ?></textarea>
      </div>
      
      <br /><input type="submit" class="button" value="<?php echo cleanDataEnt($msg_question23); ?>" title="<?php echo cleanDataEnt($msg_question23); ?>" />
      <input type="button" onclick="window.location='index.php?cmd=questions&amp;survey=<?php echo $EDIT->que_sur_id; ?>'" class="button" value="<?php echo cleanDataEnt($msg_script11); ?>" title="<?php echo cleanDataEnt($msg_script11); ?>" />
      
      </form>
      <?php
      }
      ?>

		</div>
		

		<div class="sidenav">

			<h2><?php echo $msg_script12; ?></h2>
			<ul>
				<li><a href="index.php?cmd=surveys" title="<?php echo cleanDataEnt($msg_survey4); ?>"><img src="templates/img/links/view.gif" alt="" title="" />&nbsp;&nbsp;<?php echo $msg_survey4; ?></a></li>
			  <li><a href="index.php?cmd=add-question&amp;survey=<?php echo $EDIT->que_sur_id; ?>" title="<?php echo cleanDataEnt($msg_question3); ?>"><img src="templates/img/links/questions.gif" alt="" title="" />&nbsp;&nbsp;<?php echo $msg_question3; ?></a></li>
			  <li><a href="index.php?cmd=questions&amp;survey=<?php echo $EDIT->que_sur_id; ?>" title="<?php echo cleanDataEnt($msg_question5); ?>"><img src="templates/img/links/questions.gif" alt="" title="" />&nbsp;&nbsp;<?php echo $msg_question5; ?></a></li>
			</ul>
			
			<h2><?php echo $msg_question29; ?></h2>
			<span class="informationBox"><?php echo cleanDataEnt($SUR->sur_title); ?></span>

		</div>

		
