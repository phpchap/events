<?php use_helper('I18N', 'Date') ?>
<?php include_partial('eventType/assets') ?>

<div id="sf_admin_container">
  <h1><?php echo __('New EventType', array(), 'messages') ?></h1>

  <?php include_partial('eventType/flashes') ?>

  <div id="sf_admin_header">
    <?php include_partial('eventType/form_header', array('event_type' => $event_type, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>

  <div id="sf_admin_content">
    <?php include_partial('eventType/form', array('event_type' => $event_type, 'form' => $form, 'configuration' => $configuration, 'helper' => $helper)) ?>
  </div>

  <div id="sf_admin_footer">
    <?php include_partial('eventType/form_footer', array('event_type' => $event_type, 'form' => $form, 'configuration' => $configuration)) ?>
  </div>
</div>
