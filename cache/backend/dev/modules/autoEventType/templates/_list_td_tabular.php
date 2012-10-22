<td class="sf_admin_text sf_admin_list_td_id">
  <?php echo link_to($event_type->getId(), 'event_type_edit', $event_type) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_name">
  <?php echo $event_type->getName() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_short_code">
  <?php echo $event_type->getShortCode() ?>
</td>
<td class="sf_admin_date sf_admin_list_td_created_at">
  <?php echo false !== strtotime($event_type->getCreatedAt()) ? format_date($event_type->getCreatedAt(), "f") : '&nbsp;' ?>
</td>
<td class="sf_admin_date sf_admin_list_td_updated_at">
  <?php echo false !== strtotime($event_type->getUpdatedAt()) ? format_date($event_type->getUpdatedAt(), "f") : '&nbsp;' ?>
</td>
<td class="sf_admin_text sf_admin_list_td_slug">
  <?php echo $event_type->getSlug() ?>
</td>
