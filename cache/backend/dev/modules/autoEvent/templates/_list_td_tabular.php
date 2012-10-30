<td class="sf_admin_text sf_admin_list_td_id">
  <?php echo link_to($event->getId(), 'event_edit', $event) ?>
</td>
<td class="sf_admin_text sf_admin_list_td_name">
  <?php echo $event->getName() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_website">
  <?php echo $event->getWebsite() ?>
</td>
<td class="sf_admin_enum sf_admin_list_td_status">
  <?php echo $event->getStatus() ?>
</td>
<td class="sf_admin_enum sf_admin_list_td_type">
  <?php echo $event->getType() ?>
</td>
<td class="sf_admin_foreignkey sf_admin_list_td_industry_id">
  <?php echo $event->getIndustryId() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_organiser_id">
  <?php echo $event->getOrganiserId() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_event_type_id">
  <?php echo $event->getEventTypeId() ?>
</td>
<td class="sf_admin_foreignkey sf_admin_list_td_country_id">
  <?php echo $event->getCountryId() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_region_id">
  <?php echo $event->getRegionId() ?>
</td>
<td class="sf_admin_foreignkey sf_admin_list_td_city_id">
  <?php echo $event->getCityId() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_logo">
  <?php echo $event->getLogo() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_event_start">
  <?php echo $event->getEventStart() ?>
</td>
<td class="sf_admin_text sf_admin_list_td_event_end">
  <?php echo $event->getEventEnd() ?>
</td>
<td class="sf_admin_date sf_admin_list_td_created_at">
  <?php echo false !== strtotime($event->getCreatedAt()) ? format_date($event->getCreatedAt(), "f") : '&nbsp;' ?>
</td>
<td class="sf_admin_date sf_admin_list_td_updated_at">
  <?php echo false !== strtotime($event->getUpdatedAt()) ? format_date($event->getUpdatedAt(), "f") : '&nbsp;' ?>
</td>
<td class="sf_admin_text sf_admin_list_td_slug">
  <?php echo $event->getSlug() ?>
</td>
